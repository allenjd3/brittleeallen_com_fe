<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'home');
Route::livewire('blogs', 'blogs')->name('post.index');
Route::livewire('{uri}', 'blog')->where('uri', '.*')->name('post.uri');