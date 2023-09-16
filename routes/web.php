<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::redirect('', '/contacts');


Route::controller(ContactController::class)->group(function () {
    Route::prefix('contacts')->group(function () {
        Route::view('', 'contact.index')->name('contact.index');
        Route::view('create', 'contact.create')->name('contact.create');
        Route::get('paginate', 'index');
        Route::get('{contact}', 'show')->name('contact.show')->where('contact', '[0-9]+');
        Route::post('store', 'store')->name('contact.store');
        Route::get('{id}/edit', 'edit')->name('contact.edit')->where('id', '[0-9]+');
        Route::post('{id}/update', 'update')->name('contact.update')->where('id', '[0-9]+');
        Route::get('{id}/delete', 'delete')->name('contact.delete')->where('id', '[0-9]+');
        Route::get('{id}/destroy', 'destroy')->name('contact.destroy')->where('id', '[0-9]+');
    });
});
