<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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

Route::get('/students', [StudentController::class, 'home'])->name('home');
Route::get('/students-create', [StudentController::class, 'create'])->name('student.create');
Route::post('/students-store', [StudentController::class, 'store'])->name('student.store');
Route::get('/students-edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/students-update/{id}', [StudentController::class, 'update'])->name('student.update');
Route::get('/students-show/{id}', [StudentController::class, 'show'])->name('student.show');
Route::get('/students-delete/{id}', [StudentController::class, 'delete'])->name('student.delete');