<?php

use Illuminate\Support\Facades\Route;
use App\Models\Item;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/items', function ()  {
    $items = Item::with('supplier')->cursorPaginate(3);

    return view('items', [
        'items' => $items
    ]);
});

Route::get('/items/{id}', function ($id)  {
    $item = Item::find($id);

    return view('item', ['item' => $item]);
});

Route::get('/sales', function () {
    return view('sales');
});

Route::get('/pos', function () {
    return view('pos');
});