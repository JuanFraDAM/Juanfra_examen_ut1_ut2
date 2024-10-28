<?php

use App\Http\Controllers\editmessage_controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/messages', function () {
    $messages = \App\Models\Message::all();
    return view('messages', ['messages' => $messages]);
});
Route::put('/showMessage/{id}', [editmessage_controller::class, 'showMessage'])->name('show.message');
Route::get('/showMessage/{id}', [editmessage_controller::class, 'showMessage'])->name('show.message');
Route::put('/editMessage/{id}', [editmessage_controller::class, 'editMessage'])->name('edit.message');
