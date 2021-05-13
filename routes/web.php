<?php

use App\Http\Controllers\LinkController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LinkController::class, 'index'])->name('index');
Route::post('store', [LinkController::class, 'store'])->name('store');
Route::get('{shortName}', [LinkController::class, 'getLinkByShortName'])->name('get.link.by.short.name');
