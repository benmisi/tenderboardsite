<?php

namespace App\Http\Controllers\administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\administrator\vendorRepository;

class vendorregistrationsController extends Controller
{
    private $vendor;

    public function __construct(vendorRepository $vendor)
    {
       $this->middleware('auth');
       $this->vendor = $vendor;  
    }

    public function index(){
        $applications = $this->vendor->getList();
        return view('administrator.vendor.index',compact('applications'));
    }

    public function show($id)
    {
        return $this->vendor->update($id);
    }
}
