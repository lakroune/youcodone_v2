<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminDashboardConteroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        $users_count = User::where('role', 'restaurateur')->orWhere('role', 'client')->count();
        return view('dashboard_admin', compact('restaurants', 'users_count'));
    }

    /**
     * Show the gestion of users.
     */

    public function gestion()
    {
        $users = User::all();
        return view('gestionusers', compact('users'));
    }
    
}
