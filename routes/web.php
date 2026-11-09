<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;



//Route::get('/', function () {
//return view('welcome');
//});

Route::get('/',[HomeController::class, 'index']);

Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');

Route::get('/dashboard', [DashboardController::class, 'index'])
		->name('dashboard');

Route::resource('pelanggan', PelangganController::class);
Route::resource('user', UserController::class);