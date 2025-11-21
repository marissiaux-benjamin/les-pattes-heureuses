<?php

use Illuminate\Support\Facades\Route;

Route::get('/accueil',
    function () {
        return view('client.pages.home');
    }
)->name('accueil');

Route::get('/nos-chouchous',
    function () {
        return view('client.pages.animals.animals');
    }
)->name('animals');

Route::get('/contact',
    function () {
        return view('client.pages.contact');
    }
)->name('contact');
