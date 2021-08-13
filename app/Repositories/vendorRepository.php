<?php
namespace App\Repositories;
use App\Models\vendorapplication;
use Symfony\Component\HttpFoundation\Request;
use App\Repositories\helperRepository;
use App\Repositories\invoiceRepository;
use App\Repositories\serviceRepository;
use Carbon\Carbon;

class vendorRepository{

    private $helper;
    private $invoice;
    private $service;

    public function __construct(helperRepository $helper,invoiceRepository $invoice,serviceRepository $service)
    {
      $this->helper = $helper; 
      $this->invoice = $invoice;  
      $this->service = $service;
    }
    public function getAll(){
        return vendorapplication::with('user')->get();
    }

    public function get_all_by_user($id){
        return vendorapplication::whereuser_id($id)->get();
    }
   
    public function get_application($id){
        return vendorapplication::whereid($id)->first();
    }
    public function create(Request $request){
        $invoicenumber = $this->helper->get_invoice_number($request->user()->id);
        $locality = 'LOCAL';
        if(strtoupper($request->country) !='ZIMBABWE'){
            $locality ='FOREIGN';
        }
        $price = $this->service->getPrice(3,$locality);
        $application =  vendorapplication::create([
            'user_id'=>$request->user()->id,
            'company'=>$request->company,
            'invoicenumber'=>$invoicenumber,
            'applicationtype'=>$request->applicationtype,
            'address'=>$request->address,
            'city'=>$request->city,
            'country'=>$request->country,
            'state'=>$request->state,
            'country'=>$request->country,
            'zipcode'=>$request->zipcode,
            'bank'=>$request->bank,
            'accountnumber'=>$request->accountnumber,
            'branch'=>$request->branch,
            'branchcode'=>$request->branchcode,
            'email'=>$request->email,
            'name'=>$request->name,
            'surname'=>$request->surname,
            'position'=>$request->position,
            'year'=>$request->year          

        ]);
       
         
        $price =$this->invoice->create_invoice($invoicenumber,$request->user()->id,"vendorregistration",$price->amount,$price->currency,3);

        return redirect()->route('invoicing.index')->with('statusSuccess','Invoice successfully Generated Please settled to complete registration');
     
    }
}