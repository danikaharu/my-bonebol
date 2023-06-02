<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalApplicationByCategory' => \App\Models\Category::withCount('applications')->get(),
            'totalApplicationByAgency' => \App\Models\Agency::withCount('applications')->get(),
        ];


        return view('admin.dashboard.index', compact('data'));
    }
}
