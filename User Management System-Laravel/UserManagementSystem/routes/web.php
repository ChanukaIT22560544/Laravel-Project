<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

Route::resource('users', UserController::class);



Route::get('/', [UserController::class, 'index'])->name('users.index');

