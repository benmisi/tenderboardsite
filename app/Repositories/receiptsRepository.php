<?php
namespace App\Repositories;

use App\Models\receipts;

class receiptsRepository{

    public function getReceipt($id){
        return receipts::whereid($id)->first();
    }
}