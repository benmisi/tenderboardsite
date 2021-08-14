<?php
namespace App\Repositories\administrator;

use App\Models\myapplications;
use Illuminate\Http\Request;

class companyregistrationRepository{
    public function getList(){

        return myapplications::with('user')->whereIn('status',['IN-PROGRESS',"PROCESSED"])->get();
    }

    public function getApplication($id){
        return myapplications::with('user')->whereid($id)->first();
    }

    public function update(Request $request){
        $application  = myapplications::whereid($request->id)->first();
        $application->approved = $request->name;
        $application->status ="PROCESSED";
        $application->save();

        return redirect()->route('admin-companyregistrations.index')->with('statusSuccess','Status Successfully Changed');
    }
}