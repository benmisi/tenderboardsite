<?php

namespace App\Repositories;

use App\Models\procurementtype;
use Illuminate\Http\Request;

class procurementtypeRepository{

    public function getList(){

        return procurementtype::get();
    }

    public function create(Request $request){
        procurementtype::create(['name'=>$request->name]);
        return redirect()->route('home')->with('statusSuccess','procurementtype Created');
    }

    public function update(Request $request,$id){
        $procurementtype = procurementtype::whereid($id)->first();
        $procurementtype->name = $request->name;
        $procurementtype->save();
        return redirect()->route('home')->with('statusSuccess','procurementtype Updated');
    }

    public function show($id){
        return procurementtype::whereid($id)->first();
    }

    public function delete($id){
        $procurementtype = procurementtype::whereid($id)->first();
        $procurementtype->delete();  
        return redirect()->route('home')->with('statusSuccess','procurementtype Deleted');
    }
}