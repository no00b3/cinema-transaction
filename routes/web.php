<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AllcustomerController;

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

Route::get('/customers', [CustomerController::class, 'index'])->name('customers')->middleware('auth');

Route::get('/tambahdata', [CustomerController::class, 'tambahdata'])->name('tambahdata');
Route::post('/insertdata', [CustomerController::class, 'insertdata'])->name('insertdata');


Route::get('/tampilkandata/{id}', [CustomerController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}', [CustomerController::class, 'updatedata'])->name('updatedata');

Route::get('/softDelete/{id}', [CustomerController::class, 'softDelete'])->name('softDelete');
Route::get('/forceDelete/{id}', [CustomerController::class, 'forceDelete'])->name('forceDelete');
Route::get('/trashed', [CustomerController::class, 'trashed'])->name('trashed');
Route::get('restore/{id}', [CustomerController::class, 'restore'])->name('restore');


Route::get('/film', [FilmController::class, 'film'])->name('film');
Route::get('/tambahdatafilm', [FilmController::class, 'tambahdatafilm'])->name('tambahdatafilm');
Route::post('/insertdatafilm', [FilmController::class, 'insertdatafilm'])->name('insertdatafilm');
Route::get('/softdeletefilm/{id}', [FilmController::class, 'softdeletefilm'])->name('softdeletefilm');
Route::get('/forcedeletefilm/{id}', [FilmController::class, 'forcedeletefilm'])->name('forcedeletefilm');
Route::get('/tampilkandatafilm/{id}', [FilmController::class, 'tampilkandatafilm'])->name('tampilkandatafilm');
Route::post('/updatedatafilm/{id}', [FilmController::class, 'updatedatafilm'])->name('updatedatafilm');
Route::get('/deletefilm/{id}', [FilmController::class, 'deletefilm'])->name('deletefilm');
Route::get('/trashedfilm', [FilmController::class, 'trashedfilm'])->name('trashedfilm');
Route::get('restorefilm/{id}', [FilmController::class, 'restorefilm'])->name('restorefilm');


Route::get('/payment', [PaymentController::class, 'payment'])->name('payment');
Route::get('/tambahdatapayment', [PaymentController::class, 'tambahdatapayment'])->name('tambahdatapayment');
Route::post('/insertdatapayment', [PaymentController::class, 'insertdatapayment'])->name('insertdatapayment');
Route::get('/tampilkandatapayment/{id}', [PaymentController::class, 'tampilkandatapayment'])->name('tampilkandatapayment');
Route::post('/updatedatapayment/{id}', [PaymentController::class, 'updatedatapayment'])->name('updatedatapayment');
Route::get('/deletepayment/{id}', [PaymentController::class, 'deletepayment'])->name('deletepayment');

Route::get('/AllCust', [AllcustomerController::class, 'AllCust'])->name('AllCust');

Route::get('/login', [logincontroller::class, 'login'])->name('login');
Route::get('/register', [logincontroller::class, 'register'])->name('register');
Route::post('/registeruser', [logincontroller::class, 'registeruser'])->name('registeruser');
Route::post('/loginprocess', [logincontroller::class, 'loginprocess'])->name('loginprocess');

Route::get('/logout', [logincontroller::class, 'logout'])->name('logout');


