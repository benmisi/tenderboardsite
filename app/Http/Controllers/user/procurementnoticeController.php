<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Repositories\categoriesRepository;
use Illuminate\Http\Request;
use App\Repositories\procurementnoticeRepository;
use App\Repositories\procurementtypeRepository;

class procurementnoticeController extends Controller
{
    
    private $notice;
    private $types;
    private $categories;

    public function __construct(procurementnoticeRepository $notice,categoriesRepository $categories,procurementtypeRepository $types)
    {
       $this->notice = $notice;  
       $this->categories = $categories;
       $this->types = $types;
       $this->middleware(['auth','checsubscription']);
    }
    public function index()
    {
         $procurements = $this->notice->getAll();
         return view('user.notices.index',compact('procurements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $types = $this->types->getList();
       $categories = $this->categories->getList();
       $visibilitylist[] = array("id"=>'PRIVATE','name'=>'PRIVATE');
       $visibilitylist[] = array("id"=>'PUBLIC','name'=>'PUBLIC');
       return view('user.notices.create',compact('types','categories','visibilitylist'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate(['title'=>'required','type'=>'required','description'=>'required','company'=>'required','closingdate'=>'required','filename'=>'required','status'=>'required','category'=>'required']);
         return $this->notice->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $notice = $this->notice->getnotice($id);
         return view('user.notices.show',compact('notice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = $this->types->getList();
        $categories = $this->categories->getList();
        $notice = $this->notice->getnotice($id);
       
        $visibilitylist[] = array("id"=>'PRIVATE','name'=>'PRIVATE');
       $visibilitylist[] = array("id"=>'PUBLIC','name'=>'PUBLIC');
         return view('user.notices.edit',compact('notice','types','categories','visibilitylist'));
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
        $request->validate(['title'=>'required','type'=>'required','description'=>'required','company'=>'required','closingdate'=>'required','filename'=>'required','status'=>'required','category'=>'required']);
        return $this->notice->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
         return $this->notice->delete($id);
    }
}
