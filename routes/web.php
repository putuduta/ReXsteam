<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\TransactionController;

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
Route::get('/search', [HomeController::class, 'search'])->name('search');

// Games
Route::resource('/games', GameController::class);

// Friends
Route::get('/friends', [FriendsController::class, 'index'])->name('friends.index');
Route::post('/friends/store', [FriendsController::class, 'store'])->name('friends.store');
Route::post('/friends/accept', [FriendsController::class, 'accept'])->name('friends.accept');
Route::delete('/friends/reject', [FriendsController::class, 'reject'])->name('friends.reject');

// Profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/checkout', [TransactionController::class, 'checkout'])->name('transactions.checkout');
Route::get('/receipt', [TransactionController::class, 'receipt'])->name('transactions.receipt');
Route::get('/history', [TransactionController::class, 'history'])->name('transactions.history');
