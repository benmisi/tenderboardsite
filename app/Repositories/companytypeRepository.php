<?php
namespace App\Repositories;

use App\Models\companytype;
use Illuminate\Http\Request;
class companytypeRepository{

    public function get_all_types(){
        return companytype::get();
    }

    public function create_type(Request $request,$id){
        if(!is_null($id)){
               $type = companytype::whereid($id)->first();
               $type->name = $request->name;
               $type->save();
        }else{
        companytype::create($request->only('name'));
        }
        return array("status"=>'statusSuccess',"message"=>'Company Type successfully Proceed');
    }

    public function delete($id){
        $type = companytype::whereid($id)->first();
        $type->delete();
        return array("status"=>'statusSuccess',"message"=>'Company Type successfully Proceed');

    }
}
