<?php
namespace App\Repositories;

use App\Models\administrator;
use App\Models\invoices;
use App\Models\pop;
use App\Models\transfers;
use App\Notifications\adminServiceAlert;
use App\Repositories\serviceRepository;
use Illuminate\Http\Request;
class invoiceRepository{
    private $service;

    public function __construct(serviceRepository $service)
    {
        $this->service = $service;
    }

    public function getList($id){
         return invoices::with('receipts')->whereuser_id($id)->get();
    }
    public function create_invoice($invoicenumber,$user_id,$source,$price,$currency,$service_id){
         $invoice = invoices::where(['invoicenumber'=>$invoicenumber])->first(); 
         if(!$invoice)
         {
             $invoice= invoices::create(['invoicenumber'=>$invoicenumber,'user_id'=>$user_id,'description'=>$source,'currency'=>$currency,'amount'=>$price,'service_id'=>$service_id]);

         }

         return $invoice;
       
    }

    public function get_pending_user($id){
        return invoices::with('receipts')->whereuser_id($id)->wherestatus('PENDING')->first();
    }

    public function get_pending_invoice($invoicenumber){
        return invoices::whereinvoicenumber($invoicenumber)->wherestatus('PENDING')->first();
    }

    public function uploadpop(Request $request){
        $invoice = invoices::with('application','prazapplication')->whereid($request->id)->first();
        $administrator = administrator::first();
        if(!is_null($invoice)){
         $path = $request->file('filename')->store('pops','publicFile');
         transfers::create(['invoice_id'=>$request->id,'user_id'=>$request->user()->id,'bank'=>$request->bank,'payment_date'=>$request->paymentdate,'filename'=>$path]);
         $invoice->status = "AWAITING";
         $invoice->save();
         if(!is_null($invoice->application)){
         $invoice->application->status ="AWAITING";
         $invoice->application->save();
         $administrator->notify(new adminServiceAlert("Company Registration","AWAITING PAYMENT VERIFICATION"));
         }
         elseif(!is_null($invoice->prazapplication)){
            $invoice->prazapplication->status ="AWAITING";
            $invoice->prazapplication->save();   
            $administrator->notify(new adminServiceAlert("PRAZ Registration","AWAITING PAYMENT VERIFICATION"));
         }
         elseif(!is_null($invoice->vendorapplication)){
            $invoice->vendorapplication->status ="AWAITING";
            $invoice->vendorapplication->save(); 
            $administrator->notify(new adminServiceAlert("Vendor Registration","AWAITING PAYMENT VERIFICATION"));  
         }
         elseif(!is_null($invoice->subscription)){
            $invoice->subscription->status ="AWAITING";
            $invoice->subscription->save(); 
            $administrator->notify(new adminServiceAlert("Subscription","AWAITING PAYMENT VERIFICATION"));  
         }
         return redirect()->route('home')->with('statusSuccess','Your Proof of payment has been successfully uploaded. Please note your application will be processed once funds have appeared on our bank statement');
        }
        else{
            return redirect()->route('home')->with('statusError','Invoice not found');
        }
    }
}