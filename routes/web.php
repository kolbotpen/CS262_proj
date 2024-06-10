<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UploadManager;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\CompanyController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('/welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/adminhome', [HomeController::class,'index'])->name('adminhome');
Route::get('/workspace', [HomeController::class,'workspace'])->name('workspace');

Route::get('/edit', [HomeController::class,'edit'])->name('edit');
Route::get('/edituser', [HomeController::class,'edituser'])->name('edituser');
Route::get('/setting', [HomeController::class,'setting'])->name('setting');

Route::get('post',[HomeController::class,'post'])->middleware(['auth', 'admin']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/task-insert', [UploadManager::class, "upload"])->name("upload");
Route::post('/task-insert', [UploadManager::class, "uploadPost"])->name("upload.post");

Route::get('/admin-addcompany', function () {
    return view('admin.admin-addcompany');
})->name('admin.addcompany');

// Route for storing a new company
Route::post('/admin-addcompany', [App\Http\Controllers\CompanyController::class, 'store'])->name('companies.store');
// Route for showing the workspace
Route::get('/workspace', [CompanyController::class, 'showWorkspace'])->name('workspace.show');
// ---------- VISOTH'S CODE | START ----------
// Landing
Route::get('/', function () {
    return view('landing');
});
Route::get('/landing', function () {
    return view('landing');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});

// LOGGED IN STARTS FROM HERE
// Get Started
Route::get('/start', function () {
    return view('start');
});
Route::get('/create', function () {
    return view('start-create');
});
Route::get('/search', function () {
    return view('start-search');
});
Route::get('/request', function () {
    return view('start-request');
});


// LOGGED IN AS "BOSS" STARTS FROM HERE
// Companies
Route::get('/companies', function () {
    return view('boss.companies');
});
// Route::get('/workspace', function () {
//     return redirect('/companies');
// });

// Team
Route::get('/team-all', function () {
    return view('boss.team-all');
});
Route::get('/team', function () {
    return view('boss.team');
});
Route::get('/team-add', function () {
    return view('boss.team-add');
});
Route::get('/team-add-member', function () {
    return view('boss.team-add-member');
});

Route::post('/teams', [TeamsController::class, 'store'])->name('teams.store');
Route::get('/companies', [App\Http\Controllers\HomeController::class, 'showCompanies'])->name('companies');

// Task
Route::get('/task-all', function () {
    return view('boss.task-all');
});
Route::get('/task', function () {
    return view('boss.task');
});

// Task Details
Route::get('/task-details', function () {
    return view('boss.task-details');
});
Route::get('/task-details-edit', function () {
    return view('boss.task-details-edit');
});

// Task Insert
Route::get('/task-insert', function () {
    return view('boss.task-insert');
});

// Calendar
Route::get('/calendar', function () {
    return view('boss.calendar');
});

// Settings
Route::get('/settings', function () {
    return view('boss.settings');
})->name('boss.settings');

// LOGGED IN AS "WORKER" STARTS FROM HERE
// nothing here yet, just us chickens


// ---------- VISOTH'S CODE | END ----------

require __DIR__.'/auth.php';
