<?php
namespace App\Repositories;

use App\Models\onlinepayment;
use App\Models\receipts;
use Illuminate\Http\Request;
use App\Repositories\invoiceRepository;
use Illuminate\Support\Facades\Auth;

class onlinepaymentsRepository{

    private $invoice;
    private $paynow;
    private $helper;
    
    public function __construct(invoiceRepository $invoice,paynowsettingsRepository $paynow,helperRepository $helper)
    {
       $this->invoice = $invoice; 
       $this->paynow = $paynow;
       $this->helper = $helper;
    }

    public function getList($id){
      return onlinepayment::whereuser_id($id)->get();
    }
    public function initiate(Request $request){
        
      $invoice = $this->invoice->get_pending_user($request->user()->id);
      if(!is_null($invoice))
      {
      $email = getenv('TESTMODE') ? "misib@praz.org.zw" : $request->user()->email;

      $paynow = $this->paynow->mobilepayments();
      $payment = $paynow->createPayment($invoice->invoicenumber,$email);
      $payment->add($invoice->invoicenumber,$request->amount);
      try {
          $response = $paynow->sendMobile($payment,$request->phonenumber,$request->mode);
          if($response->success()){
              $pollurl = $response->pollUrl();
              $online = onlinepayment::create(['user_id'=>$request->user()->id,'invoicenumber'=>$invoice->invoicenumber,'poll_url'=>$pollurl,'amount'=>$request->amount,'mode'=>$request->mode]);
              return redirect()->route('mobilepayments.show',$online->id)->with('statusSuccess','Payment attempt initiated please check your phone and enter your wallet pin');


          }else{
           return redirect()->back()->with('statusError','Payment attempt was not sucessfully initiated');
          }
      } catch (\Throwable $th) {
        return redirect()->back()->with('statusError','Oops an error has occured please try again');   
      }
      }
      else{
          return redirect()->route('home')->with('statusError','No pending invoice found');
      }
    }

    public function confirm($id){
        $online = onlinepayment::whereid($id)->whereuser_id(Auth::user()->id)->wherestatus('PENDING')->first();
        if(!is_null($online)){
          if(!receipts::where(['source_id'=>$online->id,'source'=>'onlinepayment'])->exists()){
              
              $paynow = $this->paynow->mobilepayments();
              if($online->mode =='PAYNOW'){
                  $paynow = $this->paynow->onlinepayments();
              }
              $status = $paynow->pollTransaction($online->poll_url);
              if(!empty($status)){
                if (strtoupper($status->status()) == 'PAID' || strtoupper($status->status()) == 'AWAITING DELIVERY') {
                    $online->status = $status->status();
                    $online->save();
                    $receiptnumber = $this->helper->get_receipt_number($online->user_id);
                    if(!is_null($online->invoice)){
                        $online->invoice->status ="PAID";
                        $online->invoice->save();
                    }
                    if(!is_null($online->application)){
                        $online->application->status ='IN-PROGRESS';
                        $online->application->save();
                    } 

                    receipts::create(['invoicenumber'=>$online->invoicenumber,'receiptnumber'=>$receiptnumber,'source'=>'onlinepayment','source_id'=>$online->id,'currency'=>$online->invoice->currency,'amount'=>$online->amount]);
                    return redirect()->route('tracking.show',$online->application->id)->with('statusSuccess','Payment Successfully completed your application is now being  proceed. We will notify you of the progress via email');

                }else{
                    return redirect()->route('home')->with('statusError','Your online payment attempt failed');   
                }

              }else{
                return redirect()->route('home')->with('statusError','No pending onlinepayment found');   
              }
          }else{
            return redirect()->route('home')->with('statusError','No pending onlinepayment found'); 
          }
        }else {
            return redirect()->route('home')->with('statusError','No pending onlinepayment found');
        }
    }
}