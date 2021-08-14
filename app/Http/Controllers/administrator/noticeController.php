<?php

namespace App\Http\Controllers\administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\administrator\noticeRepository;

class noticeController extends Controller
{
    private $notice;

    public function __construct(noticeRepository $notice)
    {
      $this->notice = $notice; 
      $this->middleware('auth');
    }

    public function index(){
        $notices = $this->notice->getList();
        return view('administrator.notices.index',compact('notices'));
    }
}
