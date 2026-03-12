<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', [ContactController::class, 'create'])->name('contacts.create');
Route::get('/contacts', fn () => redirect()->route('contacts.create'));
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
