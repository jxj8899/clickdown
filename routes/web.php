<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\HistoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/history', [ApiController::class, 'getHistory'])->name('api.history');
Route::post('/api/submit', [ApiController::class, 'submit'])->name('api.submit');

Route::get('/history', [HistoryController::class, 'index']);