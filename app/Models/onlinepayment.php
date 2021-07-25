<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class onlinepayment extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function invoice(){
        return $this->hasOne(invoices::class,'invoicenumber','invoicenumber');
    }

    public function application(){
        return $this->hasOne(myapplications::class,'invoicenumber','invoicenumber');
    }
}
