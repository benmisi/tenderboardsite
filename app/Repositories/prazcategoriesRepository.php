<?php
namespace App\Repositories;

use App\Models\prazcategory;

class prazcategoriesRepository{

    public function getList(){
        return prazcategory::get();
    }
}