<?php
namespace App\Repositories\administrator;

use App\Models\invoices;
use App\Models\receipts;
use App\Repositories\helperRepository;
use Illuminate\Http\Request;

class invoicesRepository{

    private $helper;

    public function __construct(helperRepository $helper)
    {
         $this->helper = $helper;
    }
    public function getList(){
        return invoices::with('user','transfer','receipts')->get();
    }

    public function getByStatus($status){
        return invoices::with('user','transfer','receipts')->wherestatus($status)->get();
    }

    public function settle($invoicenumber){

        $online = invoices::whereinvoicenumber($invoicenumber)->first();
        $status = $online->status;
        $receiptnumber = $this->helper->get_receipt_number($online->user_id);
                  

        receipts::create(['invoicenumber'=>$online->invoicenumber,'receiptnumber'=>$receiptnumber,'source'=>'transfer','source_id'=>$online->transfer->id,'currency'=>$online->currency,'amount'=>$online->amount]);
      
        $receipted = $online->receipts->sum('amount');
        if($online->amount <= $receipted)
        {
        if(!is_null($online)){
          $online->status ="PAID";
          $online->save();
      }
      $id=0;
      if(!is_null($online->application)){
          $online->application->status ='IN-PROGRESS';
          $online->application->save();
              
      }
      if(!is_null($online->prazapplication)){
        $online->prazapplication->status ='IN-PROGRESS';
        $online->prazapplication->save();
        }
      if(!is_null($online->vendorapplication)){
        $online->vendorapplication->status ='IN-PROGRESS';                   
          $online->vendorapplication->save();
              }

    if(!is_null($online->subscription)){
      $online->subscription->status ='ACTIVE';                   
          $online->subscription->save();
     }
      
    }

    return redirect()->route('admin-invoices.show',$status);
    }
}