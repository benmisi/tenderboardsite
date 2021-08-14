<?php
namespace App\Repositories\administrator;

use App\Models\directory;
use App\Models\invoices;
use App\Models\myapplications;
use App\Models\prazapplication;
use App\Models\procurement;
use App\Models\subscription;
use App\Models\User;
use App\Models\vendorapplication;

class homeRepository{

    public function summary(){
     
        $paidinvoices = invoices::whereIn('status',['PAID'])->get();
        $awaitinginvoices =  invoices::wherestatus('AWAITING')->get();
        $directories = directory::get();
        $companyregistration  = myapplications::get();
        $praz = prazapplication::get();
        $vendor = vendorapplication::get();
        $users = User::get();
        $subscriptions = subscription::wherestatus('ACTIVE')->get();
        $procurements = procurement::get();

        return array('paid'=>$paidinvoices->sum('amount'),'awaiting'=>$awaitinginvoices->sum('amount'),'users'=>count($users),'praz'=>count($praz),'registrations'=>count($companyregistration),'vendor'=>count($vendor),'notices'=>count($procurements),'subscriptions'=>count($subscriptions));
    }
}