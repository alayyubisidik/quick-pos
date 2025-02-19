<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardWarehouseController extends Controller
{
    public function showOverview() {
        return view("dashboard-warehouse.index");
    }
}
