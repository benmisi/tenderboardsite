<?php
namespace App\Repositories;

use App\Models\invoicenumber;
use App\Models\subscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class helperRepository{
    public function get_invoice_number($id){
        $number = invoicenumber::first();
        $inv = 'inv'.Carbon::now()->year."".Carbon::now()->month."".Carbon::now()->day."".$number->invoicenumber."".$id;
        $number->invoicenumber = $number->invoicenumber+1;
        $number->save();
        return $inv;
    }

    public function get_receipt_number($id){
        $number = invoicenumber::first();
        $inv = 'rpt'.Carbon::now()->year."".Carbon::now()->month."".Carbon::now()->day."".$number->invoicenumber."".$id;
        $number->invoicenumber = $number->invoicenumber+1;
        $number->save();
        return $inv;
    }

    public function get_current_subscription(){
        $subscription = subscription::whereuser_id(Auth::user()->id)->orderBy('id','desc')->first();
    }


}