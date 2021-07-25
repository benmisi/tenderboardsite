<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Repositories\prazapplicationRepository;
use App\Repositories\prazcategoriesRepository;
use Illuminate\Http\Request;

class prazController extends Controller
{
    
    private $praz;
    private $categories;

    public function __construct(prazapplicationRepository $praz,prazcategoriesRepository $categories)
    {
      $this->praz = $praz;   
      $this->categories = $categories;
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
