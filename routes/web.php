<?php

use App\Http\Controllers\ShortenerController;
use Illuminate\Support\Facades\Route;

Route::get('/l/{link}', ShortenerController::class)->name('shortener');
Route::get('/', function () {
    return view('welcome');
});
