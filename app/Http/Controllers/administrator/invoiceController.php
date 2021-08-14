<?php

namespace App\Http\Controllers\administrator;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\invoicesRepository;
use Illuminate\Http\Request;

class invoiceController extends Controller
{
    private $invoice;

    public function __construct(invoicesRepository $invoice)
    {
       $this->invoice = $invoice;
       $this->middleware('auth'); 
    }

    public function index(){
        $invoices= $this->invoice->getList();
        return view('administrator.invoices.index',compact('invoices'));   
    }
    public function show($id){
        $invoices= $this->invoice->getByStatus($id);
        return view('administrator.invoices.invoice',compact('invoices'));        
    }

    public function edit($id){
        return $this->invoice->settle($id);
    }
}
