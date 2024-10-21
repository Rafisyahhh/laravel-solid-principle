<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\ResidentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('address', AddressController::class);
Route::resource('status', StatusController::class);
Route::resource('education', EducationController::class);
Route::resource('work', WorkController::class);
Route::resource('family', FamilyController::class);
Route::resource('resident', ResidentController::class);
