<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PlayerStatsController;
use App\Http\Controllers\RegistrationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('categories', CategoryController::class);
Route::resource('teams', TeamController::class);
Route::resource('tournaments', TournamentController::class);
Route::resource('groups', GroupController::class);
Route::resource('matches', MatchController::class);
Route::resource('staff', StaffController::class);
Route::resource('players', PlayerController::class);
Route::post('login', [LoginController::class, 'login']);
//Route::post('players/insertMany', 'PlayerController@insertMany');
Route::resource('stats', PlayerStatsController::class);
Route::resource('registration', RegistrationController::class);
Route::put('registration', [RegistrationController::class, 'update']);
