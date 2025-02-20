<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class DashboardManagerController extends Controller
{
    public function showOverview() {
        return view("dashboard-manager.index");
    }

    // ====================================================User====================================================================
    
    public function showUser() {
        $staffs = User::whereNot("role", "manager")->get();
        $managers = User::where("role", "manager")->get();
        return view("dashboard-manager.user.index", [
            "staffs" => $staffs,
            "managers" => $managers,
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
            'role' => 'required|in:cashier,warehouse,manager',
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
            "full_name" => "required|min:3|max:255",
            "email" => "required|email|max:255",
            'role' => 'required|in:cashier,warehouse,manager',
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

    public function showChangePassword($userId) {
        $user = User::find($userId);
        return view("dashboard-manager.user.change-password", [
            "user" => $user
        ]);
    }

    public function submitChangePassword(Request $request, $userId) {
        $request->validate([
            "password" => "required|min:3|max:255|confirmed",
        ]);

        $user = User::find($userId);
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect("/dashboard-manager/user")->with("message-success", "Change password successfully");
    }
    
    // ====================================================User====================================================================


    // ====================================================Product====================================================================
    
    public function showProduct() {
        $products = Product::with("category")->get();
        return view("dashboard-manager.product.index", [
            "products" => $products
        ]);
    }

    public function showAddProduct() {
        $categories = Category::all();
        return view("dashboard-manager.product.add", [
            "categories" => $categories
        ]);
    }

    public function submitAddProduct(Request $request) {
        $request->validate([
            "name" => "required|min:3|max:255",
            "category_id" => "required",
            "price" => "required",
            'stock' => 'required',
            'min_stock' => 'required',
            "image" => "required|image|mimes:jpeg,png,jpg|max:5000"
        ]);

        $image = $request->file("image");
        $imageName = time() . "." . $image->getClientOriginalExtension();
        $image->storeAs("product-image", $imageName, "public");

        Product::create([
            "name" => $request->input("name"),
            "slug" => Str::slug($request->input("name")),
            "category_id" => $request->input("category_id"),
            "price" => $request->input("price"),
            "stock" => $request->input("stock"),
            "min_stock" => $request->input("min_stock"),
            "image" => $imageName,
        ]);

        return redirect("/dashboard-manager/product")->with("message-success", "Add product successfully");
    }

    
    // ====================================================Product====================================================================
    
    // ====================================================Category====================================================================
    public function showCategory() {
        $categories = Category::all();
        return view("dashboard-manager.category.index", [
            "categories" => $categories
        ]);
    }

    public function showAddCategory() {
        return view("dashboard-manager.category.add");
    }

    public function submitAddCategory(Request $request) {
        $request->validate([
            "name" => "required|min:3|max:255|unique:categories,name"
        ]);

        Category::create([
            "name" => $request->input("name"),
            "slug" => Str::slug($request->input("name"))
        ]);

        return redirect("/dashboard-manager/category")->with("message-success", "Add category successfully");
    }

    public function removeCategory($categoryId) {
        $category = Category::find($categoryId);
        $category->delete();

        return redirect("/dashboard-manager/category")->with("message-success", "Remove category successfully");
    }

    public function showEditCategory($categoryId) {
        $category = Category::find($categoryId);
        return view("dashboard-manager.category.edit", [
            "category" => $category
        ]);
    }

    public function submitEditCategory(Request $request, $categoryId) {
        $request->validate([
            "name" => "required|min:3|max:255",
        ]);

        $slug = Str::slug($request->input("name"));

        
        $category = Category::find($categoryId);

        $checkCategory = Category::whereNot("slug", $category->slug)->where("slug", $slug)->first();
        if ($checkCategory) {
            return redirect()->back()->with("message-error", "Category is already exists");
        }

        $category->name = $request->input('name');
        $category->slug = $slug;
        $category->save();

        return redirect('/dashboard-manager/category')->with("message-success", "Edit category successfully");
    }

    // ====================================================Category====================================================================
    
    public function showOrder() {
        return view("dashboard-manager.order.index");
    }

    public function showReport() {
        return view("dashboard-manager.report.index");
    }
}
