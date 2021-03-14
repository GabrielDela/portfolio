<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ImagesController;
use App\Http\Controllers\Dashboard\JobsController;
use App\Http\Controllers\Dashboard\EducationsController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Dashboard\SkillsController;
use App\Http\Controllers\Dashboard\UsersController;
use Illuminate\Support\Facades\Artisan;
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

Route::resource('/', PortfolioController::class);

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return DashboardController::index();
    })->name('home');
    Route::resource('/users', UsersController::class);
    Route::resource('/skills', SkillsController::class);
    Route::resource('/jobs', JobsController::class);
    Route::resource('/images', ImagesController::class);
    Route::resource('/educations', EducationsController::class);
});

Route::get('/storagelink', function () {
    Artisan::call('storage:link');
    return DashboardController::index();
})->middleware(['auth']);

require __DIR__ . '/auth.php';
