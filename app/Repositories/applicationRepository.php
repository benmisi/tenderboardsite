<?php
namespace App\Repositories;

use App\Models\myapplications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  App\Repositories\helperRepository;


class applicationRepository{

    private $helper;
    private $invoice;

    public function __construct(helperRepository $helper,invoiceRepository $invoice)
    {
        $this->helper = $helper;
        $this->invoice = $invoice;
    }

    public function get_all_applications(){
        return myapplications::with('user','service')->get();
    }

    public function get_applications_by_user($id){
        return myapplications::with('user','service')->whereuser_id($id)->get();   
    }

    public function create_application(Request $request){
        try{
        $fieldsarray=[];
        for ($i=0; $i <count($request->names) ; $i++) { 
             if(is_null($request->names[$i])){
                 return redirect()->back()->with('statusError','Please Enter Atleast 3 Preferred Company Names');
             }

             $fieldsarray[] = array('name'=>$request->names[$i],'status'=>'PENDING');
        }
        

        $directors =0;
        $directorsarray=[];
        for ($i=0; $i < count($request->directors) ; $i++) { 
            
          if(!is_null($request->directors[0])){
              $directors++;
          }else{
             return redirect()->back()->with('statusError','Please Enter Atleast 1 Company Directory');  
          }
          if(!is_null($request->directors[$i])){
          $directorsarray[]= array("name"=>$request->directors[$i],"national_id"=>$request->nationalID[$i],"address"=>$request->address[$i],"shares"=>$request->shares[$i]);
          }

        }
        
        if($directors<1){
         return redirect()->back()->with('statusError','Please Enter Atleast 1 Company Directory'); 
        }
       $invoicenumber = $this->helper->get_invoice_number(Auth::user()->id);
       $pending_invoice = $this->invoice->get_pending_user(Auth::user()->id); 
       if(is_null($pending_invoice))
        {
       myapplications::create(['user_id'=>Auth::user()->id,'service_id'=>$request->id,'invoicenumber'=>$invoicenumber,'fields->names'=>$fieldsarray,'fields->directors'=>$directorsarray]);
       $this->invoice->create_invoice($invoicenumber,Auth::user()->id,'Company Registration',$request->id);
        return redirect()->route('invoicing.index')->with('statusSuccess','Please Settle Invoice To Proceed with application');
        }else{
            return redirect()->route('invoicing.index')->with('errorSuccess','Please Settle Invoice To Proceed with application');
      
        }
      
    } catch (\Throwable $th) {
        return redirect()->back()->with('statusError',$th); 
    }
}
      
}