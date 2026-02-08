<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'home');
Route::livewire('blogs', 'blogs')->name('post.index');
Route::livewire('contact', 'contact')->name('contacts');
Route::livewire('why-i-write', 'meet-brittany')->name('meet-brittany');
Route::livewire('{uri}', 'blog')
    ->where(
        'uri',
        '^(?!.*\.(css|js|png|jpg|jpeg|gif|svg|webp|ico|woff2?|ttf|map)).*$'
    )
    ->name('post.uri');