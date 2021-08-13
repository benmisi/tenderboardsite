<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\vendorRepository;
use Illuminate\Support\Facades\Auth;

class vendorController extends Controller
{
   
    private $vendor;

    public function __construct(vendorRepository $vendor)
    {
        $this->vendor = $vendor;
    }
    public function index()
    {
        $applications = $this->vendor->get_all_by_user(Auth::user()->id);
        return view('user.vendorregistrations.index',compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $steps[] = array('name'=>'Company Details','status'=>"active");
        $steps[] = array('name'=>'Invoice Settlement','status'=>"pending");
        $steps[] = array('name'=>'Finish','status'=>"pending");

        $types[] = array("id"=>"NEW","name"=>"NEW");
        $types[] = array("id"=>"RENEW","name"=>"RENEW");
        $countries[]  = array("id"=>'ZIMBABWE',"name"=>"ZIMBABWE");
        $countries[] = array("id"=>"FOREIGN","name"=>"FOREIGN");
         return view('user.vendorregistrations.create',compact('steps',"types","countries"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate(['company'=>'required','applicationtype'=>'required','address'=>'required','city'=>'required','country'=>'required','zipcode'=>'required','bank'=>'required','accountnumber'=>'required','branch'=>'required','branchcode'=>'required','email'=>'required','name'=>'required','surname'=>'required','position'=>'required','year'=>'required']);
         return $this->vendor->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $application = $this->vendor->get_application($id);
        return view('user.vendorregistrations.show',compact('application'));
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
