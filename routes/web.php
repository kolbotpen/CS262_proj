<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UploadManager;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JoinRequestController;

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
// ---------- LANDING ----------------

Route::get('/', function () {
    return view('auth.login');
});




// SHOW COMPANY 
Route::get('/workspace', [CompanyController::class, 'showWorkspace'])->name('workspace.show');


// ---------- BACKEND | START ----------------

// WORKSPACES
Route::get('/workspace', [HomeController::class,'workspace'])->name('workspace');
Route::get('/workspace/companies', [CompanyController::class,'showWorkspace'])->name('company.workspace');
Route::get('/workspace/teams', [TeamsController::class, 'showWorkspace'])->name('team.workspace');
Route::get('/workspace/users', [UserController::class, 'showWorkspace'])->name('user.workspace');
Route::get('/workspace/tasks', [UploadManager::class, 'showWorkspace'])->name('task.workspace');
Route::get('/workspace/request', [JoinRequestController::class, 'showWorkspace'])->name('task.request');

// WORKSPACE EDITING
Route::put('/companies/{company}', [CompanyController::class, 'update'])->name('companies.update');
Route::put('/teams/{team}', [TeamsController::class, 'update'])->name('team.update');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update'); // Added users.update route

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

// WORKSPACE
Route::get('/adminhome', [HomeController::class,'index'])->name('adminhome');
Route::get('/workspace/teams', [TeamsController::class, 'showWorkspace'])->name('team.workspace');
Route::get('/workspace/users', [UserController::class, 'showWorkspace'])->name('user.workspace');
Route::get('/workspace/tasks', [UploadManager::class, 'showWorkspace'])->name('task.workspace');
Route::get('/workspace/request', [JoinRequestController::class, 'showWorkspace'])->name('request.workspace');

// EDITING
Route::get('/edit', [HomeController::class,'edit'])->name('edit');
Route::get('/edituser', [HomeController::class,'edituser'])->name('edituser');
Route::get('/setting', [HomeController::class,'setting'])->name('setting');
Route::get('/companies/{id}/edit', [CompanyController::class, 'edit'])->name('companies.edit');

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

// ROUTE FOR UPDATING
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update'); // Added users.update route

// CRUD FOR WORKSPACE/COMPANIES
Route::prefix('workspace')->group(function () {
    Route::get('/companies', [CompanyController::class, 'showWorkspace'])->name('company.workspace'); // Assuming this is for listing companies
    Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->name('companies.edit'); // For editing a specific company
    Route::put('/companies/{company}', [CompanyController::class, 'update'])->name('companies.update'); // For updating a specific company
    Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store'); // For storing a new company
    Route::delete('/companies/{company}', [CompanyController::class, 'destroy'])->name('companies.destroy'); // For deleting a company
});
Route::delete('/companies/{companyId}/users/{userId}', [CompanyController::class, 'removeUserFromCompany'])->name('company.users.remove');
Route::post('/companies/add-user', [CompanyController::class, 'addUser'])->name('companies.addUser');


// ROUTE FOR DELETING
Route::delete('/workspace/teams/destroy/{team}', [TeamsController::class, 'destroy'])->name('team.destroy');
Route::delete('/workspace/users/destroy/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::delete('teams/{team}/users/{user}', [TeamsController::class, 'removeUser'])->name('teams.removeUser');

// // ROUTE FOR SHOWING THE WORKSPACE
Route::get('/companies', [CompanyController::class, 'showCompanies'])->name('companies.show');

// TASKS
Route::delete('/task/{id}', [UploadManager::class, 'destroy'])->name('task.delete');
require __DIR__.'/auth.php';
Route::put('/task/{task}', [UploadManager::class, 'edit'])->name('task.edit');
Route::get('/search-companies', [CompanyController::class, 'search'])->name('companies.search');

// JOIN REQUESTS
Route::get('/join-requests', [JoinRequestController::class, 'index'])->name('join-requests.index');
Route::post('/join-requests/{id}/approve', [JoinRequestController::class, 'approve'])->name('join-requests.approve');
Route::post('/join-requests/{id}/reject', [JoinRequestController::class, 'reject'])->name('join-requests.reject');