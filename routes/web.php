<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\JobsController;
use App\Http\Controllers\Dashboard\SkillsController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Models\Stat;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/', function () {
    $stat = new Stat();
    if (Auth::user() != "") {
        $value = Auth::user()["name"] . " s'est connecté.";
    } else {
        $value = "Un invité s'est connecté.";
    }
    $stat->action = $value;
    $stat->date_log = date("Y-m-d");
    $stat->ip_address = $_SERVER['REMOTE_ADDR'];
    $stat->save();

    return view('index');
})->name('index');

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return DashboardController::index();
    })->name('home');
    Route::resource('/users', UsersController::class);
    Route::resource('/skills', SkillsController::class);
    Route::resource('/jobs', JobsController::class);
});

Route::get('/storagelink', function () {
    Artisan::call('storage:link');
    return DashboardController::index();
})->middleware(['auth']);

require __DIR__ . '/auth.php';
