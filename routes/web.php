<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Catalogs\SystemCruds\AcademicLevelController;
use App\Http\Controllers\Catalogs\SystemCruds\BloodTypeController;
use App\Http\Controllers\Catalogs\SystemCruds\GenderController;
use App\Http\Controllers\Catalogs\SystemCruds\MaritalStatusController;
use App\Http\Controllers\Catalogs\SystemCruds\StateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Modules\System\HumanResources\JobApplicationController;
use App\Http\Controllers\Modules\System\HumanResources\VacancyController;

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
    return redirect('home');
});

Auth::routes();

Route::get('logout', [LoginController::class, 'logout']);
Route::get('/home', [HomeController::class, 'index'])->name('home');



Route::get('optimize-app', [HomeController::class, 'optimize'])->name('opitimize');

