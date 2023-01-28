<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::prefix('contacts')->group(function () {
    Route::controller(ContactController::class)->group(function () {
        Route::get('paginate', 'index');
        Route::view('', 'contact.index')->name('contact.index');
    });
});
