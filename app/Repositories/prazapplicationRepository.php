<?php
namespace App\Repositories;

use App\Models\prazapplication;
use App\Models\prazapplication_items;
use App\Repositories\helperRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class prazapplicationRepository{

    private $helper;

    private $invoice;

    private $service;

    public function __construct(helperRepository $helper,invoiceRepository $invoice,serviceRepository $service)
    {
       $this->helper = $helper; 
       $this->invoice = $invoice; 
       $this->service = $service;
    }
    public function getApplications($id){

        return prazapplication::whereuser_id($id)->get();
    }

    public function getAppplication($id){
        return prazapplication::whereid($id)->first();
    }

    public function create(Request $request){

        $invoicenumber = $this->helper->get_invoice_number($request->user()->id);
        $application = prazapplication::whereuser_id($request->user()->id)->wherestatus('PENDING')->first();
        if(is_null($application)){
               $locality = 'LOCAL';
               if(strtoupper($request->country) !='ZIMBABWE'){
                   $locality ='FOREIGN';
               }
            $application = prazapplication::create(['user_id'=>$request->user()->id,
                                                   'invoicenumber'=>$invoicenumber,
                                                   'companyname'=>$request->company,
                                                   'locality'=>$locality,
                                                   'companytype_id'=>$request->accounttype,
                                                   'service_id'=>$request->id,
                                                   'hasaccount'=>$request->account,
                                                   'email'=>$request->email,
                                                   'password'=>$request->password,
        ]);

        return redirect()->route('praz-service.show',$application->id)->with('statusError','Please select categories that you wish to register');
 

        }else{
            return redirect()->route('praz-service.show',$application->id)->with('statusError','You have a pending application please complete it or delete');
        }
    }

    public function update(Request $request,$id){
        $application = prazapplication::whereid($id)->whereuser_id($request->user()->id)->first();
        $locality = 'LOCAL';
        if(strtoupper($request->country) !='ZIMBABWE'){
            $locality ='FOREIGN';
        }
        $application->companyname=$request->company;
        $application->locality=$locality;
        $application->companytype_id=$request->accounttype;
        $application->hasaccount=$request->account;
        $application->email=$request->email;
        $application->password=$request->password;
        $application->save();
        return redirect()->back()->with('statusSuccess','Application successfully Updated');

    }

    public function deleteapplication($id){

        $application = prazapplication::whereid($id)->whereuser_id(Auth::user()->id)->whereIn('status',['PENDING','AWAITING'])->first();
        if(!is_null($application)){
            if($application->status =='PENDING'){
                 prazapplication_items::whereprazapplication_id($application->id)->delete();
                $application->delete();
            }else{
                $application->status ='CANCELLED';
                $application->save();
            }
            return redirect()->back()->with('statusSuccess','Application successfully deleted');

        }else{
            return redirect()->back()->with('statusError','Application cannot be deleted');
        }
    }

    public function addItem(Request $request){

        $selection = $request->selection;
        $application = prazapplication::whereid($request->id)->first();
        if(!is_null($application))
        {
            for($i=0 ;$i<count($selection); $i++) 
            {
            if(!prazapplication_items::where(['user_id'=>$request->user()->id,'prazapplication_id'=>$request->id,'prazcategory_id'=>$selection[$i],'regyear'=>$request->regyear])->exists())
            {
                $price = $this->service->getPrice($application->service_id,$application->locality);
                prazapplication_items::create(['user_id'=>$request->user()->id,'prazapplication_id'=>$request->id,'prazcategory_id'=>$selection[$i],'regyear'=>$request->regyear,'currency'=>$price->currency,"amount"=>$price->amount]);
              
            }
            }

            return redirect()->route('praz-item.show',$application->id)->with('statusSuccess','Categories Successfully Added Please settle Invoice');

        }else{
            return redirect()->back()->with('statusSuccess','Application does not exist');
        }


    
    }

    public function getItems($id){
        return prazapplication::with('items.category')->whereid($id)->first();
    }
    public function removeItem($id){
     $item =  prazapplication_items::whereid($id)->whereuser_id(Auth::user()->id)->first();
       if(!is_null($item)){
         $item->delete();
         return redirect()->back()->with('statusSuccess','Category Success Delete');
      }else {
        return redirect()->back()->with('statusError','Category Not found');
  
       }
    }

    public function confirm($id){
        $application = prazapplication::with('price','service')->whereid($id)->first();
        
         $invoice =  $this->invoice->get_pending_invoice($application->invoicenumber);
         if(is_null($invoice)){

           
              $price = $this->service->getPrice($application->service_id,$application->locality);
             $totalprice = count($application->items) * $price->amount;
          $this->invoice->create_invoice($application->invoicenumber,$application->user_id,'prazapplication',$totalprice,$price->currency,$application->service_id);
          return redirect()->route('invoicing.index')->with('statusSuccess','Invoice successfully Generated Please settled to complete registration');
         }else{

            return redirect()->route('invoicing.index')->with('statusSuccess','Invoice successfully Generated Please settled to complete registration');
         }
         
    }
}