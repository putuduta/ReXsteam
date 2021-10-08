<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FriendsController;

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

// Friendship
Route::get('/friends', [FriendsController::class, 'index'])->name('friends.index');
Route::post('/friends/store', [FriendsController::class, 'store'])->name('friends.store');
Route::post('/friends/accept', [FriendsController::class, 'accept'])->name('friends.accept');
Route::post('/friends/reject', [FriendsController::class, 'reject'])->name('friends.reject');
