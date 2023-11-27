<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    function index(){
        
        return view('admin.list-organizer');
    }
}
