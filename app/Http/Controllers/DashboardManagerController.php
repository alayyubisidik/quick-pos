<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardManagerController extends Controller
{
    public function showOverview() {
        return view("dashboard-manager.index");
    }

    // ====================================================User====================================================================
    
    public function showUser() {
        $users = User::whereNot("role", "manager")->get();
        return view("dashboard-manager.user.index", [
            "users" => $users
        ]);
    }

    public function changeUserStatus(Request $request) {
        $user = User::where("email", $request->input("email"))->first();
        $user->status = !$request->input("status");
        $user->save();

        return redirect("/dashboard-manager/user")->with("message-success", "Change user status successfully");
    }

    
    // ====================================================User====================================================================


    // ====================================================Product====================================================================
    
    public function showProduct() {
        return view("dashboard-manager.product.index");
    }
    
    // ====================================================Product====================================================================
    
    public function showCategory() {
        return view("dashboard-manager.category.index");
    }
    
    public function showOrder() {
        return view("dashboard-manager.order.index");
    }

    public function showReport() {
        return view("dashboard-manager.report.index");
    }
}
