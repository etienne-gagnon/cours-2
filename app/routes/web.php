<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "La racine";
});

Route::get('/home/{nom?}', function ($nom='visiteur')	{
    return	view('home', compact('nom'));
})->name('home');

Route::get('/about/{variableDescription?}', function ($variableDescription = "Aucune description") {
    return view("about", ["variableDescription" => $variableDescription]);
})->name('about');


Route::get('/contact', function () {
    return view("contact");
})->name('contact');

Route::post('/contact', function () {
    return view("contact");
});
Route::get('/confirmation', function () {
    return view("confirmation");
})->name('confirmation');


