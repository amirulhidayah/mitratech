<?php

use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\dashboard\TimController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\dashboard\CoverController;
use App\Http\Controllers\dashboard\ClientController;
use App\Http\Controllers\dashboard\ProjekController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\PengaturanController;
use App\Http\Controllers\dashboard\PlatformProjekController;

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

Route::get('/', [WelcomeController::class, 'index']);

Route::get('detailProjek/{projek}', [WelcomeController::class, 'detailProjek']);
Route::get('daftarProjek', [WelcomeController::class, 'daftarProjek']);

Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [WelcomeController::class, 'login'])->name('login');
    Route::post('/login', [WelcomeController::class, 'authenticate']);
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::resources([
        'tim' => TimController::class,
        'client' => ClientController::class,
        'cover' => CoverController::class,
        'platformProjek' => PlatformProjekController::class,
        'projek' => ProjekController::class,
        'user' => UserController::class,
    ]);
    Route::resource('pengaturan', PengaturanController::class)->only([
        'index', 'update'
    ]);
    Route::post('upload', [ProjekController::class, 'upload']);
    Route::get('/logout', [WelcomeController::class, 'logout']);
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
