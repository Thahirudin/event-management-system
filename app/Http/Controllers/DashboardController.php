<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Event;
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
    function tentangKami()
    {
        return view('member.tentang-kami');
    }
    function event($id)
    {
        $event = Event::findOrFail($id);
        return view('member.detail-event');
    }
}