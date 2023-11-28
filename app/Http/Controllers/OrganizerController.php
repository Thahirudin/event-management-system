<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    function index(){
        
        return view('admin.list-organizer');
    }

    public function create(){

        return view('admin.tambah-organizer');
    }

    public function edit(){

        return view('admin.edit-organizer');
    }
}
