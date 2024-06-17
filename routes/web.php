<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SectionController;
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

Route::middleware(['auth'])->group(function () {
    // User
    Route::resource('users', UserController::class, [
        'names' => [
            'index' => 'user.index',
            'create' => 'user.create',
            'store' => 'user.store',
            'show' => 'user.show',
            'edit' => 'user.edit',
            'update' => 'user.update',
            'destroy' => 'user.destroy',
        ],
        'parameters' => ['users' => 'id'],
    ]);
    // Menu
    Route::resource('menu', MenuController::class, [
        'names' => [
            'index' => 'menu.index',
            'create' => 'menu.create',
            'store' => 'menu.store',
            'show' => 'menu.show',
            'edit' => 'menu.edit',
            'update' => 'menu.admin.update',
            'destroy' => 'menu.destroy',
        ],
        'parameters' => ['menus' => 'id'],
    ]);
    Route::post('/update-order', [MenuController::class, 'updateOrder'])->name('menus.updateOrder');

    //section
    Route::resource('section', SectionController::class, [
        'names' => [
            'index' => 'section.index',
            'create' => 'section.create',
            'store' => 'section.store',
            'show' => 'section.show',
            'edit' => 'section.edit',
            'update' => 'section.update',
            'destroy' => 'section.destroy',
        ],
        'parameters' => ['sections' => 'id'],
    ]);
    Route::post('/update-services', [SectionController::class, 'updateServices'])->name('section.updateService');
    Route::post('/update-image', [SectionController::class, 'updateImage'])->name('update.image');
    Route::post('/update-image-about', [SectionController::class, 'updateImageAbout'])->name('update.image1');
    Route::post('/update-image-team', [SectionController::class, 'updateImageTeam'])->name('update.image2');
});

// Master
Route::group(['prefix' => 'master'], function () {
    Route::get('/', [MasterController::class, 'index'])->name('master.index');
    Route::post('/{id}', [MasterController::class, 'update'])->name('menu.update');
});
