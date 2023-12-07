<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function adminIndex()
    {
        return view('admin.dashboard');
    }
    function organizerIndex()
    {
        return view('organizer.dashboard');
    }
    function memberHome()
    {
        return view('member.home');
    }
    function memberDashboard()
    {
        return view('member.dashboard');
    }
}