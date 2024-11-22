<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/homepage', function () {
    return view('homepage');
});

Route::get('/terms', function () {
    return view('terms');
});

//Route::get('/', [DashboardController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'dashboard']);

Route::get('/homepage', [DashboardController::class, 'homepage']) ->name('homepage');

Route::post('/idea', [IdeaController::class, 'store']) ->name('idea.create');

Route::get('/ideas/{idea}', [IdeaController::class, 'show']) ->name('ideas.show');

Route::delete('/idea/{id}', [IdeaController::class, 'destroy']) ->name('idea.destroy');

Route::get('/register', [AuthController::class, 'register']) ->name('register');

Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login']) ->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);