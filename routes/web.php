<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;

// Routes Publik
Route::get('/', function () {
    return view('home');
});

// Routes Project Dashboard - Publik (Tanpa Auth)
Route::get('/project', [ProjectController::class, 'dashboard'])->name('project.dashboard');

// Routes Login (Publik)
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'process'])->name('login.process');

// Routes Dashboard - Terlindungi dengan middleware 'check.login'
Route::middleware('check.login')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::put('/dashboard', [DashboardController::class, 'update'])->name('dashboard.update');
    Route::post('/logout', [DashboardController::class, 'logout'])->name('dashboard.logout');

    // Project Management Routes (inside dashboard)
    Route::get('/dashboard/projects', [ProjectController::class, 'dashboardProjects'])->name('dashboard.projects');
    Route::get('/dashboard/projects/create', [ProjectController::class, 'projectCreate'])->name('dashboard.projects.create');
    Route::post('/dashboard/projects', [ProjectController::class, 'projectStore'])->name('dashboard.projects.store');
    Route::get('/dashboard/projects/{project}/edit', [ProjectController::class, 'projectEdit'])->name('dashboard.projects.edit');
    Route::put('/dashboard/projects/{project}', [ProjectController::class, 'projectUpdate'])->name('dashboard.projects.update');
    Route::delete('/dashboard/projects/{project}', [ProjectController::class, 'projectDestroy'])->name('dashboard.projects.destroy');
});
