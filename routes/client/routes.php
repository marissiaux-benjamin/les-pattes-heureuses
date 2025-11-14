<?php

use Illuminate\Support\Facades\Route;

Route::get('/accueil',
    function () {
        return view('client.pages.home');
    }
)->name('accueil');

Route::get('/nos-chouchous',
    function () {
        return view('client.pages.nos-chouchous');
    }
)->name('nos-chouchous');

Route::get('/contact',
    function () {
        return view('client.pages.contact');
    }
)->name('contact');
