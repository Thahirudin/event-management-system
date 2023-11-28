<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    function index()
    {
        return view('admin.list-order');
    }

    public function create()
    {
        return view('admin.tambah-order');
    }

    public function edit()
    {
        return view('admin.edit-order');
    }
}
