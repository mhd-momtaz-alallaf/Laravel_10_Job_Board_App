<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
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

Route::get('', fn() => to_route('jobs.index'));

Route::resource('jobs',JobController::class)
    ->only(['index', 'show']);

Route::get('login', fn() => to_route('auth.create'))->name('login'); // because the default laravel to use login route
Route::resource('auth', AuthController::class)
    ->only(['create', 'store']);