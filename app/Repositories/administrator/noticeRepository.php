<?php
namespace App\Repositories\administrator;

use App\Models\procurement;

class noticeRepository{

    public function getList(){
        return procurement::with('user','categorylist','procurementtype')->orderBy('id','desc')->get();
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
        return procurement::with('categorylist','procurementtype')->whereuuid($uuid)->first();
    }

}