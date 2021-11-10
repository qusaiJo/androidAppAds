<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\AdsController;
use App\Http\Controllers\Dashboard\ArchiveController;
use App\Http\Controllers\Dashboard\SettingController;

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

/** Auth Routes */
Route::namespace('/')->middleware('ifLogin')->group(function(){
    Route::get('/',[AuthController::class,'viewLogin'])->name('viewLogin');
    Route::post('/login',[AuthController::class,'login'])->name('login');
});
   

/** Dashboard Routes */
Route::namespace('Dashboard')->middleware('adminAuth')->prefix('dashboard')->group(function(){
    Route::get('/',[HomeController::class,'index'])->name('dashboard');
    Route::get('logOut',[AuthController::class,'logout'])->name('dashboard.logout');

    /** Ads Routes */
    Route::prefix('Ads')->group(function(){
        Route::get('/',[AdsController::class,'index'])->name('dashboard.ads.index');
        Route::get('/create',[AdsController::class,'create'])->name('dashboard.ads.create');
        Route::get('/edit/{id}',[AdsController::class,'edit'])->name('dashboard.ads.edit');
        Route::post('/store',[AdsController::class,'store'])->name('dashboard.ads.store');
        Route::post('/update/{id}',[AdsController::class,'update'])->name('dashboard.ads.update');
        Route::get('/delete/{id}',[AdsController::class,'delete'])->name('dashboard.ads.delete');
    });

    /** Archive Routes */
    Route::prefix('Archive')->group(function(){
        Route::get('/',[ArchiveController::class,'index'])->name('dashboard.archive.index');
        Route::get('restore/{id}',[ArchiveController::class,'restore'])->name('dashboard.archive.restore');
        Route::get('delete/{id}',[ArchiveController::class,'delete'])->name('dashboard.archive.delete');
    });

    /** Setting Routes*/
    Route::prefix('Setting')->group(function(){
        Route::get('/',[SettingController::class,'edit'])->name('dashboard.setting.edit');
        Route::post('/edit',[SettingController::class,'update'])->name('dashboard.setting.update');
    });
});