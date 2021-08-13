<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class directory_product extends Model
{
    use HasFactory;

    protected $guarded =[];

    public  function directory(){
        return $this->hasOne(directory::class,'id','directory_id');
    }
}
