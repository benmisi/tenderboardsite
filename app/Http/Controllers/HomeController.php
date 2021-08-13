<?php

namespace App\Http\Controllers;

use App\Models\services;
use App\Repositories\subscriptionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $subscription;


    public function __construct(subscriptionRepository $subscription)
    {
        $this->subscription = $subscription;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $services = services::with(['applications'=>function($query){
            $query->where('user_id','=',Auth::user()->id);
        }])->get();
        $subscription = $this->subscription->get_my_subscription();
        return view('home',compact('services','subscription'));
    }
}
