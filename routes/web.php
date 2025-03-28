<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/inventory', function () {
    return view('inventory');
});

Route::get('/sales', function () {
    return view('sales');
});

Route::get('/pos', function () {
    return view('pos');
});