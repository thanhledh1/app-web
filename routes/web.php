<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postlogin'])->name('postlogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// 
Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('menu', MenuController::class);
    Route::resource('section', SectionController::class);
    Route::resource('page', PageController::class);

// update menu, secion in view
    Route::post('/update-order', [MenuController::class, 'updateOrder'])->name('menus.updateOrder');
    Route::post('/update-services', [SectionController::class, 'updateServices'])->name('section.updateService');
    Route::post('/update-image', [SectionController::class, 'updateImage'])->name('update.image');
    Route::post('/update-image-about', [SectionController::class, 'updateImageAbout'])->name('update.image1');
    Route::post('/update-image-team', [SectionController::class, 'updateImageTeam'])->name('update.image2');
    Route::post('master/{id}', [MasterController::class, 'updateMenu'])->name('updateMenu');
     // Create view
    Route::get('/create-web', [MasterController::class, 'index'])->name('master.index');
});
    Route::get('/error', function () {
        return view('errors');
    })->name('error.page');
    