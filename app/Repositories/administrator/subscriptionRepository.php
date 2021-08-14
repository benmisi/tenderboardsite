<?php
namespace App\Repositories\administrator;

use App\Models\subscription;

class subscriptionRepository{
    public function getList(){
        return subscription::with('user','package')->orderBy('id','desc')->get();
    }

}