<?php
namespace App\Repositories;

use App\Models\prazcategory;
use Carbon\Carbon;

class prazcategoriesRepository{

    public function getList(){
        return prazcategory::orderBy('code','desc')->get();
       
    }
}