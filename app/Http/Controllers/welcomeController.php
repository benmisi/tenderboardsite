<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class welcomeController extends Controller
{
     public function index(){
         return view('pages.index');
     }

     public function services(){
         return view('pages.services');
     }

     public function contacts(){
         return view('pages.contacts');
     }

     public function directory(){
         return view('pages.directory');
     }
    
     public function directoryshow($uuid){
        return view('pages.directoryshow');    
     }
     public function tenders(){
         return view('pages.tenders');
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
         return view('pages.categories');
     }
}
