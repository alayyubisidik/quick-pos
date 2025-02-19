<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardManagerController extends Controller
{
    public function showOverview() {
        return view("dashboard-manager.index");
    }
}
