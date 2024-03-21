<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $sidebar_links = config('sidebar_links');
        return view('user.dashboard', compact('sidebar_links'));
    }
}
