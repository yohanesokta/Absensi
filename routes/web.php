<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InitController;
use App\Http\Controllers\PostAction;
use App\Http\Controllers\AuthControllers;

Route::get('/',[InitController::class,"menu"]);
Route::get('/add',[PostAction::class,'add']);
Route::get('/view',[PostAction::class,'ViewData']);
Route::get('/delete',[PostAction::class,'ViewData']);
Route::get('/absen',[PostAction::class,'GTabsen']);
Route::get('/setting',[PostAction::class,'setting']);
Route::get('/pengaturan',[PostAction::class,'pengaturan']);

Route::get('/sign',[AuthControllers::class,'SignMenu']);
Route::get('/login',[AuthControllers::class,'LoginMenu']);

  // post
Route::post('/view/delete',[PostAction::class,'viewDelete']);
Route::post('/add/db',[PostAction::class,'actionAdd']);
Route::post('/absen/ch',[PostAction::class,'absenChange']);
Route::post('/sign',[AuthControllers::class,'store']);