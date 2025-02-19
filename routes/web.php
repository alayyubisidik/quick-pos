<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardCahierController;
use App\Http\Controllers\DashboardManagerController;
use App\Http\Controllers\DashboardWarehouseController;

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


Route::get("/signout", [AuthController::class, "signOut"]);

Route::middleware(["guest"])->group(function () {
    Route::get("/signin", [AuthController::class, "showSignin"]);
    Route::post("/signin", [AuthController::class, "submitSignin"]);
});

Route::middleware(["role:manager"])->group(function () {
    Route::get("/dashboard-manager", [DashboardManagerController::class, "showOverview"]);
});

Route::middleware(["role:cashier"])->group(function () {
    Route::get("/dashboard-cashier", [DashboardCahierController::class, "showOverview"]);
});

Route::middleware(["role:warehouse"])->group(function () {
    Route::get("/dashboard-warehouse", [DashboardWarehouseController::class, "showOverview"]);
});

