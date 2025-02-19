<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showSignin() {
        return view("auth.signin");;
    }

    // public function submitSignin(Request $request) {
    //     $request->validate([
    //         "email" => "required|email",
    //         "password" => "required"
    //     ]);

    //     $user = User::where("email", $request->input("email"))->first();

    //     if ($user) {
    //         if (password_verify($request->input("password"), $user->password )) {
    //             Auth::login($user);
    //             $request->session()->regenerate();

    //             if ($user->role === "manager") {
    //                 return redirect("/dashboard-manager");
    //             } else if ($user->role === "cashier") {
    //                 return redirect("/dashboard-cahsier");
    //             } else if ($user->role === "warehouse") {
    //                 return redirect("/dashboard-warehouse");
    //             }
    //         }
    //     }

    //     return redirect()->back()->with("message-error", "Email or password is incorrect");
    // }
}
