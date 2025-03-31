<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Models\Item;

Route::view('/', 'home');
Route::view('/dashboard', 'dashboard');
Route::view('/sales', 'sales');
Route::view('/pos', 'pos');

Route::resource('items', ItemController::class); 
// 7 Basic function index, show, create, store, edit, update, destroy
// use ['only' => '' / 'except' => ''] to include or exclude