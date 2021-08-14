<?php

namespace App\Http\Controllers;

use App\Repositories\categoriesRepository;
use App\Repositories\directoryRepository;
use App\Repositories\procurementnoticeRepository;
use Illuminate\Http\Request;

class welcomeController extends Controller
{
    private $notices;
    private $directory;
    private $category;
    public function __construct(procurementnoticeRepository $notices,directoryRepository $directory,categoriesRepository $category)
    {
        $this->notices = $notices;
        $this->directory = $directory;
        $this->category = $category;
        
    }
     public function index(){
         $notices = $this->notices->getPublishedList();
         $notices = $notices->take(10);
         return view('pages.index',compact('notices'));
     }

     public function services(){
         return view('pages.services');
     }

     public function contacts(){
         return view('pages.contacts');
     }

     public function directory(){
        $directorylist = $this->directory->get_published_list();
         return view('pages.directory',compact('directorylist'));
     }
    
     public function directoryshow($uuid){
        return view('pages.directoryshow');    
     }
     public function tenders(){
        $notices = $this->notices->getPublishedList();
         return view('pages.tenders',compact('notices'));
     }

     public function showtender($uuid){
         return view('pages.tendershow');
     }

     public function vendors(){
         return view('pages.vendors');
     }

     public function company(){
         return view('pages.company');
     }

     public function praz(){
        return view('pages.praz'); 
     }

     public function notifications(){
         return view('pages.notifications');
     }

     public function categories(){
         $categorylist = $this->category->get_list_tenders();
         return view('pages.categories',compact('categorylist'));
     }
}
