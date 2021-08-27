<?php

use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;

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

Route::group(["prefix"=>"product"],function(){


    Route::get("products",[AdminController::class,"products"])->name("products");
    Route::get("add",[AdminController::class,"add"])->name("add");
    Route::post("add",[AdminController::class,"add"])->name("add");
    Route::get("delete/{id}",[AdminController::class,"delete"]);
    Route::get("edit/{id}",[AdminController::class,"edit"])->name("edit");
    Route::post("edit/{id}",[AdminController::class,"edit"])->name("edit");


});