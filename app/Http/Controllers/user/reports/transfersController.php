<?php

namespace App\Http\Controllers\user\reports;

use App\Http\Controllers\Controller;
use App\Repositories\transferRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class transfersController extends Controller
{
  
    private $transfer;

    public function __construct(transferRepository $transfer)
    {
        $this->transfer = $transfer;
    }
    public function index()
    {
        $transfers = $this->transfer->getList(Auth::user()->id);
        return view('reports.transfers',compact('transfers'));
    }

    public function update(Request $request,$id){
        return $this->transfer->upload($request);
    }

    
}
