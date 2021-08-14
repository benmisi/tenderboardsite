<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoices extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pop(){
        return $this->hasOne(pop::class,'invoice_id','id');
    }

    public function receipts(){
        return $this->hasMany(receipts::class,'invoicenumber','invoicenumber');
    }

    public function transfer(){
        return $this->hasOne(transfers::class,'invoice_id','id');
    }

    public function application(){
        return $this->hasOne(myapplications::class,'invoicenumber','invoicenumber');
    }

    public function prazapplication(){
        return $this->hasOne(prazapplication::class,'invoicenumber','invoicenumber');
    }

    public function vendorapplication(){
        return $this->hasOne(vendorapplication::class,'invoicenumber','invoicenumber');
    }

    public function subscription(){
        return $this->hasOne(subscription::class,'invoicenumber','invoicenumber');
    }

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

}
