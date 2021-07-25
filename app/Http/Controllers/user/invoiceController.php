<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\invoiceRepository;
use Illuminate\Support\Facades\Auth;

class invoiceController extends Controller
{
  private $invoice;

  public function __construct(invoiceRepository $invoice)
  {
   $this->invoice = $invoice; 
   $this->middleware('auth');   
  }
    public function index()
    {
       $invoice = $this->invoice->get_pending_user(Auth::user()->id);
       $steps[] = array('name'=>'Company Details','status'=>"completed");
       $steps[] = array('name'=>'Invoice Settlement','status'=>"active");
       $steps[] = array('name'=>'Finish','status'=>"pending");
       $modes[] = array('name'=>'ECOCASH','id'=>'ECOCASH');
       $modes[] = array('name'=>'ONEMONEY','id'=>'ONEMONEY');
       return view('invoicing.index',compact('invoice','steps','modes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
        $invoice = $this->invoice->get_pending_user(Auth::user()->id);
        return view('invoicing.show',compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
