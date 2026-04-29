<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillsController;
use Illuminate\Support\Facades\Route;

// Routes Publik
Route::get('/', function () {
    $skills = \App\Models\Skill::all();
    return view('home', compact('skills'));
});

// Routes Skills (Publik)
Route::get('/skills', [SkillsController::class, 'index'])->name('skills.index');

// Routes Project Dashboard (Publik)
Route::get('/project', [ProjectController::class, 'dashboard'])->name('project.dashboard');
// Routes Dashboard (Protected by Breeze Auth)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::put('/dashboard', [DashboardController::class, 'update'])->name('dashboard.update');

    // Project Management Routes
    Route::get('/dashboard/projects', [ProjectController::class, 'dashboardProjects'])->name('dashboard.projects');
    Route::get('/dashboard/projects/create', [ProjectController::class, 'projectCreate'])->name('dashboard.projects.create');
    Route::post('/dashboard/projects', [ProjectController::class, 'projectStore'])->name('dashboard.projects.store');
    Route::get('/dashboard/projects/{project}/edit', [ProjectController::class, 'projectEdit'])->name('dashboard.projects.edit');
    Route::put('/dashboard/projects/{project}', [ProjectController::class, 'projectUpdate'])->name('dashboard.projects.update');
    Route::delete('/dashboard/projects/{project}', [ProjectController::class, 'projectDestroy'])->name('dashboard.projects.destroy');

    // Skills Management Routes
    Route::get('/dashboard/skills', [SkillsController::class, 'dashboardSkills'])->name('dashboard.skills');
    Route::get('/dashboard/skills/create', [SkillsController::class, 'create'])->name('dashboard.skills.create');
    Route::post('/dashboard/skills', [SkillsController::class, 'store'])->name('dashboard.skills.store');
    Route::get('/dashboard/skills/{skill}/edit', [SkillsController::class, 'edit'])->name('dashboard.skills.edit');
    Route::put('/dashboard/skills/{skill}', [SkillsController::class, 'update'])->name('dashboard.skills.update');
    Route::delete('/dashboard/skills/{skill}', [SkillsController::class, 'destroy'])->name('dashboard.skills.destroy');

    // Breeze Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// routes/web.php - buat sementara route debug
Route::get('/debug', function () {
    echo "<h1>Debug Page</h1>";

    // Cek session
    echo "<h3>Session Data:</h3>";
    echo "<pre>";
    print_r(session()->all());
    echo "</pre>";

    // Cek database skills
    echo "<h3>Database Skills:</h3>";
    $skills = \App\Models\Skill::all();
    echo "Count: " . $skills->count() . "<br>";
    echo "<pre>";
    print_r($skills->toArray());
    echo "</pre>";

    // Cek apakah view file ada
    echo "<h3>View Files:</h3>";
    $viewPath = resource_path('views/admin/skills/index.blade.php');
    echo "admin/skills/index.blade.php exists: " . (file_exists($viewPath) ? 'YES' : 'NO') . "<br>";

    // Cek app layout
    $layoutPath = resource_path('views/layouts/app.blade.php');
    echo "layouts/app.blade.php exists: " . (file_exists($layoutPath) ? 'YES' : 'NO');
});

// Route khusus untuk test view saja
Route::get('/test-view', function () {
    $skills = \App\Models\Skill::all();
    return view('admin.skills.index', compact('skills'));
});
