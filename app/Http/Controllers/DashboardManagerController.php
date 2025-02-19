<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Str;

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

    public function showAddUser() {
        return view("dashboard-manager.user.add");
    }

    public function submitAddUser(Request $request) {
        $request->validate([
            "full_name" => "required|min:3|max:255",
            "email" => "required|email|max:255|unique:users,email",
            "password" => "required|min:3|max:255|confirmed",
            'role' => 'required|in:cashier,warehouse',
            "image" => "required|image|mimes:jpeg,png,jpg|max:5000"
        ]);

        $image = $request->file("image");
        $imageName = time() . "." . $image->getClientOriginalExtension();
        $image->storeAs("profile-image", $imageName, "public");

        User::create([
            "full_name" => $request->input("full_name"),
            "email" => $request->input("email"),
            "password" => Hash::make($request->input("password")),
            "role" => $request->input("role"),
            "image" => $imageName,
        ]);

        return redirect("/dashboard-manager/user")->with("message-success", "Add user successfully");
    }

    public function removeUser($userId) {
        $user = User::find($userId);
        $image_path = public_path("\storage\profile-image\\") .$user->image;
        File::delete($image_path);
        $user->delete();

        return redirect("/dashboard-manager/user")->with("message-success", "Remove user successfully");
    }

    public function showEditUser($userId) {
        $user = User::find($userId);
        return view("dashboard-manager.user.edit", [
            "user" => $user
        ]);
    }

    public function submitEditUser(Request $request, $userId) {
        $request->validate([
            "full_name" => "min:3|max:255",
            "email" => "email|max:255",
            'role' => 'in:cashier,warehouse',
            "image" => "image|mimes:jpeg,png,jpg|max:5000"
        ]);

        $user = User::find($userId);

        if ($request->file('image')) {
            Storage::disk('public')->delete('profile-image/' . $user->image);

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('profile-image', $imageName, 'public');
            $user->image = $imageName;
        }

        $user->full_name = $request->input('full_name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');

        $user->save();

        return redirect('/dashboard-manager/user')->with("message-success", "Edit user successfully");
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
