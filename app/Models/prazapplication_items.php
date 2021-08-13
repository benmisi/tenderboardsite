<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prazapplication_items extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function category(){
        return $this->hasOne(prazcategory::class,'id','prazcategory_id');
    }
}
