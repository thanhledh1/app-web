<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
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

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('postlogin');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
Route::get('/create', [UserController::class, 'create'])->name('user.create');
Route::post('/store', [UserController::class, 'store'])->name('user.store');

Route::prefix('/')->middleware(['auth'])->group(function () {

    // User
    Route::group(['prefix' => 'user'], function () {
        Route::get('/index', [UserController::class, 'index'])->name('user.index');
        Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });
    // Menu
    Route::group(['prefix' => 'menu'], function () {
        Route::get('/', [MenuController::class, 'index'])->name('menu.index');
        Route::get('/create', [MenuController::class, 'create'])->name('menu.create');
        Route::post('/store', [MenuController::class, 'store'])->name('menu.store');
        Route::get('/show/{id}', [MenuController::class, 'show'])->name('menu.show');
        Route::get('/edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');
        Route::put('/edit/{id}', [MenuController::class, 'update'])->name('menu.admin.update');
        Route::delete('destroy/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
        // Route::post('/update-order', [MenuController::class, 'updateOrder'])->name('menus.updateOrder');
    });
});

// Master
Route::group(['prefix' => 'master'], function () {
    Route::get('/index', [MasterController::class, 'index'])->name('user.index');
    Route::post('/{id}', [MasterController::class, 'update'])->name('menu.update');
});



Route::post('/update-order', [MenuController::class, 'updateOrder'])->name('updateOrder');
Route::post('/menus/updateOrder', [MenuController::class, 'updateOrder'])->name('menus.updateOrder');
