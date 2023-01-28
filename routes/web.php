<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::prefix('contacts')->group(function () {
    Route::controller(ContactController::class)->group(function () {
        Route::get('paginate', 'index');
        Route::view('', 'contact.index')->name('contact.index');
        Route::get('{id}', 'show')->name('contact.show')->where('id', '[0-9]+');
        Route::view('create', 'contact.create')->name('contact.create');
        Route::post('store', 'store')->name('contact.store');
        Route::get('{id}/edit', 'edit')->name('contact.edit')->where('id', '[0-9]+');
        Route::post('{id}/update', 'update')->name('contact.update')->where('id', '[0-9]+');
    });
});
