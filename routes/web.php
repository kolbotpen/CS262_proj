<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UploadManager;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JoinRequestController;
use App\Http\Controllers\ContactMailController;

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
    return view('landing');
});
// ---------- FRONTEND | START ----------------

route::get('/test', function () {
    return view('test');
});

// CONTACT US MAIL
Route::get('/test-mail', [ContactMailController::class, 'sendMail']);

// Handle form submission and send mail
Route::post('/contact', [ContactMailController::class, 'sendMail'])->name('contact.submit');


// WORKSPACE EDITING
Route::get('/companies/{companyId}/users', 'App\Http\Controllers\CompanyController@getAllUsers')->name('companies.users');
Route::get('/companies/{companyId}/boss-users', 'App\Http\Controllers\CompanyController@getBossUsers')->name('companies.boss_users');
Route::get('company/generate-code', [CompanyController::class, 'generateCode'])->name('company.generateCode');
Route::put('/companies/{company}', [CompanyController::class, 'update'])->name('companies.update');
Route::put('/teams/{team}', [TeamsController::class, 'update'])->name('team.update');
Route::delete('/teams/{team}', [TeamsController::class, 'destroy'])->name('team.delete'); // Delete team from company
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

// ---------- VISOTH'S CODE | START ----------
Route::get('/rat', function () {
    return view('RAT');
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
})->name('browse-create');
Route::get('/browse-search', function () {
    return view('browse-search');
});
Route::get('/browse-request', function () {
    return view('browse-request');
});

// Routes for browsing and joining companies
Route::get('/browse-search', [CompanyController::class, 'showBrowseSearch'])->name('browse-search');
Route::post('/browse-search', [CompanyController::class, 'joinCompany'])->name('company.join');

// Route for creating a company in the browse section
Route::post('/browse-create', [CompanyController::class, 'storeInBrowse'])->name('browse.store');

// LOGGED IN AS "BOSS" STARTS FROM HERE

// ROUTE FOR SHOWING THE WORKSPACE
Route::get('/companies', [CompanyController::class, 'showCompanies'])->name('companies.show');

// Team
Route::get('/team-all', function () {
    return view('boss.team-all');
});
Route::get('/team-all/{company}', [TeamsController::class, 'showAllTeams']); // THIS ONE IS TO GET ALL THE TEAM MEMBERS

Route::get('/team', function () {
    return view('boss.team');
});

Route::get('/team/{team}', [TeamsController::class, 'showTeam'])->name('team.show'); // THIS ONE IS TO GET JUST THE ONE TEAM YOU SELECT 
Route::get('/team/{id}', [TeamsController::class, 'showOneTeam'])->name('team.one');

Route::delete('/team/delete', [TeamsController::class, 'destroy'])->name('team.delete');
Route::delete('/team/{team_id}/remove/{user_id}', [TeamsController::class, 'removeMember'])->name('team.remove.member');

Route::post('/check-team-name', [TeamsController::class, 'checkTeamName'])->name('check.team.name'); // THIS CHECKS IF TEAM NAME ALREADY EXISTS IN COMPANY
Route::post('/check-member-exists', [TeamsController::class, 'checkMemberExists'])->name('check.member.exists'); // THIS CHECKS IF MEMBER ALREADY EXISTS IN TEAM


Route::get('/team-add', function () {
    return view('boss.team-add');
});
Route::get('/team-add-member', function () {
    return view('boss.team-add-member');
});

Route::post('/team-add', [TeamsController::class, 'storeInBoss'])->name('boss.add'); // ADDing TO 
Route::get('/team-add', [TeamsController::class, 'showTeamAddForm'])->name('boss.team-add'); // FOR BOSS.ADDTEAM To WORK

Route::get('/team-all/{company}', [TeamsController::class, 'showAllTeams'])->name('team.all');
Route::post('/team/add-member', [TeamsController::class, 'addMember'])->name('team.add.member');

// Task
Route::get('/task-all', function () {
    return view('boss.task-all');
});
Route::get('/task', function () {
    return view('boss.task');
});
Route::get('/task-all/{company}', [UploadManager::class, 'tasksForCompany'])->name('task.forCompany');
Route::delete('/task/{id}', [UploadManager::class, 'destroy'])->name('task.delete');
// INSERTING FILES
Route::get('/task-insert', [UploadManager::class, "upload"])->name("upload");
Route::post('/task-insert', [UploadManager::class, "uploadPost"])->name("upload.post");

// Task Details
Route::get('/task-details', function () {
    return view('boss.task-details');
});
Route::get('/task-details-edit', function () {
    return view('boss.task-details-edit');
});
// Viewing a task
Route::get('/task-details/{id}', [UploadManager::class, 'show'])->name('task.show');

// Single Task
Route::get('/tasks/{team}', [UploadManager::class, 'tasksForTeam'])->name('team.tasks');

// Editing task details
Route::get('/task-details-edit/{id}', [UploadManager::class, 'edit'])->name('task.edit');
Route::put('/task-details-edit/{id}', [UploadManager::class, 'edit'])->name('task.edit');

// Task Insert
Route::get('/task-insert', function () {
    return view('boss.task-insert');
});
Route::get('/task-insert', [UploadManager::class, "upload"])->name("upload");
Route::post('/task-insert', [UploadManager::class, "uploadPost"])->name("upload.post");
// Calendar
Route::get('/calendar', function () {
    return view('boss.calendar');
});
Route::get('/calendar', [UploadManager::class, 'showCalendar'])->name('calendar.show');

// JOIN REQUEST
Route::post('/join-request', [JoinRequestController::class, 'store'])->name('join-request.store');


// Approve Request
Route::patch('/requests/approve/{request}', [JoinRequestController::class, 'approve'])->name('requests.approve');

// Reject Request
Route::delete('/requests/reject/{request}', [JoinRequestController::class, 'reject'])->name('requests.reject');


// ALL MEMBERS - REQUESTS
Route::get('/all-members', function () {
    return view('boss.all-members');
});
Route::get('/all-members', [JoinRequestController::class, 'index'])->name('all-members.index');
Route::patch('/all-members/{request}/approve', [JoinRequestController::class, 'approve'])->name('all-members.approve');
Route::delete('/all-members/{request}/reject', [JoinRequestController::class, 'reject'])->name('all-members.reject');
// Route::get('/all-members', [CompanyController::class, 'showAllMember'])->name('member.show');

// Settings
Route::get('/settings', function () {
    return view('boss.settings');
})->name('boss.settings');

Route::patch('/settings/update-picture', [ProfileController::class, 'updatePicture'])->name('profile.updatePicture'); // Added profile.updatePicture route



// ---------- VISOTH'S CODE | END ----------
// ---------- FRONTEND | END --------------
require __DIR__.'/auth.php';
