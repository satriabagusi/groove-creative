<?php

use App\Http\Controllers\AttendancesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\FingerprintsController;
use App\Http\Controllers\LedgersController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProjectInvoicesController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\SuppliesController;
use App\Http\Controllers\UsersController;
use App\Http\Livewire\ProjectDetail;
use App\Http\Livewire\ProjectInvoice;
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

Route::get('/payment/test/', [ProjectInvoicesController::class, 'testPay']);

Route::get('/', function () {
    return view('templates.index');
});

Route::get('/login', [PagesController::class, 'login'])->name('login');
Route::post('/login', [UsersController::class, '__login'])->name('postLogin');
Route::get('/register', [PagesController::class, 'register']);
Route::post('/register', [UsersController::class, 'store'])->name('postRegister');

Route::get('/dashboard', [PagesController::class, 'dashboard']);
Route::get('/dashboard/employee', [UsersController::class, 'index']);
Route::get('/dashboard/employee/attendance-list', [AttendancesController::class, 'index']);
Route::get('/dashboard/employee/assign-fingerprint', [FingerprintsController::class, 'index']);

Route::get('/dashboard/project', [ProjectsController::class, 'index']);
Route::get('/dashboard/project/add', [ProjectsController::class, 'create']);
Route::get('/dashboard/project/detail/{id}', ProjectDetail::class);

Route::get('/payment/invoice/', [ProjectInvoicesController::class, 'show']);

Route::get('/dashboard/finance', [PagesController::class, 'financeList']);
Route::get('/dashboard/finance/ledgers', [LedgersController::class, 'index']);

Route::get('/dashboard/supply', [SuppliesController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [UsersController::class, 'logout'])->name('logout');
});
