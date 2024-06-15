<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
// ---------- FRONTEND | START ----------------
// LARAVEL WELCOME
Route::get('/', function () {
    return view('/welcome');
});
// WORKSPACE
Route::get('/workspace', [HomeController::class,'workspace'])->name('workspace');
Route::get('/workspace/companies', [CompanyController::class,'showWorkspace'])->name('company.workspace');
Route::get('/workspace/teams', [TeamsController::class, 'showWorkspace'])->name('team.workspace');
Route::get('/workspace/users', [UserController::class, 'showWorkspace'])->name('user.workspace');

// WORKSPACE EDITING
Route::put('/companies/{company}', [CompanyController::class, 'update'])->name('companies.update');
Route::put('/teams/{team}', [TeamsController::class, 'update'])->name('team.update');

// EDITING
Route::get('/edit', [HomeController::class,'edit'])->name('edit');
Route::get('/edituser', [HomeController::class,'edituser'])->name('edituser');
Route::get('/setting', [HomeController::class,'setting'])->name('setting');

// AUTHENTICATION
Route::get('post',[HomeController::class,'post'])->middleware(['auth', 'admin']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// INSERTING FILES
Route::get('/task-insert', [UploadManager::class, "upload"])->name("upload");
Route::post('/task-insert', [UploadManager::class, "uploadPost"])->name("upload.post");


// SHOW COMPANY 
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
// Browse
Route::get('/browse', function () {
    return view('browse');
});
Route::get('/browse-create', function () {
    return view('browse-create');
});
Route::get('/browse-search', function () {
    return view('browse-search');
});
Route::get('/browse-request', function () {
    return view('browse-request');
});
Route::post('/browse-search', [CompanyController::class, 'joinCompany'])->name('company.join');
Route::get('/browse-search', [CompanyController::class, 'showBrowseSearch']);

// LOGGED IN AS "BOSS" STARTS FROM HERE
// Companies
Route::get('/companies', function () {
    return view('boss.companies');
});


// Team
Route::get('/team-all', function () {
    return view('boss.team-all');
});
Route::get('/team-all', [TeamsController::class, 'showAllTeams']); // THIS ONE IS TO GET THE TEAM MEMBERS
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
Route::get('/team-add', [TeamsController::class, 'showTeamAddForm']); // FOR BOSS.ADDTEAM To WORK
Route::get('/companies', [HomeController::class, 'showCompanies'])->name('companies');

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
// Route::get('/task-insert', [UploadManager::class, "upload"])->name("upload");
Route::post('/task-insert', [UploadManager::class, "uploadPost"])->name("upload.post");
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
// ---------- FRONTEND | END --------------



// ---------- BACKEND | START ----------------
// WORKSPACE
Route::get('/adminhome', [HomeController::class,'index'])->name('adminhome');
Route::get('/workspace/companies', [CompanyController::class,'showWorkspace'])->name('company.workspace');
Route::get('/workspace/teams', [TeamsController::class, 'showWorkspace'])->name('team.workspace');
Route::get('/workspace/users', [UserController::class, 'showWorkspace'])->name('user.workspace');


// EDITING
Route::get('/edit', [HomeController::class,'edit'])->name('edit');
Route::get('/edituser', [HomeController::class,'edituser'])->name('edituser');
Route::get('/setting', [HomeController::class,'setting'])->name('setting');


// AUTHENTICATION
Route::get('post',[HomeController::class,'post'])->middleware(['auth', 'admin']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Add the boss.settings route
    Route::get('/boss/settings', [ProfileController::class, 'settings'])->name('boss.settings');
});

// ADDING COMPS, TEAMS
Route::get('/admin-addcompany', [CompanyController::class, 'showAddCompanyForm'])->name('admin.addcompany');
Route::get('/admin-addteam', [TeamsController::class, 'showAddTeamForm'])->name('admin.addteam');
Route::get('/admin-adduser', [UserController::class, 'showAddUserForm'])->name('admin.adduser');

// ROUTE FOR STORING
Route::post('/admin-addteam', [TeamsController::class, 'store'])->name('team.store');
Route::post('/admin-addcompany', [CompanyController::class, 'store'])->name('companies.store');
Route::post('/admin-adduser', [UserController::class, 'store'])->name('users.store');

// ROUTE FOR DELETING
Route::delete('/workspace/companies/destroy/{company}', [CompanyController::class, 'destroy'])->name('companies.destroy');
Route::delete('/workspace/teams/destroy/{team}', [TeamsController::class, 'destroy'])->name('team.destroy');
Route::delete('/workspace/users/destroy/{user}', [UserController::class, 'destroy'])->name('users.destroy');

// // ROUTE FOR SHOWING THE WORKSPACE
Route::get('/companies', [CompanyController::class, 'showCompanies'])->name('companies.show');


require __DIR__.'/auth.php';
