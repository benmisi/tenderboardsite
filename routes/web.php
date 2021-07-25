<?php

use App\Http\Controllers\user\companyregistrationController;
use App\Http\Controllers\user\documentController;
use App\Http\Controllers\user\invoiceController;
use App\Http\Controllers\user\paynowController;
use App\Http\Controllers\user\popController;
use App\Http\Controllers\user\prazController;
use App\Http\Controllers\user\prazitemController;
use App\Http\Controllers\user\reports\invoicesController;
use App\Http\Controllers\user\reports\paynowController as AppPaynowController;
use App\Http\Controllers\user\reports\receiptsController;
use App\Http\Controllers\user\reports\transfersController;
use App\Http\Controllers\user\trackController;
use App\Http\Controllers\welcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [welcomeController::class,'index'])->name('welcome');
Route::get('/Services',[welcomeController::class,'services'])->name('services');
Route::get('/Directory',[welcomeController::class,'directory'])->name('directory');
Route::get('/Directory/{uuid}',[welcomeController::class,'directoryshow'])->name('directory.show');
Route::get('/Category',[welcomeController::class,'categories'])->name('categories');
Route::get('/Tenders',[welcomeController::class,'tenders'])->name('tenders');
Route::get('/Tender/{uuid}',[welcomeController::class,'showtender'])->name('tender.show');
Route::get('/Contacts',[welcomeController::class,'contacts'])->name('contacts');
Route::get('/VendorRegistration',[welcomeController::class,'vendors'])->name('how.vendor');
Route::get('/CompanyRegistration',[welcomeController::class,'company'])->name('how.company');
Route::get('/PrazRegistration',[welcomeController::class,'praz'])->name('how.praz');
Route::get('NotificationRegistration',[welcomeController::class,'notifications'])->name('how.notifications');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/Company-service',companyregistrationController::class);
Route::resource('/praz-service',prazController::class);
Route::resource('/invoicing',invoiceController::class);
Route::resource('/uploadpop',popController::class);
Route::resource('/documents',documentController::class);
Route::resource('/tracking',trackController::class);
Route::resource('/mobilepayments',paynowController::class);
Route::resource('/praz-item',prazitemController::class);
Route::get('/reports/invoices',[invoicesController::class,'index'])->name('report-invoices');
Route::get('/reports/onlinepayments',[AppPaynowController::class,'index'])->name('report-paynow');
Route::get('/reports/transfers',[transfersController::class,'index'])->name('report-transfers');
Route::get('/reports/receipts/{id}',[receiptsController::class,'show'])->name('report-receipt');
