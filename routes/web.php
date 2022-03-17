<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tasksController;
use App\Http\Controllers\CategoriesController;

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

Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/tasks', function () {
    return view('tasks.index');
})->name('tasks');

Route::get('/tasks', [tasksController::class, 'index'])->name('tasks');
Route::post('/tasks', [tasksController::class, 'store'])->name('tasks');

Route::get('/tasks/{id}', [tasksController::class, 'show'])->name('tasks-edit');
Route::patch('/tasks/{id}', [tasksController::class, 'update'])->name('tasks-update');
Route::delete('/tasks/{id}', [tasksController::class, 'destroy'])->name('tasks-destroy');

Route::resource('categories', CategoriesController::class);