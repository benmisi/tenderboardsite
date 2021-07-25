<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\companytype;
use App\Repositories\applicationRepository;
use Illuminate\Http\Request;

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
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
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
        $companytypes = companytype::get();

        if($id==1)
        {
        
         
        $steps[] = array('name'=>'Company Details','status'=>"active");
        $steps[] = array('name'=>'Invoice Settlement','status'=>"pending");
        $steps[] = array('name'=>'Finish','status'=>"pending");
        return view('services.company',compact('companytypes','id','steps'));
        }elseif ($id ==2) {
            $steps[] = array('name'=>'Company Details','status'=>"active");
            $steps[] = array('name'=>'Category Selection','status'=>"pending");
            $steps[] = array('name'=>'Invoice Settlement','status'=>"pending");
            $steps[] = array('name'=>'Finish','status'=>"pending");
            $options[] =  array('name'=>'YES','id'=>'Y');
            $options[] =  array('name'=>'NO','id'=>'N');
                     return view('services.praz',compact('id','steps','options','companytypes'));
        }
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
