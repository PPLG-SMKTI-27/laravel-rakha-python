<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('portofolio');
});

use App\Http\Controllers\ProjectController;

Route::get('/project', [ProjectController::class, 'index'])->name('projects');
