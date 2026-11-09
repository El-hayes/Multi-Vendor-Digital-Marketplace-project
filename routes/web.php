<?php

use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\FrontEnd\KycVerificationController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth' , 'verified']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/password', [ProfileController::class, 'updatePassword'])->name('password.update');


////////  KYC Routes  //////////
    Route::get('/kyc', [KycVerificationController::class, 'index'])->name('kyc')->middleware('kyc');
    Route::post('/kyc', [KycVerificationController::class, 'store'])->name('kyc.store')->middleware('kyc');
});


require __DIR__ . '/auth.php';
