<?php

namespace App\Http\Controllers\user\reports;

use App\Http\Controllers\Controller;
use App\Repositories\receiptsRepository;
use Illuminate\Http\Request;

class receiptsController extends Controller
{
    private $receipt;

    public function __construct(receiptsRepository $receipt)
    {
      $this->receipt = $receipt;  
    }
    
    public function show($id)
    {
        $receipt = $this->receipt->getReceipt($id);
        return view('reports.receipts',compact('receipt'));
    }

  
}
