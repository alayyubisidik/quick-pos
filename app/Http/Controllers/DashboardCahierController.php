<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardCahierController extends Controller
{
    public function showOverview() {
        return view("dashboard-cashier.index");
    }
}
