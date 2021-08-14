<?php

namespace App\Http\Controllers\administrator;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\subscriptionRepository;
use Illuminate\Http\Request;

class subscriptionController extends Controller
{
    private $subscription;

    public function __construct(subscriptionRepository $subscription)
    {
       $this->subscription = $subscription;
       $this->middleware('auth'); 
    }

    public function index(){
        $subscriptions = $this->subscription->getList();

        return view('administrator.subscriptions.index',compact('subscriptions'));
    }
}
