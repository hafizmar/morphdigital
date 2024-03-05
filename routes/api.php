<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->group( function() {
    Route::get('/me', [AuthController::class, 'me'])->name('me');
    
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::prefix('/task')->group( function() {
        Route::get('/{id}', [TaskController::class, 'show']);
        Route::post('/store', [TaskController::class, 'store']);
        Route::put('/{id}', [TaskController::class, 'update']);
        Route::delete('/{id}', [TaskController::class, 'destroy']);
    });

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::prefix('/user')->group( function() {
        Route::get('/{id}', [UserController::class, 'show']);
        Route::post('/store', [UserController::class, 'store']);
        Route::put('/{id}', [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class, 'destroy']);
        Route::post('/checkemail', [UserController::class, 'checkEmail']);
    });

    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout']);
