<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanDetailsController;
use App\Http\Controllers\EmiDetailsController;

// App::bind('App\Repositories\LoanDetailRepositoryInterface',  'App\Repositories\emiDetailRepositoryInterface');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/loan-details', [LoanDetailsController::class, 'index'])->name('loan_details.index');
Route::get('/emi-details', [EmiDetailsController::class, 'show'])->name('emi_details.show');
Route::get('/process-emi-data', function () {
    return view('emi_details.process');
})->name('emi_details.process.page');
Route::get('/process-data', [EmiDetailsController::class, 'process'])->name('emi_details.process');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
