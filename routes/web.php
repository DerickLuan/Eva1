<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', [UsersController::class, 'index'])->name('users.index')->middleware('verificanivel');
Route::get('/instituicao', [InstituicaoController::class, 'index'])->name('instituicao.index');
Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.index');
Route::get('/curso', [CursoController::class, 'index'])->name('curso.index');

Route::resource('/instituicao', InstituicaoController::class);
Route::resource('/curso', CursoController::class);
Route::resource('/categoria', CategoriaController::class);

Route::get('session', SessionController::class, 'session');