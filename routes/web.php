<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\LaboranController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[StudentController::class , 'indexLanding']);

//Login
Route::middleware('guest')->group(function() {
     Route::get('/login',[AuthController::class, 'indexLogin'])->name('login');
     Route::post('/login',[AuthController::class, 'auth'])->name('auth');
});

Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
Route::get('/daftar',[StudentController::class , 'createStudent'])->name('createStudent');
Route::post('/daftar',[StudentController::class, 'storeDaftar'])->name('storeDaftar');
Route::get('print-pdf', [StudentController::class, 'printPdf'])->name('printPdf');

//Admin
Route::middleware(['auth', 'is_admin'])->group(function () {
     Route::get('/dashboard/admin',[AdminController::class, 'indexAdmin'])->name('indexAdmin');
     
     Route::get('/data-sekolah',[AdminController::class, 'indexDataSekolah'])->name('dataSekolah');     
     Route::get('/create-data-sekolah',[AdminController::class, 'createDataSekolah'])->name('createDataSekolah');
     Route::post('/create-data-sekolah',[AdminController::class, 'storeDataSekolah'])->name('storeDataSekolah');
     Route::get('/delete-data-sekolah/{id}',[AdminController::class, 'd    eleteDataSekolah'])->name('deleteDataSekolah');
     
     Route::get('/bank', [AdminController::class, 'indexDataBank'])->name('indexBank');
     Route::get('/create-bank', [AdminController::class, 'createDataBank'])->name('createDataBank');
     Route::post('/create-bank', [AdminController::class, 'storeDataBank'])->name('storeDataBank');
     Route::get('/delete-bank/{id}', [AdminController::class, 'deleteDataBank'])->name('deleteDataBank');
     
     Route::get('/dashboard/payments', [AdminController::class, 'indexPayment'])->name('payments');
     Route::post('/dashboard/payments/validate/{nisn}', [AdminController::class, 'validationPayment'])->name('validationPayment');
     Route::post('/dashboard/payments/reject/{nisn}', [AdminController::class, 'rejectPayment'])->name('rejectPayment');
     Route::get('/dashboard/payments/{nisn}', [AdminController::class, 'showStudent'])->name('showStudent');
});
     
//Student
Route::middleware('auth')->group(function () {
     Route::get('/dashboard/student', [StudentController::class, 'indexStudent'])->name('indexStudent');
     Route::get('/dashboard/student/payment', [StudentController::class, 'createPayment'])->name('payment');
     Route::post('/dashboard/student/payment', [StudentController::class, 'storePayment'])->name('storePayment');
});  