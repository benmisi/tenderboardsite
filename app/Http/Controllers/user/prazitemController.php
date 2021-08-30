<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Repositories\prazapplicationRepository;
use Illuminate\Http\Request;

class prazitemController extends Controller
{
    private $invoice;
    private $praz;
    public function __construct(prazapplicationRepository $praz)
    {
     $this->praz   = $praz;   
     $this->middleware('auth');
    }
    public function index()
    {
        //
    }

   
   public function edit($id){

     return $this->praz->removeItem($id);
   }

   
    public function store(Request $request)
    {
         $request->validate(['selection'=>'required']);
         return $this->praz->addItem($request);
    }

   
    public function show($id)
    {
        $application = $this->praz->getItems($id);
        $steps[] = array('name'=>'Company Details','status'=>"completed");
       $steps[] = array('name'=>'Category Selection','status'=>"completed");
       $steps[] = array('name'=>'Categories Confirmation','status'=>"active");
       $steps[] = array('name'=>'Invoice Settlement','status'=>"pending");
       $steps[] = array('name'=>'Finish','status'=>"pending");
       return view('praz.confirm',compact('application','steps'));
    }

   
    public function destroy($id)
    {
        //
    }
}
