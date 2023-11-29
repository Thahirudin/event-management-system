<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    function index(){
        
        return view('admin.list-event');
    }
    function create(){
        return view('admin.tambah-event');
    }
}