<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'home');
Route::livewire('blogs', 'blogs');
Route::livewire('categories', 'categories');
Route::livewire('{uri}', 'blog')->where('uri', '.*')->name('post.uri');