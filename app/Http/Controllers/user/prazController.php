<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Repositories\companytypeRepository;
use App\Repositories\prazapplicationRepository;
use App\Repositories\prazcategoriesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class prazController extends Controller
{
    
    private $praz;
    private $categories;
    private $types;

    public function __construct(prazapplicationRepository $praz,prazcategoriesRepository $categories,companytypeRepository $types)
    {
      $this->praz = $praz;   
      $this->categories = $categories;
      $this->types = $types;
      $this->middleware('auth');
    }
    public function index()
    {
       $applications = $this->praz->getApplications(Auth::user()->id);
       return view('praz.index',compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companytypes = $this->types->get_all_types();
        $steps[] = array('name'=>'Company Details','status'=>"active");
        $steps[] = array('name'=>'Category Selection','status'=>"pending");
        $steps[] = array('name'=>'Categories Confirmation','status'=>"active");
        $steps[] = array('name'=>'Invoice Settlement','status'=>"pending");
        $steps[] = array('name'=>'Finish','status'=>"pending");
        $options[] =  array('name'=>'YES','id'=>'Y');
        $options[] =  array('name'=>'NO','id'=>'N');
        $id =2;
        return view('praz.create',compact('id','steps','options','companytypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['company'=>'required','accounttype'=>'required','country'=>'required','city'=>'required','account'=>'required','email'=>'required','password'=>'required']);
        return $this->praz->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $application = $this->praz->getAppplication($id);
       $categories = $this->categories->getList();
       $steps[] = array('name'=>'Company Details','status'=>"completed");
       $steps[] = array('name'=>'Category Selection','status'=>"active");
       $steps[] = array('name'=>'Categories Confirmation','status'=>"pending");
       $steps[] = array('name'=>'Invoice Settlement','status'=>"pending");
       $steps[] = array('name'=>'Finish','status'=>"pending");
       return view('praz.additems',compact('application','categories','steps'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         return $this->praz->confirm($id);
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
