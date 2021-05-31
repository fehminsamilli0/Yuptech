<?php

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

Route::get('locale/{locale}',function($locale) {
    Session::put('locale',$locale);
    return redirect()->back();
});


Route::get('/', function () {
    return view('back.index');
})->name("index");


Route::get('/general-settings', "App\Http\Controllers\Back\GeneralController@settings")->name("GeneralSettings");
Route::post('/settings-update', "App\Http\Controllers\Back\GeneralController@settingsupdate")->name("SettingsUpdate");

Route::get('/general-about', "App\Http\Controllers\Back\GeneralController@about")->name("GeneralAbout");
Route::post('/about-update', "App\Http\Controllers\Back\GeneralController@aboutupdate")->name("AboutUpdate");



Route::get('/general-contact', "App\Http\Controllers\Back\GeneralController@contact")->name("GeneralContact");
Route::post('/contact-update', "App\Http\Controllers\Back\GeneralController@contactupdate")->name("ContactUpdate");
Route::post('/general-contact',"App\Http\Controllers\Back\GeneralController@smadd")->name("SmAdd");




Route::get('/service-list', "App\Http\Controllers\Back\ServiceController@service")->name("ServiceList");
Route::post('/service-status', "App\Http\Controllers\Back\ServiceController@servicestatus");
Route::post('/service-list', "App\Http\Controllers\Back\ServiceController@serviceadd")->name("ServiceAdd");
Route::post('/delete-service', 'App\Http\Controllers\Back\ServiceController@servicedelete');
Route::get('/service-edit/{id}', "App\Http\Controllers\Back\ServiceController@serviceeditindex")->name('ServiceEditIndex');
Route::post('/service-edit/{id}', "App\Http\Controllers\Back\ServiceController@serviceedit")->name('ServiceEdit');




Route::get('/service-cat', "App\Http\Controllers\Back\CatController@main_cat")->name("ServiceCat");
Route::post('/service-cat', "App\Http\Controllers\Back\CatController@catstatus")->name('catstatus');
Route::post('/service-category', "App\Http\Controllers\Back\CatController@catadd")->name("CatAdd");
Route::post('/delete-cat', "App\Http\Controllers\Back\CatController@catdelete");



Route::get('/emp', "App\Http\Controllers\Back\EmployeesController@emp")->name("Employees");
Route::post('/emp-status', "App\Http\Controllers\Back\EmployeesController@empstatus");
Route::post('/emp', "App\Http\Controllers\Back\EmployeesController@empadd")->name("EmpAdd");
Route::post('/delete-emp', 'App\Http\Controllers\Back\EmployeesController@empdelete');




Route::get('/job', "App\Http\Controllers\Back\JobController@job")->name("Job");
Route::post('/job-add', "App\Http\Controllers\Back\JobController@jobadd")->name("JobAdd");
Route::post('/job-delete', "App\Http\Controllers\Back\JobController@jobdelete")->name("JobDelete");
Route::post('/job-status', "App\Http\Controllers\Back\JobController@jobstatus");

Route::get('/job-edit/{id}', "App\Http\Controllers\Back\JobController@jobeditindex")->name('JobEditIndex');
Route::post('/job-edit/{id}', "App\Http\Controllers\Back\JobController@jobupdate")->name('JobEdit');


Route::get('/portfolio', "App\Http\Controllers\Back\PortfolioController@portfolio")->name("Portfolio");
Route::post('/port-status', "App\Http\Controllers\Back\PortfolioController@portstatus");
Route::get('/portfolio-edit/{id}', "App\Http\Controllers\Back\PortfolioController@portfolioeditindex")->name('PortfolioEditIndex');
Route::post('/portfolio-edit/{id}', "App\Http\Controllers\Back\PortfolioController@portfolioedit")->name('PortfolioEdit');
Route::post('/delete-port', 'App\Http\Controllers\Back\PortfolioController@portfoliodelete');



Route::get('/portfolio-cat', "App\Http\Controllers\Back\Portfolio_Cat@cat")->name("PortfolioCat");
Route::post('/portfolio-cat', "App\Http\Controllers\Back\Portfolio_Cat@catstatus")->name('catstatus');
Route::post('/portfolio-list', "App\Http\Controllers\Back\PortfolioController@portfolioadd")->name("PortfolioAdd");
Route::post('/portfolio-category', "App\Http\Controllers\Back\Portfolio_Cat@portcatadd")->name("PortCatAdd");
Route::post('/delete-portcat', "App\Http\Controllers\Back\Portfolio_Cat@catdelete");



Route::get('/team', "App\Http\Controllers\Back\TeamController@team")->name("Team");
Route::post('/team', "App\Http\Controllers\Back\TeamController@teamadd")->name("TeamAdd");
Route::post('/team-delete', "App\Http\Controllers\Back\TeamController@teamdelete")->name("TeamDelete");
Route::get('/team-edit/{id}', "App\Http\Controllers\Back\TeamController@teameditindex")->name('TeamEditIndex');
Route::post('/team-edit/{id}', "App\Http\Controllers\Back\TeamController@teamedit")->name('TeamEdit');
Route::post('/team-status', "App\Http\Controllers\Back\TeamController@teamstatus");



Route::get('/subs', "App\Http\Controllers\Back\SubscriptionController@subscribe")->name("Subs");
Route::post('/subs-delete', "App\Http\Controllers\Back\SubscriptionController@subsdelete")->name("SubsDelete");

Route::get('/thougths', "App\Http\Controllers\Back\ThoughtsController@thoughts")->name("Thoughts");
Route::post('/thoughts-delete', "App\Http\Controllers\Back\ThoughtsController@thoughtsdelete")->name("ThoughtsDelete");
Route::post('/thoughts-status', "App\Http\Controllers\Back\ThoughtsController@thoughtsstatus")->name("ThoughtsStatus");



Route::get('/slider', "App\Http\Controllers\Back\SliderController@slider")->name("Slider");
Route::post('/slider', "App\Http\Controllers\Back\SliderController@slideradd")->name("SliderAdd");
Route::post('/slider-status', "App\Http\Controllers\Back\SliderController@sliderstatus");
Route::post('/delete-slider', "App\Http\Controllers\Back\SliderController@sliderdelete");


Route::get('/payment', "App\Http\Controllers\Back\PaymentController@payment")->name("Payment");
