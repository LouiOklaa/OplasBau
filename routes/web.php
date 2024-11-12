<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ServicesSectionsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes(['register' => false ,'reset' => false ,'verify' => false ,'confirm' => false]);

Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin', [HomeController::class, 'index']);
    Route::resource('galerie', GalleryController::class);
    Route::resource('dienstleistungen', ServicesController::class);
    Route::resource('dienstleistungensbereich', ServicesSectionsController::class);

});

Route::get('/{page}', [AdminController::class, 'index']);
