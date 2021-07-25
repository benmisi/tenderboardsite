<?php
namespace App\Repositories;

use App\Models\transfers;
use Illuminate\Http\Request;
class transferRepository{

    public function getList($id){
        return transfers::whereuser_id($id)->get();
    }

    public function upload(Request $request){
        $path = $request->file('filename')->store('pops','publicFile');
         $transfer = transfers::whereid($request->id)->first();
         $transfer->filename = $path;
         $transfer->save();
         return redirect()->back()->with('statusSuccess','Proof of payment successfully updated');
    }
}