<?php

use App\Http\Controllers\Authenticate\LoginController;
use App\Http\Controllers\Authenticate\LogoutController;
use App\Http\Controllers\Authenticate\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Posts\PostController;
use App\Http\Controllers\Posts\UserPostList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', HomeController::class)->name('home');

Route::group(['prefix' => 'register'], function () {
    Route::get('/', [RegisterController::class, 'view'])->name('register.form');
    Route::post('/', [RegisterController::class, 'register'])->name('register');
});

Route::group(['prefix' => 'login'], function () {
    Route::get('/', [LoginController::class, 'view'])->name('login.form');
    Route::post('/', [LoginController::class, 'login'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LogoutController::class, 'view'])->name('logout');

    Route::resource('posts', PostController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
});

Route::resource('posts', PostController::class)->only(['show']);

Route::get('{user}/posts', UserPostList::class)->name('user.posts');
