<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    // index function
    public function index() : View {
        return view('admin.dashboard.index');

    }  // End index function
}
