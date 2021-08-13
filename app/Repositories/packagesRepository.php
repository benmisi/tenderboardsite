<?php
namespace App\Repositories;

use App\Models\packages;

class packagesRepository{
    public function getList(){
        return packages::get();
    }

    public function getPackage($id){
        return packages::whereid($id)->first();
    }
}