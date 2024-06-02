<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UploadManager;
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
    return view('welcome');
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
// VISOTH CODE
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
Route::get('/companies', function () {
    return view('companies');
});
Route::get('/workspace', function () {
    return redirect('/companies');
});
Route::get('/tasks', function () {
    return view('task-all');
});
Route::get('/task-details', function () {
    return view('task-details');
});
Route::get('/task-details-edit', function () {
    return view('task-details-edit');
});
Route::get('/task-insert', function () {
    return view('task-insert');
});
Route::get('/calendar', function () {
    return view('calendar');
});
Route::get('/settings', function () {
    return view('settings');
})->name('settings');

// VISOTH CODE

require __DIR__.'/auth.php';
