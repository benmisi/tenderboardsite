<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class directory extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function products(){
        return $this->hasMany(directory_product::class,'directory_id','id');
    }
}
