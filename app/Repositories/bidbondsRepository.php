<?php
namespace App\Repositories;

use App\Models\bidbonds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class bidbondsRepository{

    public function getList(){
        return bidbonds::get();
    }

    public function getByUser($id){
        return bidbonds::whereuser_id($id)->get();
    }

    public function add(Request $request){
        if(!bidbonds::where(['user_id'=>$request->user()->id,'tendernumber'=>$request->tendernumber])->whereIn('status',['PENDING','PROCESSED'])->exists())
        {
        $profile = $request->file('profile')->store('profile','publicFile');
        $document = $request->file('document')->store('document','publicFile');
        $pop = $request->file('pop')->store('pop','publicFile');
         bidbonds::updateOrCreate(['user_id'=>$request->user()->id,'tendernumber'=>$request->tendernumber,'company'=>$request->company,'entity'=>$request->entity,'tendernumber'=>$request->tendernumber,'profile'=>$profile,'document'=>$document,'pop'=>$pop]);
         return array("status"=>'statusSuccess',"message"=>"Request successfully proceed");
        }else{
            return array("status"=>'statusError',"message"=>"Request already saved");    
        }
    }


    public function delete($id){
        $bid = bidbonds::whereid($id)->whereuser_id(Auth::user()->id)->first();
        if($bid->status =='PENDING')
         {
             $bid->delete();
             return array("status"=>'statusSuccess',"message"=>"Request successfully Deleted");
         }else{
            return array("status"=>'statusError',"message"=>"Application status  has changed cannot be deleted");  
         }
     

    }
}