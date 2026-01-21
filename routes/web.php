<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/projects', function () {
    return view('project');
});

use App\Http\Controllers\ProjectController;

Route::get('/project', [ProjectController::class, 'index'])->name('projects');
