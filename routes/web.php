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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::middleware('auth')->group( function(){

    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    // --- APPLICATION Routes
    Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index'])->name('tasks.view');
    Route::get('/tasks/create', [App\Http\Controllers\TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks/store', [App\Http\Controllers\TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/edit/{task}', [App\Http\Controllers\TaskController::class, 'edit'])->name('tasks.edit');
    Route::patch('/tasks/update/{task}', [App\Http\Controllers\TaskController::class, 'update'])->name('tasks.update');
    Route::get('/tasks/delete/{task}', [App\Http\Controllers\TaskController::class, 'destroy'])->name('tasks.delete');

    Route::get('/task-lists', [App\Http\Controllers\TaskListController::class, 'index'])->name('task-lists.view');
    Route::get('/task-lists/create', [App\Http\Controllers\TaskListController::class, 'create'])->name('task-lists.create');
    Route::post('/task-lists/store', [App\Http\Controllers\TaskListController::class, 'store'])->name('task-lists.store');
    Route::get('/task-lists/edit/{task_list}', [App\Http\Controllers\TaskListController::class, 'edit'])->name('task-lists.edit');
    Route::patch('/task-lists/update/{task_list}', [App\Http\Controllers\TaskListController::class, 'update'])->name('task-lists.update');
    Route::get('/task-lists/delete/{task_list}', [App\Http\Controllers\TaskListController::class, 'destroy'])->name('task-lists.delete');
    Route::get('/task-lists/delete-soft/{task_list}', [App\Http\Controllers\TaskListController::class, 'destroy_soft'])->name('task-lists.delete.soft');
    Route::get('/task-lists/restore/{task_list}', [App\Http\Controllers\TaskListController::class, 'restore'])->name('task-lists.restore');


    // // --- API Routes
    // Route::get('/api/tasks', [App\Http\Controllers\Api\TaskApiController::class, 'index'])->name('api.tasks.view');
    // Route::get('/api/tasks/{id}', [App\Http\Controllers\Api\TaskApiController::class, 'index'])->name('api.tasks.single.view');
    // // Route::get('/api/tasks/create', [App\Http\Controllers\Api\TaskApiController::class, 'create'])->name('api.tasks.create');
    // Route::post('/api/tasks/store', [App\Http\Controllers\Api\TaskApiController::class, 'store'])->name('api.tasks.store');
    // // Route::get('/api/tasks/edit/{task}', [App\Http\Controllers\Api\TaskApiController::class, 'edit'])->name('api.tasks.edit');
    // Route::patch('/api/tasks/update/{task}', [App\Http\Controllers\Api\TaskApiController::class, 'update'])->name('api.tasks.update');
    // Route::get('/api/tasks/delete/{task}', [App\Http\Controllers\Api\TaskApiController::class, 'destroy'])->name('api.tasks.delete');

    // Route::get('/api/task-lists', [App\Http\Controllers\Api\TaskListApiController::class, 'index'])->name('api.task-lists.view');
    // Route::get('/api/task-lists/{id}', [App\Http\Controllers\Api\TaskListApiController::class, 'index'])->name('api.task-lists.single.view');
    // // Route::get('/api/task-lists/create', [App\Http\Controllers\Api\TaskListApiController::class, 'create'])->name('api.task-lists.create');
    // Route::post('/api/task-lists/store', [App\Http\Controllers\Api\TaskListApiController::class, 'store'])->name('api.task-lists.store');
    // // Route::get('/api/task-lists/edit/{task_list}', [App\Http\Controllers\Api\TaskListApiController::class, 'edit'])->name('api.task-lists.edit');
    // Route::patch('/api/task-lists/update/{task_list}', [App\Http\Controllers\Api\TaskListApiController::class, 'update'])->name('api.task-lists.update');
    // Route::get('/api/task-lists/delete/{task_list}', [App\Http\Controllers\Api\TaskListApiController::class, 'destroy'])->name('api.task-lists.delete');


});
