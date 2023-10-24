<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// neophodan LOGIN za pristup ovim stranicama
Route::middleware('auth')->group( function(){

    Route::get('/task-lists', [App\Http\Controllers\TaskListController::class, 'index'])->name('task-lists.view');
    Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index'])->name('tasks.view');

    
    Route::get('/tasks/create', [App\Http\Controllers\TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks/store', [App\Http\Controllers\TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/edit/{task}', [App\Http\Controllers\TaskController::class, 'edit'])->name('tasks.edit');
    Route::patch('/tasks/update/{task}', [App\Http\Controllers\TaskController::class, 'update'])->name('tasks.update');

    Route::get('/tasks/delete/{task}', [App\Http\Controllers\TaskController::class, 'destroy'])->name('tasks.delete');

});
