<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JoinRequestController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Auth\LoginRegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ------------------------------ PUBLIC ROUTES ------------------------------

    // --------------- AUTHENTICATION ---------------

Route::controller(LoginRegisterController::class)->group(function() {
    // http://127.0.0.1:8000/api/register
    Route::post('/register', 'register');
    // http://127.0.0.1:8000/api/login
    Route::post('/login', 'login');
});

    // --------------- AUTHENTICATION ---------------

    // --------------- COMPANY ---------------

Route::controller(CompanyController::class)->group(function() {
    // http://127.0.0.1:8000/api/companies
    Route::get('/companies', 'index');
    // http://127.0.0.1:8000/api/companies/{id}
    Route::get('/companies/{id}', 'show');
});

    // --------------- COMPANY ---------------

    // --------------- TEAM ---------------

Route::controller(TeamController::class)->group(function() {
    // http://127.0.0.1:8000/api/teams
    Route::get('/teams', 'index');
    // http://127.0.0.1:8000/api/teams/{id}
    Route::get('/teams/{id}', 'show');
    // http://127.0.0.1:8000/api/teams/search/{name}
    Route::get('/teams/search/{name}', 'search');
});

    // --------------- TEAM ---------------

// ------------------------------ PUBLIC ROUTES ------------------------------


// ------------------------------ PROTECTED ROUTES ------------------------------

Route::middleware('auth:sanctum')->group(function () {

    // --------------- AUTHENTICATION ---------------
    
    Route::post('/logout', [LoginRegisterController::class, 'logout']);

    // --------------- AUTHENTICATION ---------------

    // --------------- COMPANY ---------------

    Route::controller(CompanyController::class)->group(function() {
        // http://127.0.0.1:8000/api/my-companies
        Route::get('/my-companies', 'getUsersCompanies'); // Ensure this route is using getUsersCompanies function
        // http://127.0.0.1:8000/api/companies
        Route::post('/companies', 'store');
        // http://127.0.0.1:8000/api/companies/{id}
        Route::put('/companies/{id}', 'update');
        // http://127.0.0.1:8000/api/companies/{id}
        Route::delete('/companies/{id}', 'destroy');
        // http://127.0.0.1:8000/api/companies/{company_id}/add-member
        Route::post('/companies/{company_id}/add-member', 'addMemberToCompany');
    });

    // --------------- COMPANY ---------------

    // --------------- TEAM ---------------

    Route::controller(TeamController::class)->group(function() {
        // http://127.0.0.1:8000/api/companies/{company_id}/teams
        Route::post('/companies/{company_id}/teams', 'store');
        // http://127.0.0.1:8000/api/companies/{company_id}/teams/{team_id}
        Route::put('/companies/{company_id}/teams/{team_id}', 'update');
        // http://127.0.0.1:8000/api/companies/{company_id}/teams/{id}
        Route::delete('/companies/{company_id}/teams/{id}', 'destroy');
        // http://127.0.0.1:8000/api/teams/search-by-company-name/{company_name}
        Route::get('/teams/search-by-company-name/{company_name}', 'searchByCompanyName');
        // http://127.0.0.1:8000/api/companies/{company_id}/teams/{team_id}/add-member
        Route::post('/companies/{company_id}/teams/{team_id}/add-member', 'addMemberToTeam');
    });

    // --------------- TEAM ---------------

    // --------------- USER ---------------

    Route::controller(UserController::class)->group(function(){
        // http://127.0.0.1:8000/api/settings/update-info
        Route::post('/settings/update-info', 'updateUserInfo');
        // http://127.0.0.1:8000/api/companies/{company_id}/update-is-boss
        Route::put('/companies/{company_id}/update-is-boss', 'updateIsBoss');
        // http://127.0.0.1:8000/api/companies/{company_id}/users
        Route::get('/companies/{company_id}/users', 'allUsersInCompany');
        // http://127.0.0.1:8000/api/companies/{company_id}/remove-member
        Route::delete('/companies/{company_id}/remove-member', 'removeUserFromCompany');
        // http://127.0.0.1:8000/api/companies/{company_id}/teams/{team_id}/remove-member
        Route::delete('/companies/{company_id}/teams/{team_id}/remove-member', 'removeUserFromTeam');
    });

    // --------------- USER ---------------

    // --------------- JOIN REQUESTS ---------------
    Route::controller(JoinRequestController::class)->group(function(){
        // http://127.0.0.1:8000/api/companies/{company_id}/join-requests
        Route::get('/companies/{company_id}/join-requests', 'index');

        // --------------- JOIN REQUESTS (WORKER) ---------------
        // http://127.0.0.1:8000/api/companies/{company_id}/join-requests/{joinRequest_id}
        Route::get('/companies/{company_id}/join-requests/{joinRequest_id}', 'show');
        // http://127.0.0.1:8000/api/companies/{company_id}/join-requests
        Route::post('companies/{company_id}/join-requests','store');
        // http://127.0.0.1:8000/api/companies/{company_id}/join-requests/{joinRequest_id}
        Route::put('/companies/{company_id}/join-requests/{joinRequest_id}', 'update');
        // --------------- JOIN REQUESTS (WORKER) ---------------

        // --------------- JOIN REQUESTS (BOSS) ---------------
        // http://127.0.0.1:8000/api/companies/{company_id}/join-requests/{joinRequest_id}
        Route::delete('/companies/{company_id}/join-requests/{joinRequest_id}', 'destroy');
        // http://127.0.0.1:8000/api/companies/{company_id}/join-requests/{joinRequests_id}/handle-request
        Route::put('/companies/{company_id}/join-requests/{joinRequests_id}/handle-request','handleRequest');
        // --------------- JOIN REQUESTS (BOSS) ---------------

    });
    // --------------- JOIN REQUESTS ---------------

    // --------------- TASKS ---------------
    Route::controller(TaskController::class)->group(function () {
        // Route for displaying all tasks
        
        Route::get('/tasks', 'index');
    
        // Route group for tasks related to a specific company and team
        Route::prefix('companies/{company_id}/teams/{team_id}/tasks')->group(function () {
            // Route for displaying tasks within a specific team
            // http://127.0.0.1:8000/api/companies/{company_id}/teams/{team_id}/tasks
            Route::get('/', 'index');
    
            // Route for storing a new task
            // http://127.0.0.1:8000/api/companies/{company_id}/teams/{team_id}/tasks
            Route::post('/', 'store');
    
            // Route for displaying a specific task
            // http://127.0.0.1:8000/api/companies/{company_id}/teams/{team_id}/tasks/{task_id}
            Route::get('/{task_id}', 'show');
    
            // Route for updating a specific task
            // http://127.0.0.1:8000/api/companies/{company_id}/teams/{team_id}/tasks/{task_id}
            Route::post('/{task_id}', 'update');
    
            // Route for deleting a specific task
            // http://127.0.0.1:8000/api/companies/{company_id}/teams/{team_id}/tasks/{task_id}
            Route::delete('/{task_id}', 'destroy');
    
            // Route for updating the progress of a specific task
            // http://127.0.0.1:8000/api/companies/{company_id}/teams/{team_id}/tasks/{task_id}/update-progress
            Route::put('/{task_id}/update-progress', 'updateProgress');
        });
    
        // Route for displaying tasks within a company for the boss
        // http://127.0.0.1:8000/api/companies/{company_id}/all-tasks
        Route::get('/companies/{company_id}/all-tasks', 'tasksByCompany');
    });
    // --------------- TASKS ---------------
});
// ------------------------------ PROTECTED ROUTES ------------------------------
