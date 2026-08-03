<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Client.Pages.Home');
})->name('home');

Route::get('/discrete_mathematics', function() {
    return view('Client.Pages.DM');
})->name('discrete_math');
