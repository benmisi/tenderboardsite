<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class procurement extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function categorylist(){
        return $this->hasOne(category::class,'id','category_id');
    }

}
