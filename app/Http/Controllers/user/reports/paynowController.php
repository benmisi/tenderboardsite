<?php

namespace App\Http\Controllers\user\reports;

use App\Http\Controllers\Controller;
use App\Repositories\onlinepaymentsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class paynowController extends Controller
{
    private $online;

    public function __construct(onlinepaymentsRepository $online)
    {
      $this->online  = $online;    
    }
    public function index()
    {
        $onlinepayments = $this->online->getList(Auth::user()->id);
        return view('reports.onlinepayments',compact('onlinepayments'));
    }

   
}
