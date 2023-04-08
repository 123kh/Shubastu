<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StockistController;
use App\Http\Controllers\MedicalController;
use App\Http\Controllers\MarketingController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\TdsController;
use App\Http\Controllers\AddcompanyController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\LinkStockistMedicalController;
use App\Http\Controllers\addmedicinecontroller;
use App\Http\Controllers\PrimarySaleController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\AddedmedicineController;
use App\Http\Controllers\PromotorSaleController;
use App\Http\Controllers\SecondarySaleController;
use App\Http\Controllers\StokistAdjustmentIssueController;
use App\Http\Controllers\UpdatemedicineController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PromotersaleReportController;
use App\Http\Controllers\UserController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[UserController::class,'index'])->name('login');
Route::post('login_submit',[UserController::class,'check_login'])->name('login_submit');
Route::get('logout',[UserController::class,'log_out'])->name('logout');


//dashboard
Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::post('assign_technician',[DashboardController::class,'assign_technician'])->name('assign_technician');
Route::get('destroy_dashboard/{id}',[DashboardController::class,'destroy'])->name('destroy_dashboard');

//Addcompany
Route::get('company',[AddcompanyController::class,'index'])->name('company');
Route::post('create-company',[AddcompanyController::class,'create'])->name('create-company');
Route::get('edit-company/{id}',[AddcompanyController::class,'edit'])->name('edit-company');
Route::post('update-company',[AddcompanyController::class,'update'])->name('update-company');
Route::get('destroy-company/{id}',[AddcompanyController::class,'destroy'])->name('destroy-company');

//city
Route::get('city',[CityController::class,'index'])->name('city');
Route::post('create_city',[CityController::class,'create'])->name('create_city');
Route::get('edit-city/{id}',[citycontroller::class,'edit'])->name('edit-city');
Route::post('update-city',[citycontroller::class,'update'])->name('update-city');
Route::get('destroy-city/{id}',[citycontroller::class,'destroy'])->name('destroy-city');

//stockist
Route::get('stockist',[StockistController::class,'index'])->name('stockist');
Route::post('create_stockist',[StockistController::class,'create'])->name('create_stockist');
Route::get('edit-stockist/{id}',[StockistController::class,'edit'])->name('edit-stockist');
Route::post('update-stockist',[StockistController::class,'update'])->name('update-stockist');
Route::get('destroy-stockist/{id}',[StockistController::class,'destroy'])->name('destroy-stockist');

//add_medical
Route::get('medical',[MedicalController::class,'index'])->name('medical');
Route::post('create_medical',[MedicalController::class,'create'])->name('create_medical');
Route::get('edit-medical/{id}',[MedicalController::class,'edit'])->name('edit-medical');
Route::post('update-medical',[MedicalController::class,'update'])->name('update-medical');
Route::get('destroy-medical/{id}',[MedicalController::class,'destroy'])->name('destroy-medical');

//marketing
Route::get('marketing',[MarketingController::class,'index'])->name('marketing');
Route::post('create_marketing',[MarketingController::class,'create'])->name('create_marketing');
Route::get('edit-marketing/{id}',[MarketingController::class,'edit'])->name('edit-marketing');
Route::post('update-marketing',[MarketingController::class,'update'])->name('update-marketing');
Route::get('destroy-marketing/{id}',[MarketingController::class,'destroy'])->name('destroy-marketing');

//add_doctor
Route::get('doctor',[DoctorController::class,'index'])->name('doctor');
Route::post('create_doctor',[DoctorController::class,'create'])->name('create_doctor');
Route::get('edit-doctor/{id}',[DoctorController::class,'edit'])->name('edit-doctor');
Route::post('update-doctor',[DoctorController::class,'update'])->name('update-doctor');
Route::get('destroy-doctor/{id}',[DoctorController::class,'destroy'])->name('destroy-doctor');

//year
Route::get('year',[YearController::class,'index'])->name('year');
Route::post('create_year',[YearController::class,'create'])->name('create_year');
Route::get('edit-year/{id}',[YearController::class,'edit'])->name('edit-year');
Route::post('update-year',[YearController::class,'update'])->name('update-year');
Route::get('destroy-year/{id}',[YearController::class,'destroy'])->name('destroy-year');

//tds
Route::get('tds',[TdsController::class,'index'])->name('tds');
Route::post('create_tds',[TdsController::class,'create'])->name('create_tds');

//add_medicine
Route::get('medicine',[MedicineController::class,'index'])->name('medicine');
Route::post('create_medicine',[MedicineController::class,'create'])->name('create_medicine');
Route::get('edit-medicine/{id}',[MedicineController::class,'edit'])->name('edit-medicine');
Route::post('update-medicine',[MedicineController::class,'update'])->name('update-medicine');
Route::get('destroy-medicine/{id}',[MedicineController::class,'destroy'])->name('destroy-medicine');

//link_stockist_medical
Route::get('linkstockist',[LinkStockistMedicalController::class,'index'])->name('linkstockist');
Route::post('create_linkstockist',[LinkStockistMedicalController::class,'create'])->name('create_linkstockist');
Route::get('edit-linkstockist/{id}',[LinkStockistMedicalController::class,'edit'])->name('edit-linkstockist');
Route::post('update-linkstockist',[LinkStockistMedicalController::class,'update'])->name('update-linkstockist');
Route::get('destroy-linkstockist/{id}',[LinkStockistMedicalController::class,'destroy'])->name('destroy-linkstockist');



//medicine

Route::get('medicine_master',[addmedicinecontroller::class,'index'])->name('medicine_master');

// Route::post('updatemedicinemasedit',[addmedicinecontroller::class,'updatemedicineedit'])->name('updatemedicinemasedit');
// Route::get('updatemedicinemaster',[addmedicinecontroller::class,'updatemedicinemas'])->name('updatemedicinemaster');
Route::get('medicine_master1',[addmedicinecontroller::class,'medlist'])->name('medicine_master1');
// Route::get('medicine_master1',[addmedicinecontroller::class,'search'])->name('medicine_master1');
// Route::get('/search', 'SearchController@search')->name('search');
Route::post('create_medicinem',[addmedicinecontroller::class,'create'])->name('create_medicinem');
Route::get('edit-medicinem/{id}',[addmedicinecontroller::class,'edit'])->name('edit-medicinem');
// Route::post('update-medicinem',[addmedicinecontroller::class,'update'])->name('update-medicinem');
Route::get('destroy-medicinem/{id}',[addmedicinecontroller::class,'destroy'])->name('destroy-medicinem');


//update_medicine
Route::post('updatemedicinemasedit',[UpdatemedicineController::class,'updatemedicineedit'])->name('updatemedicinemasedit');
Route::get('updatemedicinemaster',[UpdatemedicineController::class,'updatemedicinemas'])->name('updatemedicinemaster');
Route::get('getMed',[UpdatemedicineController::class,'getMedicine'])->name('getMed');
Route::get('get_batch_by_id1',[UpdatemedicineController::class,'batch1'])->name('get_batch_by_id1');
Route::get('get_mrppurchase_by_id',[UpdatemedicineController::class,'ptrmarket'])->name('get_mrppurchase_by_id');
// Route::post('updat-medicine',[UpdatemedicineController::class,'update'])->name('updat_medicine');


//primary_sale
Route::get('primary',[PrimarySaleController::class,'index'])->name('primary');
Route::post('create_primary',[PrimarySaleController::class,'create'])->name('create_primary');
Route::get('edit-primary/{id}',[PrimarySaleController::class,'edit'])->name('edit-primary');
Route::post('update-primary',[PrimarySaleController::class,'update'])->name('update-primary');
Route::get('destroy-primary/{id}',[PrimarySaleController::class,'destroy'])->name('destroy-primary');

//batch_no
Route::get('batch',[BatchController::class,'index'])->name('batch');
Route::post('create_batch',[BatchController::class,'create'])->name('create_batch');
Route::get('edit-batch/{id}',[BatchController::class,'edit'])->name('edit-batch');
Route::post('update-batch',[BatchController::class,'update'])->name('update-batch');
Route::get('destroy-batch/{id}',[BatchController::class,'destroy'])->name('destroy-batch');

//addedmecine
Route::get('addedmed',[addedmedicineController::class,'index'])->name('addedmed');
Route::post('create_addedmedicine',[AddedmedicineController::class,'create'])->name('create_addedmedicine');
// Route::get('edit-addedmedicine/{id}',[AddedmedicineController::class,'edit'])->name('edit-addedmedicine');
// Route::post('update-addedmedicine',[AddedmedicineController::class,'update'])->name('update-addedmedicine');
Route::get('destroy-addedmedicine/{id}',[MedicineController::class,'destroy'])->name('destroy-addedmedicine');


//promotor_sale
Route::get('promotor',[PromotorSaleController::class,'index'])->name('promotor');
Route::post('create_promotor',[PromotorSaleController::class,'create'])->name('create_promotor');
Route::get('get_market_by_id',[PromotorSaleController::class,'market'])->name('get_market_by_id');
Route::get('get_medical_by_id',[PromotorSaleController::class,'medical'])->name('get_medical_by_id');
Route::get('get_medicine_by_id',[PromotorSaleController::class,'medicine'])->name('get_medicine_by_id');
Route::get('get_ptrmarketing_by_id',[PromotorSaleController::class,'ptrmarket'])->name('get_ptrmarketing_by_id');
Route::get('scheme_medicine',[PromotorSaleController::class,'scheme_medicine'])->name('scheme_medicine');
Route::get('get_batch_by_id',[PromotorSaleController::class,'batch'])->name('get_batch_by_id');
// Route::get('scheme_medicine','Hello@scheme_medicine')->name('scheme_medicine');
// Route::get('get_qntymps_by_id',[PromotorSaleController::class,'qntymps'])->name('get_qntymps_by_id');

//secondary_sale
Route::get('secondary',[SecondarySaleController::class,'index'])->name('secondary');
Route::post('create-secondary',[SecondarySaleController::class,'create'])->name('create_secondary');
Route::get('get_medicine_by_id',[SecondarySaleController::class,'medicine'])->name('get_medicine_by_id');
Route::get('get_batch_no_by_id',[SecondarySaleController::class,'batchnocompany'])->name('get_batch_no_by_id');
Route::get('get_purchase_by_id',[SecondarySaleController::class,'purchase'])->name('get_purchase_by_id');

//stockist_issue
Route::get('stockist_issue',[StokistAdjustmentIssueController::class,'index'])->name('stockist_issue');
Route::get('get_scheme_by_id',[PromotorSaleController::class,'get_scheme'])->name('get_scheme_by_id');

//PromotersaleReport
Route::get('promotorreport',[PromotersaleReportController::class,'index'])->name('promotorreport');
Route::get('sale_entry_details',[PromotersaleReportController::class,'promotersalereport'])->name('sale_entry_details');
Route::get('market',[PromotersaleReportController::class,'marketing'])->name('market');
// Route::get('promotersledestroy',[PromotersaleReportController::class,'destroy'])->name('promotersledestroy');