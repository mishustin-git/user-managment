<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    // return 'users.route';
});

Route::get('/users', function () {
    // return 'users.route';
});

Route::get('/dashboard', function () {
    return view('dashboard');
    // return 'users.route';
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/users', function () {
    return 'users route';
    // return 'users.route';
})->middleware(['auth', 'verified'])->name('user.index');
// Route::get('/users', [UserController::class, 'index'])->name('user.index');
// Route::get('/users', [UserController::class, 'index'])->name('user.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
