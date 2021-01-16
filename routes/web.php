<?php

use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

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
//TODO::https://www.parthpatel.net/laravel-tutorial-for-beginner/

Route::get('/', function () {
    return view('welcome');
});

// Restrict these routes to only verified authenticated users
Route::middleware(['auth:sanctum', 'verified'])->group( function () {
//    echo('In add');
    Route::get('/dashboard', [TasksController::class], 'index' )->name('dashboard');

    Route::get('/task',[TasksController::class, 'add']);
    Route::get('/task', [TasksController::class, 'create']);

    Route::get('/task/{task}', [TasksController::class, 'edit']);
    Route::post('/task/{task}', [TasksController::class, 'update']);


});
