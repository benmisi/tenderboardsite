<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Repositories\packagesRepository;
use App\Repositories\subscriptionRepository;
use Illuminate\Http\Request;

class subscriptionController extends Controller
{
    private $subscription;
    private $package;
    public function __construct(subscriptionRepository $subscription,packagesRepository $package)
    {
        $this->subscription = $subscription;
        $this->package = $package;
        $this->middleware('auth');
    }
    public function index()
    {
        $packages  = $this->package->getList();
        $durationlist[] = array("id"=>"","name"=>"");
        $durationlist[] = array("id"=>1,"name"=>"1 month");
        $durationlist[] = array("id"=>3,"name"=>"3 months");
        $durationlist[] = array("id"=>6,"name"=>"6 months");
        $durationlist[] = array("id"=>12,"name"=>"12 months");

        return view('user.subscription.index',compact('packages','durationlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate(['duration'=>'required']);
         return $this->subscription->createSubscription($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $package = $this->package->getPackage($id);
     $durationlist[] = array("id"=>"","name"=>"");
     $durationlist[] = array("id"=>30,"name"=>"1 month");
     $durationlist[] = array("id"=>90,"name"=>"3 months");
     $durationlist[] = array("id"=>180,"name"=>"6 months");
     $durationlist[] = array("id"=>365,"name"=>"12 months");

     return view('user.subscription.show',compact('package','durationlist','id'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
