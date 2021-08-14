<?php

namespace App\Http\Controllers\administrator;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\homeRepository;
use Illuminate\Http\Request;

class homeController extends Controller
{
    private $admin;

    
     public function __construct(homeRepository $admin)
     {
         $this->middleware('auth');
         $this->admin = $admin; 
     }

     public function index(){
         $summary = $this->admin->summary();
         return view('administrator.home',compact('summary'));
     }
}
