<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/items', function () {
    return view('items', [
        'items' => [
            [
                'id' => '1',
                'name' => 'Keyboard',
                'price' => '₱ 350'
            ],
            [
                'id' => '2',
                'name' => 'Mouse',
                'price' => '₱ 250'
            ],
            [
                'id' => '3',
                'name' => 'Monitor',
                'price' => '₱ 1,450'
            ],
        ]
    ]);
});

Route::get('/items/{id}', function ($id) {
    $items = [
        [
            'id' => '1',
            'name' => 'Keyboard',
            'price' => '₱ 350'
        ],
        [
            'id' => '2',
            'name' => 'Mouse',
            'price' => '₱ 250'
        ],
        [
            'id' => '3',
            'name' => 'Monitor',
            'price' => '₱ 1,450'
        ],
    ];

    $item = Arr::first($items, fn($item) => $item['id'] == $id);

    return view('item', ['item' => $item]);
});

Route::get('/sales', function () {
    return view('sales');
});

Route::get('/pos', function () {
    return view('pos');
});