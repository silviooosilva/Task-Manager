<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\authController;
use App\Http\Controllers\Task\taskController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::view('register', 'auth.register')->name('register.view');

Route::prefix('auth')->group(function () {
    Route::post('login', [authController::class, 'login'])->name('login');
    Route::post('register', [authController::class, 'register'])->name('register');
    Route::get('logout', [authController::class, 'logout'])->name('logout');
});

Route::get('/dashboard', [taskController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::prefix('tasks')->group(function () {

    Route::view('create', 'home.tasks.create')->name('task.create.view');
    Route::get('show/{id}', [taskController::class, 'details'])->name('task.details.view');
    Route::get('update/{id}', [taskController::class, 'show'])->name('task.update.view');
  

    Route::post('create', [taskController::class, 'create'])->name('task.create');
    Route::put('update/{id}', [taskController::class, 'update'])->name('task.update');
    Route::delete('delete/{id}', [taskController::class, 'delete'])->name('task.delete');
})->middleware('auth');
