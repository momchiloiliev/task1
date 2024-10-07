<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use libphonenumber\PhoneNumberUtil;

Route::get('/', function () {
    return view('newuser');
});

Route::post('/', [UserController::class, 'store'])->name('users.store');


