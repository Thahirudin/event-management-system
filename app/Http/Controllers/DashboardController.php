<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Event;
use App\User;
use App\Member;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    function adminIndex()
    {
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();

        $totalEventHariIni = Event::whereDate('created_at', $today)->count();
        $totalEventKemarin = Event::whereDate('created_at', $yesterday)->count();
        $differenceEvent = $totalEventHariIni - $totalEventKemarin;
        $persenEvent = ($differenceEvent != 0) ? (($differenceEvent / 1) * 100) : 0;

        $totalOrganizerHariIni = User::whereDate('created_at', $today)->count();
        $totalOrganizerKemarin = User::whereDate('created_at', $yesterday)->count();
        $differenceOrganizer = $totalOrganizerHariIni - $totalOrganizerKemarin;
        $persenOrganizer = ($differenceOrganizer != 0) ? (($differenceOrganizer / 1) * 100) : 0;

        $totalMemberHariIni = Member::whereDate('created_at', $today)->count();
        $totalMemberKemarin = Member::whereDate('created_at', $yesterday)->count();
        $differenceMember = $totalOrganizerHariIni - $totalMemberKemarin;
        $persenMember = ($differenceMember != 0) ? (($differenceMember / 1) * 100) : 0;
        $events = Event::all();
        $totalEventAkandatang = Event::where('status', 'Akan Datang')->count();
        $totalEventSelesai = Event::where('status', 'Selesai')->count();
        $kategoris = Kategori::all();
        $topEvents = Event::withCount([
            'orders' => function ($query) {
                $query->where('status', 'sukses');
            }
        ])->orderByDesc('orders_count')->take(5)->get();
        return view('admin.dashboard', compact('totalEventAkandatang','totalEventSelesai','events', 'kategoris', 'topEvents', 'totalEventHariIni', 'totalOrganizerHariIni', 'persenEvent', 'persenOrganizer', 'persenMember', 'totalMemberHariIni',));
    }
    function organizerIndex()
    {
        return view('organizer.dashboard');
    }
    function memberHome()
    {
        $events = Event::take(6)->orderBy('waktu', 'desc')->get();
        $kategoris = Kategori::all();
        return view('member.home', compact('events', 'kategoris'));
    }
    function memberDashboard()
    {
        return view('member.dashboard');
    }
    function tentangKami()
    {
        $organizers = User::all();
        return view('member.tentang-kami', compact('organizers'));
    }

}