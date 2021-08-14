<?php

namespace App\Http\Controllers\administrator;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\companyregistrationRepository;
use Illuminate\Http\Request;

class companyregistrationsController extends Controller
{
    private $registrations;

    public function __construct(companyregistrationRepository $registrations)
    {
       $this->registrations = $registrations;
       $this->middleware('auth'); 
    }

    public function index(){
        $applications = $this->registrations->getList();
        return view('administrator.registrations.index',compact('applications'));
    }

    public function show($id){
        $application = $this->registrations->getApplication($id);
        return view('administrator.registrations.show',compact('application'));
    }

    public function store(Request $request){
        $request->validate(['name'=>'required']);
        return $this->registrations->update($request);
    }
}
