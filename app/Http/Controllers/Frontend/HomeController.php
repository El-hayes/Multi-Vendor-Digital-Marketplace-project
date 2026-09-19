<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    // Index Function
    public function index(): View
    {

        return view('frontend.home.index');
    } // End Method

}
