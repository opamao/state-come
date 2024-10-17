<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CommercialController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\EntreprisesController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\SaisirObjectifController;
use App\Http\Controllers\ServicesController;
use App\Models\Objectifs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('index', [CustomAuthController::class, 'index']);
Route::post('custom-login', [CustomAuthController::class, 'customLogin']);
Route::get('signout', [CustomAuthController::class, 'signOut']);

Route::get('register', [CustomAuthController::class, 'createUser']);

Route::get('/', function () {
    if (session()->has('type_user')) {
        if (Auth::user()->type_user == 'responsable') {
            return redirect()->intended('objectifsdg')->withSuccess('Bon retour');
        } else if (Auth::user()->type_user == 'directeur') {
            return redirect()->intended('dashboard')->withSuccess('Bon retour');
        }
    }
    return view('auth.login');
});
Route::get('/objectifsrespo', function () {
    return view('objectifs.objectif-respo');
});
Route::get('cate/{id}', [SaisirObjectifController::class, 'fetch']);
Route::post('/details', function (Request $request) {

    $saisir = new Objectifs();
    $saisir->date_objectif = $request->date;
    $saisir->objectif = $request->objectif;
    $saisir->service_id = $request->service;
    $saisir->responsable_id = $request->respo;
    $saisir->save();

    return back()->with('succes', "Objectif a été ajoué");
});

Route::resource('services', ServicesController::class);
Route::resource('categories', CategoriesController::class);
Route::resource('respos', ResponsableController::class);
Route::resource('objectifsdg', SaisirObjectifController::class);
Route::resource('comme', CommercialController::class);
Route::resource('entreprise', EntreprisesController::class);
