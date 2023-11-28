<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    function index(){
        return view('admin.list-member');
    }
    
    function create(){
    return view('admin.tambah-member');
}

    function edit(){
    return view('admin.edit-member');
}
}
