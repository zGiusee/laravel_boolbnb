<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Apartment $apartment)
    {
        $sidebar_links = config('sidebar_links');

        $user = Auth::user();
        $views = DB::table('views')
            ->select('apartments.id', 'views.id as views_id', 'views.date')
            ->join('apartments', 'views.apartment_id', '=', 'apartments.id')
            ->join('users', 'apartments.user_id', '=', 'users.id')
            ->where('users.id', $user->id)
            ->get();

        return view('user.dashboard', compact('sidebar_links', 'apartment', 'views'));
    }
}
