<?php

use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\UsersController;
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

Route::get('/', function () {
    return view('templates.index');
});

Route::get('/login', [PagesController::class, 'login'])->name('login');
Route::post('/login', [UsersController::class, '__login'])->name('postLogin');
Route::get('/register', [PagesController::class, 'register']);
Route::post('/register', [UsersController::class, 'store'])->name('postRegister');

Route::get('/dashboard', [PagesController::class, 'dashboard']);
Route::get('/dashboard/employee', [UsersController::class, 'index']);

Route::get('/dashboard/project', [ProjectsController::class, 'index']);
Route::get('/dashboard/project/add', [ProjectsController::class, 'create']);

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [UsersController::class, 'logout'])->name('logout');
});
