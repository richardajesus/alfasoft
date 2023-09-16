<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::view('login', 'auth.login')->name('login');
    Route::view('register', 'auth.register')->name('auth.register');
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::get('logout', 'logout')->name('auth.logout');
});

Route::redirect('', '/contacts');

Route::controller(ContactController::class)->group(function () {
    Route::prefix('contacts')->group(function () {
        Route::view('', 'contact.index')->name('contact.index');
        Route::view('create', 'contact.create')->name('contact.create')->middleware('auth');
        Route::get('paginate', 'index');
        Route::get('{contact}', 'show')->name('contact.show')->where('contact', '[0-9]+');
        Route::post('store', 'store')->name('contact.store')->middleware('auth');
        Route::get('{contact}/edit', 'edit')->name('contact.edit')->where('contact', '[0-9]+')->middleware('auth');
        Route::post('{contact}/update', 'update')->name('contact.update')->where('contact', '[0-9]+')->middleware('auth');
        Route::get('{contact}/delete', 'delete')->name('contact.delete')->where('contact', '[0-9]+')->middleware('auth');
        Route::get('{contact}/destroy', 'destroy')->name('contact.destroy')->where('contact', '[0-9]+')->middleware('auth');
    });
});
