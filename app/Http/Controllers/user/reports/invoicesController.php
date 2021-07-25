<?php

namespace App\Http\Controllers\user\reports;

use App\Http\Controllers\Controller;
use App\Repositories\invoiceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class invoicesController extends Controller
{
    private $invoice;

    public function __construct(invoiceRepository $invoice)
    {
       $this->invoice = $invoice; 
    }
    public function index()
    {
        $invoices = $this->invoice->getList(Auth::user()->id);
        return view('reports.invoices',compact('invoices'));
    }

  
}
