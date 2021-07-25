<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class myapplications extends Model
{
    use HasFactory;

    protected $guarded =[];

    protected $casts = [
        'fields' => 'array'
    ];

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function service(){
        return $this->hasOne(services::class,'id','service_id');
    }

    public function invoice(){
        return $this->hasOne(invoices::class,'invoicenumber','invoicenumber');
    }
}
