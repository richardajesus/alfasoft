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
        Route::get('{contact}/edit', 'edit')->name('contact.edit')->where('contact', '[0-9]+');
        Route::post('{contact}/update', 'update')->name('contact.update')->where('contact', '[0-9]+');
        Route::get('{contact}/delete', 'delete')->name('contact.delete')->where('contact', '[0-9]+');
        Route::get('{contact}/destroy', 'destroy')->name('contact.destroy')->where('contact', '[0-9]+');
    });
});
