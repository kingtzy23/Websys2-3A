<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiodataController;

// Redirect root URL to biodata form
Route::get('/', function () {
    return redirect('/biodata');
});

// Show the biodata form
Route::get('/biodata', [BiodataController::class, 'index'])->name('biodata.index');

// Preview biodata in new tab
Route::post('/biodata/preview', [BiodataController::class, 'preview'])->name('biodata.preview');
