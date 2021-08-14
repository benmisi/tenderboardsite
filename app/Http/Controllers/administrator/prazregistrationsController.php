<?php

namespace App\Http\Controllers\administrator;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\prazregistrationRepository;
use Illuminate\Http\Request;

class prazregistrationsController extends Controller
{
    private $praz;

    public function __construct(prazregistrationRepository $praz)
    {
     $this->praz = $praz;
     $this->middleware('auth');
    }

    public function index(){
        $applications = $this->praz->getList();
        return view('administrator.praz.index',compact('applications'));
    }

    public function show($id){
        return $this->praz->update($id);
    }
}
