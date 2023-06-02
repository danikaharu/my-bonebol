<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $applications = Application::with(['agency'])->latest()->paginate(8);

        return view('user.index', compact('applications'));
    }

    public function search(Request $request)
    {
        $keyword = $request->validate([
            'keyword' => ['required', 'string', 'max:255'],
        ]);

        $applications = Application::where('name', 'LIKE', '%' . implode(",", $keyword) . '%')
            ->with('agency')
            ->latest()
            ->paginate(10);

        return view('user.search', compact('applications', 'keyword'));
    }
}
