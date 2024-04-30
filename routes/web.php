<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ObatMasukController;
use App\Http\Controllers\OrderObatController;
// use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('aksi_login');
// Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'permision']], function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/user', UserController::class);
    Route::post('/user/check-password', [UserController::class, 'checkPassword'])->name("checkPassword");
    Route::post('/user/update-password', [UserController::class, 'updatePassword'])->name("updatePassword");
    Route::post('/user/{id}', [UserController::class, 'update']);
    Route::get("/agent/profile/{id}", [AgentController::class, "profile"])->name("detailProfil");
    

    Route::resource('/agent', AgentController::class);
    Route::resource("/ticket", TicketController::class, ['except' => 'show']);
    Route::get("/ticket/after-execution/{id}", [TicketController::class, "afterExecution"])->name("ticket.afterExecution");
    Route::post("/ticket/after-execution", [TicketController::class, "storeAfterExecution"])->name("ticket.storeAfterExecution");
    Route::get("/ticket/detail/{id}", [TicketController::class, "detail"])->name("ticket.detail");
    
});
