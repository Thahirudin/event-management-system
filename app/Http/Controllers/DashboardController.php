<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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

        // Event
        $totalEventHariIni = Event::whereDate('created_at', $today)->count();
        $totalEventKemarin = Event::whereDate('created_at', $yesterday)->count();
        $differenceEvent = $totalEventHariIni - $totalEventKemarin;
        $persenEvent = ($totalEventKemarin != 0) ? ($differenceEvent / abs($totalEventKemarin) * 100) : 0;
        $persenEventFormatted = number_format($persenEvent, 2);

        // Organizer
        $totalOrganizerHariIni = User::whereDate('created_at', $today)->count();
        $totalOrganizerKemarin = User::whereDate('created_at', $yesterday)->count();
        $differenceOrganizer = $totalOrganizerHariIni - $totalOrganizerKemarin;
        $persenOrganizer = ($totalOrganizerKemarin != 0) ? ($differenceOrganizer / abs($totalOrganizerKemarin) * 100) : 0;
        $persenOrganizerFormatted = number_format($persenOrganizer, 2);

        // Member
        $totalMemberHariIni = Member::whereDate('created_at', $today)->count();
        $totalMemberKemarin = Member::whereDate('created_at', $yesterday)->count();
        $differenceMember = $totalMemberHariIni - $totalMemberKemarin;
        $persenMember = ($totalMemberKemarin != 0) ? ($differenceMember / abs($totalMemberKemarin) * 100) : 0;
        $persenMemberFormatted = number_format($persenMember, 2);
        $events = Event::all();
        $totalEventAkandatang = Event::where('status', 'Akan Datang')->count();
        $totalEventSelesai = Event::where('status', 'Selesai')->count();
        $kategoris = Kategori::all();
        $kategoris2 = Kategori::pluck('id')->toArray();
        $dataBulanIni = $this->getTotalEventsByMonth($kategoris2, Carbon::now());
        $dataBulanLalu = $this->getTotalEventsByMonth($kategoris2, Carbon::now()->subMonth());
        $topEvents = Event::withCount([
            'orders' => function ($query) {
                $query->where('status', 'sukses');
            }
        ])->orderByDesc('orders_count')->take(5)->get();
        $topKategoris = Kategori::withCount('event')
            ->orderByDesc('event_count')
            ->take(5)
            ->get();
        return view('admin.dashboard', compact('topKategoris', 'totalEventAkandatang', 'totalEventSelesai', 'events', 'kategoris', 'dataBulanIni', 'dataBulanLalu', 'topEvents', 'totalEventHariIni', 'totalOrganizerHariIni', 'persenEvent', 'persenOrganizer', 'persenMember', 'totalMemberHariIni'));
    }
    private function getTotalEventsByMonth($kategoris, $date)
    {
        $data = [];

        foreach ($kategoris as $kategori) {
            $totalEvents = Event::where('id_kategori', $kategori)
                ->whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();

            $data[] = $totalEvents;
        }

        return $data;
    }
    function organizerIndex()
    {
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();

        // Event
        $totalEventHariIni = Event::whereDate('created_at', $today)->count();
        $totalEventKemarin = Event::whereDate('created_at', $yesterday)->count();
        $differenceEvent = $totalEventHariIni - $totalEventKemarin;
        $persenEvent = ($totalEventKemarin != 0) ? ($differenceEvent / abs($totalEventKemarin) * 100) : 0;
        $persenEventFormatted = number_format($persenEvent, 2);

        // Organizer
        $totalOrganizerHariIni = User::whereDate('created_at', $today)->count();
        $totalOrganizerKemarin = User::whereDate('created_at', $yesterday)->count();
        $differenceOrganizer = $totalOrganizerHariIni - $totalOrganizerKemarin;
        $persenOrganizer = ($totalOrganizerKemarin != 0) ? ($differenceOrganizer / abs($totalOrganizerKemarin) * 100) : 0;
        $persenOrganizerFormatted = number_format($persenOrganizer, 2);

        // Member
        $totalMemberHariIni = Member::whereDate('created_at', $today)->count();
        $totalMemberKemarin = Member::whereDate('created_at', $yesterday)->count();
        $differenceMember = $totalMemberHariIni - $totalMemberKemarin;
        $persenMember = ($totalMemberKemarin != 0) ? ($differenceMember / abs($totalMemberKemarin) * 100) : 0;
        $persenMemberFormatted = number_format($persenMember, 2);
        $events = Event::where('id_organizer', Auth::user()->id)->get();
        $totalEventAkandatang = Event::where('status', 'Akan Datang')->count();
        $totalEventSelesai = Event::where('status', 'Selesai')->count();
        $kategoris = Kategori::all();
        $kategoris2 = Kategori::pluck('id')->toArray();
        $dataBulanIni = $this->getTotalEventsByMonth($kategoris2, Carbon::now());
        $dataBulanLalu = $this->getTotalEventsByMonth($kategoris2, Carbon::now()->subMonth());
        $topEvents = Event::withCount([
            'orders' => function ($query) {
                $query->where('status', 'sukses');
            }
        ])->orderByDesc('orders_count')->take(5)->get();
        $topKategoris = Kategori::withCount('event')
            ->orderByDesc('event_count')
            ->take(5)
            ->get();
        return view('organizer.dashboard', compact('topKategoris', 'totalEventAkandatang', 'totalEventSelesai', 'events', 'kategoris', 'dataBulanIni', 'dataBulanLalu', 'topEvents', 'totalEventHariIni', 'totalOrganizerHariIni', 'persenEvent', 'persenOrganizer', 'persenMember', 'totalMemberHariIni'));
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