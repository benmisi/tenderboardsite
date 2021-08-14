<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prazapplication extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function service(){
        return $this->hasOne(services::class,'id','service_id');
    }

    public function price(){
        return $this->hasOne(service_price::class,'service_id','service_id');

    }

    public function items()
    {
        return $this->hasMany(prazapplication_items::class,'prazapplication_id','id');
    }

    public function receipts(){
        return $this->hasMany(receipts::class,'invoicenumber','invoicenumber');
    }

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
