<?php
namespace App\Repositories;

use Paynow\Payments\Paynow;

class paynowsettingsRepository
{
  public function onlinepayments(){
    $paynow  = new Paynow('11762','01d96a3c-4e8b-4bd9-9931-212b7a82d5fc','http://127.0.0.1:8000/bidders/check','http://127.0.0.1:8000/bidders/check');
    return $paynow;
  }

  public function mobilepayments(){
    $paynow  = new Paynow('11762','01d96a3c-4e8b-4bd9-9931-212b7a82d5fc','http://127.0.0.1:8000/payment/Update','http://127.0.0.1:8000/payment/Update');
    return $paynow;
  }
}