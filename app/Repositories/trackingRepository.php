<?php
namespace App\Repositories;

use App\Models\myapplications;

class trackingRepository{

    public function getApplication($id,$user_id){
       return myapplications::with('invoice','service')->whereid($id)->whereuser_id($user_id)->first();
    }
}