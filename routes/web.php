<?php

use App\Http\Controllers\AuditController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Models\Item;

Route::view('/', 'home');
Route::view('/dashboard', 'dashboard');
Route::view('/sales', 'sales');
Route::view('/pos', 'pos');

Route::resource('audits', AuditController::class);

Route::resource('items', ItemController::class); 
// 7 Basic function index, show, create, store, edit, update, destroy
// use ['only' => '' / 'except' => ''] to include or exclude

//Auth
Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);