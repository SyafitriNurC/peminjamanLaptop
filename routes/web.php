<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaptopController;

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


Route::get('/', [LaptopController::class,'login'])->name('login');
Route::get('/home', [LaptopController::class,'index'])->name('home');
Route::post('/login/auth', [LaptopController::class, 'auth'])->name('login.auth');
Route::get('/register', [LaptopController::class,'register'])->name('register');
Route::post('/register', [LaptopController::class, 'registerAccount'])->name('register.createAccount');

Route::get('/logout', [LaptopController::class, 'logout'])->name('logout');

// Route::get('/', [LaptopController::class,'index'])->name('home');
Route::get('/create', [LaptopController::class, 'create'])->name('create');
Route::post('/store', [LaptopController::class, 'store'])->name('store');
Route::delete('/delete/{id}',  [LaptopController::class, 'destroy'])->name('delete');
Route::get('/complated', [LaptopController::class,'complated'])->name('complated');
Route::patch('/complated/{id}',  [LaptopController::class, 'updateComplated'])->name('update-complated');

