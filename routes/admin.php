<?php

use Illuminate\Support\Facades\Route;


Route::livewire(
    '/dashboard',
    'pages::dashboard')
    ->name('dashboard')
    ->middleware('auth');

Route::livewire('/statistic',
    'pages::statistic.index')
    ->name('statistic.index')
    ->middleware('auth');

Route::livewire('/animal',
    'pages::animal.index')
    ->name('animal.index')
    ->middleware('auth');

Route::livewire('/member',
    'pages::member.index')
    ->name('member.index')
    ->middleware('auth');

Route::livewire('/notification',
    'pages::notification.index')
    ->name('notification.index')
    ->middleware('auth');




