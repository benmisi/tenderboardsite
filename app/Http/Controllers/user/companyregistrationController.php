<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\companytype;
use App\Repositories\applicationRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class companyregistrationController extends Controller
{
    private $applications;
    public function __construct(applicationRepository $applications)
    {
        $this->middleware('auth');
        $this->applications = $applications;
    }
    public function index()
    {
        $applications = $this->applications->get_applications_by_user(Auth::user()->id);
        return view('user.companyregistration.index',compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = 1;
        $companytypes = companytype::get();  
        $steps[] = array('name'=>'Company Details','status'=>"active");
        $steps[] = array('name'=>'Invoice Settlement','status'=>"pending");
        $steps[] = array('name'=>'Finish','status'=>"pending");
        return view('user.companyregistration.add',compact('companytypes','id','steps'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['corebusiness'=>'required','companytype'=>'required']);             
         
        return $this->applications->create_application($request);        
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $application = $this->applications->get_application_id($id);
       return view('user.companyregistration.show',compact('application'));
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
