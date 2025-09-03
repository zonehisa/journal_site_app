<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
});

Volt::route('/articles', 'articles.index')->name('articles.index');
Volt::route('/articles/create', 'articles.create')->name('articles.create');
Volt::route('/articles/{article}', 'articles.show')->name('articles.show');
