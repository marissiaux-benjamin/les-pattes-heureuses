<?php

use Illuminate\Support\Facades\Route;


// Home
Route::get('/accueil',
    function () {
        return view('client.pages.home');
    }
)->name('accueil');


// Animals
Route::get('/nos-chouchous',
    function () {
        return view('client.pages.animals.animals');
    }
)->name('animals');

Route::get('/nos-chouchous/id',
    function () {
        return view('client.pages.animals.show');
    }
)->name('animals.show');


// Contact
Route::get('/contact',
    function () {
        return view('client.pages.contact');
    }
)->name('contact');
