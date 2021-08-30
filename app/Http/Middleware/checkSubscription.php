<?php

namespace App\Http\Middleware;

use App\Models\subscription;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class checkSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $sub = subscription::whereuser_id($request->user()->id)->orderBy('id','desc')->first();
        if(!is_null($sub))
        {
            if(strtoupper($sub->package->name) != strtoupper('FREE') && Carbon::now()->lte(Carbon::parse($sub->expire_date)))
            {
                return $next($request);
            }else{
                return redirect()->route('home')->with('statusError','You need an active subscription to access this resource');  
            }
            
        }else{
           return redirect()->route('home')->with('statusError','Please subscribe to access this resource');
        }
        
    }
}
