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
    $items = Item::with('supplier')->latest()->simplePaginate(3);

    return view('items.index', [
        'items' => $items
    ]);
});

Route::get('/items/create', function ()  {
    return view('items.create');
});

Route::get('/items/{id}', function ($id)  {
    $item = Item::find($id);

    return view('items.show', ['item' => $item]);
});

Route::post('/items', function () {
    // validation...

    Item::create([
        'name' => request('name'),
        'price' => request('price'),
        'supplier_id' => 1
    ]);

    return redirect('/items');
});

Route::get('/sales', function () {
    return view('sales');
});

Route::get('/pos', function () {
    return view('pos');
});