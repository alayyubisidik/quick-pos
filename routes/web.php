<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardCahierController;
use App\Http\Controllers\DashboardManagerController;
use App\Http\Controllers\DashboardWarehouseController;



Route::get("/", function () {
    return redirect("/signin");
});

Route::get("/signout", [AuthController::class, "signOut"]);

Route::middleware(["guest"])->group(function () {
    Route::get("/signin", [AuthController::class, "showSignin"]);
    Route::post("/signin", [AuthController::class, "submitSignin"]);
});

Route::middleware(["role:manager"])->group(function () {
    Route::get("/dashboard-manager", [DashboardManagerController::class, "showOverview"]);

    Route::get("/dashboard-manager/user", [DashboardManagerController::class, "showUser"]);
    Route::post("/dashboard-manager/change-user-status", [DashboardManagerController::class, "changeUserStatus"])->name("user.change-user-status");
    Route::get("/dashboard-manager/user/add", [DashboardManagerController::class, "showAddUser"])->name("user.show-add-user");
    Route::post("/dashboard-manager/user/add", [DashboardManagerController::class, "submitAddUser"])->name("user.submit-add-user");
    Route::get("/dashboard-manager/user/remove/{userId}", [DashboardManagerController::class, "removeUser"])->name("user.remove-user");
    Route::get("/dashboard-manager/user/edit/{userId}", [DashboardManagerController::class, "showEditUser"])->name("user.show-edit-user");
    Route::post("/dashboard-manager/user/edit/{userId}", [DashboardManagerController::class, "submitEditUser"])->name("user.submit-edit-user");
    Route::get("/dashboard-manager/user/change-password/{userId}", [DashboardManagerController::class, "showChangePassword"])->name("user.show-change-password-user");
    Route::post("/dashboard-manager/user/change-password/{userId}", [DashboardManagerController::class, "submitChangePassword"])->name("user.submit-change-password-user");

    Route::get("/dashboard-manager/product", [DashboardManagerController::class, "showProduct"]);
    
    Route::get("/dashboard-manager/category", [DashboardManagerController::class, "showCategory"]);
    Route::get("/dashboard-manager/category/add", [DashboardManagerController::class, "showAddCategory"])->name("category.show-add-category");
    Route::post("/dashboard-manager/category/add", [DashboardManagerController::class, "submitAddcategory"])->name("category.submit-add-category");
    Route::get("/dashboard-manager/category/remove/{categoryId}", [DashboardManagerController::class, "removeCategory"])->name("user.remove-category");

    Route::get("/dashboard-manager/order", [DashboardManagerController::class, "showOrder"]);
    Route::get("/dashboard-manager/report", [DashboardManagerController::class, "showReport"]);
});

Route::middleware(["role:cashier"])->group(function () {
    Route::get("/dashboard-cashier", [DashboardCahierController::class, "showOverview"]);
});

Route::middleware(["role:warehouse"])->group(function () {
    Route::get("/dashboard-warehouse", [DashboardWarehouseController::class, "showOverview"]);
});

