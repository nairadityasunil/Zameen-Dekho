<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'login_form'])->name('login_form');
Route::post('/authenticate',[LoginController::class,'authenticate'])->name('authenticate');
Route::get('/home',[HomeController::class,'home'])->name('home');

// Routes related to properties
Route::get('/new_property', [PropertyController::class, 'new_property'])->name('new_property');
Route::post('/save_new_property', [PropertyController::class, 'save_new_property'])->name('save_new_property');
Route::get('/all_properties',[PropertyController::class,'all_properties'])->name('all_properties');
Route::get('/update_property/{id}',[PropertyController::class,'update_form'])->name('update_form');
Route::post('/save_property_update/{id}',[PropertyController::class,'save_property_update'])->name('save_property_update');
Route::get('/delete_property/{id}',[PropertyController::class,'delete_property'])->name('delete_property');

// Route to search property
Route::post('/search_property',[PropertyController::class,'search_property'])->name('search_property');

Route::get('/add_wishlist/{id}',[UserController::class, 'add_wishlist'])->name('add_wishlist');
Route::get('/wishlist',[UserController::class,'wishlist'])->name('wishlist');
Route::get('/remove_wishlist/{id}',[UserController::class,'remove_wishlist'])->name('remove_wishlist');