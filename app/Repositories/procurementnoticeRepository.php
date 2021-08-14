<?php
namespace App\Repositories;

use App\Models\procurement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class procurementnoticeRepository{

    public function getAll(){
        return procurement::with('category')->whereNotIn('user_id',[Auth::user()->id])->get();

    }

    public function getPublishedList(){
        return procurement::with('category')->wherestatus('PUBLIC')->orderBy('id','desc')->get();    
    }
    public function create(Request $request){

        $path = $request->file('filename')->store('notices','publicFile');
        $uuid = Str::uuid();
        procurement::create(['user_id'=>$request->user()->id,'uuid'=>$uuid,'company'=>$request->company,'type'=>$request->type,'title'=>$request->title,'description'=>$request->description,'closing_date'=>$request->closingdate,'document'=>$path,'status'=>$request->status,'category_id'=>$request->category]);
        return redirect()->route('home')->with('statusSuccess','Notice successfully Saved');
    }

    public function update(Request $request ,$id)
    {
        $procurement =  procurement::whereid($id)->first();        
        $path = $request->file('filename')->store('notices','publicFile');
        $procurement->company = $request->company;
        $procurement->type = $request->type;
        $procurement->title = $request->title;
        $procurement->description = $request->description;
        $procurement->closing_date = $request->closingdate;
        $procurement->document = $path;
        $procurement->status = $request->status;
        $procurement->save();
        return redirect()->route('home')->with('statusSuccess','Notice successfully Updated');
    }

    public function getnotice($uuid){
        return procurement::whereuuid($uuid)->first();
    }

    public function delete($uuid){
        $procurement = procurement::whereuuid($uuid)->first();
        $procurement->delete();
        return redirect()->route('home')->with('statusSuccess','Notice successfully Deleted');

    }

}