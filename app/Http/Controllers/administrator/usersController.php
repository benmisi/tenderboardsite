<?php

namespace App\Http\Controllers\administrator;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\usersRepository;
use Illuminate\Http\Request;

class usersController extends Controller
{
      private $users;

      public function __construct(usersRepository $users)
      {
        $this->users = $users;
        $this->middleware('auth');          
      }

      public function index(){
          $users = $this->users->getList();

          return view('administrator.users.index',compact('users'));
      }

      public function create(){
          return view('administrator.users.upload');

      }

      public function store(Request $request){
          $request->validate(['filename'=>'required']);

          return $this->users->upload($request);
      }
}
