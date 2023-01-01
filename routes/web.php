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


//peminjam
Route::get('/',[StudentController::class , 'indexLanding']);
Route::get('/daftar',[StudentController::class , 'createStudent'])->name('createStudent');
Route::post('/daftar',[StudentController::class, 'storeDaftar'])->name('storeDaftar');
Route::get('print-pdf', [StudentController::class, 'printPdf'])->name('printPdf');


//login
Route::get('/login',[AuthController::class, 'indexLogin'])->name('login');
Route::post('/login',[AuthController::class, 'auth'])->name('auth');
Route::get('/logout',[AuthController::class, 'logout'])->name('logout');


//laboran

Route::post('/approve-peminjaman',[LaboranController::class, 'approvePeminjaman'])->name('approve')->middleware('auth');


//admin indexDataLaboran storeDataLaboran deleteLaboranData
// Route::middleware(['isAdmin', 'auth:user,student'])->group(function() {
     Route::get('/dashboard',[AdminController::class, 'indexStudent'])->name('student');
     Route::get('/data-sekolah',[AdminController::class, 'indexDataSekolah'])->name('dataSekolah');     
     
     Route::get('/create-data-sekolah',[AdminController::class, 'createDataSekolah'])->name('createDataSekolah');
     Route::post('/store-data-sekolah',[AdminController::class, 'storeDataSekolah'])->name('storeDataSekolah');
     Route::get('/delete-sekolah/{id}',[AdminController::class, 'deleteDataSekolah'])->name('deleteDataSekolah');

     Route::get('/bank', [AdminController::class, 'indexDataBank'])->name('indexBank');
     Route::get('/create-bank', [AdminController::class, 'createDataBank'])->name('createDataBank');
     Route::post('/create-bank', [AdminController::class, 'storeDataBank'])->name('storeDataBank');
     Route::get('/delete-bank/{id}', [AdminController::class, 'deleteDataBank'])->name('deleteDataBank');
     
     Route::get('/dashboard/payments', [AdminController::class, 'indexPayment'])->name('payments');
     Route::post('/dashboard/payments/{nisn}', [AdminController::class, 'validationPayment'])->name('validationPayment');
     Route::get('/dashboard/payments/{nisn}', [AdminController::class, 'rejectPayment'])->name('rejectPayment');
     Route::get('/dashboard/payments/{nisn}', [AdminController::class, 'showStudent'])->name('showStudent');
// });

//student
Route::get('/dashboard/student', [StudentController::class, 'indexStudent'])->name('indexStudent');
Route::get('/dashboard/student/payment', [StudentController::class, 'createPayment'])->name('payment');
Route::post('/dashboard/student/payment', [StudentController::class, 'storePayment'])->name('storePayment');
