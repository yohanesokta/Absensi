<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InitController;
use App\Http\Controllers\PostAction;
use App\Http\Controllers\AuthControllers;

Route::get('/',[InitController::class,"menu"])->middleware('auth');
Route::get('/add',[PostAction::class,'add'])->middleware('auth');
Route::get('/view',[PostAction::class,'ViewData'])->middleware('auth');
Route::get('/delete',[PostAction::class,'ViewData'])->middleware('auth');
Route::get('/absen',[PostAction::class,'GTabsen'])->middleware('auth');
Route::get('/setting',[PostAction::class,'setting'])->middleware('auth');
Route::get('/pengaturan',[PostAction::class,'pengaturan'])->middleware('auth');

Route::get('/sign',[AuthControllers::class,'SignMenu'])->middleware('guest');
Route::get('/login',[AuthControllers::class,'LoginMenu'])->name('login')->middleware('guest');
Route::get('/setting/logout',[AuthControllers::class,'logout'])->middleware('auth');
Route::get('/setting/username',[PostAction::class,'ChangeUsername'])->middleware('auth');
  // post
Route::post('/view/delete',[PostAction::class,'viewDelete'])->middleware('auth');
Route::post('/add/db',[PostAction::class,'actionAdd'])->middleware('auth');
Route::post('/absen',[PostAction::class,'absen'])->middleware('auth');
Route::post('/sign',[AuthControllers::class,'store'])->middleware('guest');
Route::post('/login',[AuthControllers::class,'login'])->middleware('guest');
Route::post('/setting/username',[PostAction::class,'Cname'])->middleware('auth');