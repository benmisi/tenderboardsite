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

    public function prazapplication(){
        return $this->hasOne(prazapplication::class,'invoicenumber','invoicenumber');
    }
    public function vendorapplication(){
        return $this->hasOne(vendorapplication::class,'invoicenumber','invoicenumber');
    }

    public function subscription(){
        return $this->hasOne(subscription::class,'invoicenumber','invoicenumber');
    }
}
