<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "La racine";
});

Route::get('/home/{id}', 

function ($id) {
    return view('home', ['id' => $id]);
}

);

Route::get('/home', function () {
    return view('home');
});

