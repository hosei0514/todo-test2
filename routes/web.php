<?php

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
Route::resource('/todos', 'TodoController');
Route::get('/', [ContactController::class, 'index']);
Route::post('todo/create', [ContactController::class, 'store']);
Route::post('todo/update', [ContactController::class, 'update']);
Route::post('todo/delete', [ContactController::class, 'destroy']);
