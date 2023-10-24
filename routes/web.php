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


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// neophodan LOGIN za pristup ovim stranicama
Route::middleware('auth')->group( function(){

    Route::get('/task-lists', [App\Http\Controllers\TaskListController::class, 'index'])->name('task-lists.view');
    Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index'])->name('tasks.view');
    

});
