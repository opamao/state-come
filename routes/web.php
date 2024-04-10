<?php

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
Route::get('/services', function () {
    return view('services.services');
});
Route::get('/categories', function () {
    return view('services.categories');
});
Route::get('/details', function () {
    return view('respos.details');
});
