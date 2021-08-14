<?php

namespace App\Repositories;

use App\Models\category;
use Illuminate\Http\Request;

class categoriesRepository{

    public function getList(){

        return category::get();
    }

    public function get_list_tenders(){
        return category::with('notices')->get();
    } 

    public function create(Request $request){
        category::create(['name'=>$request->name]);
        return redirect()->route('home')->with('statusSuccess','Category Created');
    }

    public function update(Request $request,$id){
        $category = category::whereid($id)->first();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('home')->with('statusSuccess','Category Updated');
    }

    public function show($id){
        return category::whereid($id)->first();
    }

    public function delete($id){
        $category = category::whereid($id)->first();
        $category->delete();  
        return redirect()->route('home')->with('statusSuccess','Category Deleted');
    }
}