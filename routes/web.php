<?php

use App\Http\Controllers\backend\BDashboardController;
use App\Http\Controllers\backend\BMajorController;
use App\Http\Controllers\backend\BCourseController;
use App\Http\Controllers\backend\BSubjectController;
use App\Http\Controllers\backend\BTeacherController;
use App\Http\Controllers\frontend\aboutController;
use App\Http\Controllers\frontend\coureseController;
use App\Http\Controllers\frontend\eventController;
use App\Http\Controllers\frontend\homeController;
use App\Http\Controllers\frontend\pricingController;
use App\Http\Controllers\frontend\trainerController;
use Illuminate\Support\Facades\Route;

// route frontend
Route::controller(homeController::class)->group(function(){
    Route::get('/','index');
});
Route::controller(aboutController::class)->group(function(){
    Route::get('/about','index');
});
Route::controller(eventController::class)->group(function(){
    Route::get('/event','index');
});
Route::controller(coureseController::class)->group(function(){
    Route::get('/courese','index');
});
Route::controller(trainerController::class)->group(function(){
    Route::get('/trainer','index');
});
Route::controller(pricingController::class)->group(function(){
    Route::get('/pricing','index');
});

// route backend

Route::controller(BDashboardController::class)->group(function(){
    Route::get('/dashboard','index');
});

Route::resource('/major', BMajorController::class);
Route::resource('/teacher', BTeacherController::class);
Route::resource('/course', BCourseController::class);
Route::resource('/subject', BSubjectController::class);
