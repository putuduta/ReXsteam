<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');

// Games
// Route::get('/games', [FriendsController::class, 'index'])->name('friends.index');
// Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
// Route::post('/games/store', [GameController::class, 'store'])->name('games.store');
// Route::get('/games/edit/{game}', [GameController::class, 'edit'])->name('games.edit');
// Route::post('/games/update/{game}', [GameController::class, 'update'])->name('games.update');

Route::resource('/games', GameController::class);

// Friends
Route::get('/friends', [FriendsController::class, 'index'])->name('friends.index');
Route::post('/friends/store', [FriendsController::class, 'store'])->name('friends.store');
Route::post('/friends/accept', [FriendsController::class, 'accept'])->name('friends.accept');
Route::delete('/friends/reject', [FriendsController::class, 'reject'])->name('friends.reject');

// Profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
