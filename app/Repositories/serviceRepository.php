<?php
namespace App\Repositories;

use App\Models\service_price;
use App\Models\services;

class serviceRepository{
    public function getPrice($id,$locality){

        return service_price::whereservice_id($id)->wherelocality($locality)->orderby('id','desc')->first();
    }
}