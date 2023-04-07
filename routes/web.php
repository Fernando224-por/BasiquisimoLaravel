<?php

use Illuminate\Support\Facades\Route;
//tener claro donde esta el controlador y definirlo bien
use App\Http\Controllers\todosController;
use App\Http\Controllers\categoriesController;

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

Route::post('/tareas', [todosController::class,'store'])->name('todos');

Route::get('/tareas', [todosController::class,'index'])->name('todos');

Route::get('/tareas/{id}', [todosController::class,'show'])->name('todos-edit');
Route::patch('/tareas/{id}', [todosController::class,'update'])->name('todos-update');
Route::delete('/tareas/{id}', [todosController::class,'destroy'])->name('todos-destroy');

Route::resource('categories', categoriesController::class);

