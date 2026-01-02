<?php

use Illuminate\Support\Facades\Route;

// dashboard
Route::livewire(
    '/dashboard',
    'pages::dashboard')
    ->name('dashboard')
    ->middleware('auth');

Route::livewire('/adoptions/{id}', 'pages::adoption.show')->name('adoption.show')->middleware('auth');

// stats
Route::livewire('/statistic',
    'pages::statistic.index')
    ->name('statistic.index')
    ->middleware('auth');

// animals
Route::livewire('/animal-admin',
    'pages::animal.index')
    ->name('animal.index')
    ->middleware('auth');

Route::livewire('/animal-admin/{id}',
    'pages::animal.show')
    ->name('animal.show')
    ->middleware('auth');

Route::livewire('/animal-admin/{id}/edit',
    'pages::animal.edit')
    ->name('animal.edit')
    ->middleware('auth');

// member
Route::livewire('/member',
    'pages::member.index')
    ->name('member.index')
    ->middleware('auth');


// notification
Route::livewire('/notification',
    'pages::notification.index')
    ->name('notification.index')
    ->middleware('auth');


