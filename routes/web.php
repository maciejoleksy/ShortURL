<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;

Route::get('/', [UrlController::class, 'index'])->name('index');
Route::post('short', [UrlController::class, 'short'])->name('short');
Route::get('{link}', [UrlController::class, 'shortLink'])->name('short.link');