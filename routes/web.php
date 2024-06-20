<?php

use App\Http\Controllers\UserController;
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
use App\Http\Controllers\RoleController;
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
    Route::resource('/role', RoleController::class);
    Route::post('/role/{id}', [RoleController::class, 'update']);


    // Route::get("/user/profile/{id}", [RoleController::class, "profile"])->name("detailProfilUser");
    
    Route::get("/user/profile/{id}", [UserController::class, "profile"])->name("detailProfilUser");
    Route::post('/user/update-password', [UserController::class, 'updatePassword'])->name("updatePassword");
    Route::post('/user/check-password', [UserController::class, 'checkPassword'])->name("checkPassword");
    Route::resource('/user', UserController::class);
    Route::post('/user/{id}', [RoleController::class, 'update']);

    Route::resource("/ticket", TicketController::class, ['except' => 'show']);
    Route::get("/ticket/after-execution/{id}", [TicketController::class, "afterExecution"])->name("ticket.afterExecution");
    Route::post("/ticket/after-execution", [TicketController::class, "storeAfterExecution"])->name("ticket.storeAfterExecution");
    Route::get("/ticket/detail/{id}", [TicketController::class, "detail"])->name("ticket.detail");

    //export
    Route::get("ticket/export/excel", [TicketController::class, "exportExcel"])->name("tickeTexportExcel");
    Route::get("ticket/fillter-by-date", [TicketController::class,"fillterByDate"])->name("fillterByDate");
    
});
