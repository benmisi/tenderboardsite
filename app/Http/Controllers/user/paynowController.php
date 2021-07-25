<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Repositories\onlinepaymentsRepository;
use Illuminate\Http\Request;

class paynowController extends Controller
{
   
    private $onlinepayments;

    public function __construct(onlinepaymentsRepository $onlinepayments)
    {
     $this->onlinepayments = $onlinepayments;
    }
    public function index()
    {
        //
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
    $request->validate(['phonenumber'=>'required','amount'=>'required','mode'=>'required']);
    return $this->onlinepayments->initiate($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $steps[] = array('name'=>'Company Details','status'=>"completed");
        $steps[] = array('name'=>'Invoice Settlement','status'=>"active");
        $steps[] = array('name'=>'Finish','status'=>"pending");
        return view('payments.confirmmobilepayment',compact('steps','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->onlinepayments->confirm($id);
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
