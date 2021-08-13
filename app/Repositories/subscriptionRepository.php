<?php
namespace App\Repositories;

use App\Models\packages;
use App\Models\subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\helperRepository;
use Carbon\Carbon;

class subscriptionRepository{

    private $helper;

    private $invoice;

    public function __construct(helperRepository $helper,invoiceRepository $invoice)
    {
         $this->helper = $helper;
         $this->invoice = $invoice;
    }
    public function getAll(){
        return subscription::with('user')->get();
    }

    public function get_my_subscription(){
        return subscription::with('package')->whereuser_id(Auth::user()->id)->wherestatus('ACTIVE')->orderBy('id','desc')->first();
    }

    public function createSubscription(Request $request){
        
        $invoicenumber = $this->helper->get_invoice_number($request->user()->id);
        $package = packages::whereid($request->id)->first();
        $cost = $request->duration * $package->amount;
        $expiredate = Carbon::now()->addDays($request->duration);
        subscription::create(['user_id'=>$request->user()->id,'package_id'=>$request->id,'invoicenumber'=>$invoicenumber,'duration'=>$request->duration,'expire_date'=>$expiredate]);
        $this->invoice->create_invoice($invoicenumber,$request->user()->id,"subscription",$cost,$package->currency,4);
        return redirect()->route('invoicing.index')->with('statusSuccess','Invoice successfully Generated Please settled to complete subscription');
  
    }
}