<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});
Route::get('/respos', function () {
    return view('respos.resposables');
});
Route::get('/objectifsdg', function () {
    return view('objectifs.objectif-dg');
});
Route::get('/objectifsrespo', function () {
    return view('objectifs.objectif-respo');
});
Route::get('/details', function () {
    return view('respos.details');
});

Route::resource('services', ServicesController::class);
Route::resource('categories', CategoriesController::class);
