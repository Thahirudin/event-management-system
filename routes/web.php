<?php
use App\http\Controllers\EventController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// routes/web.php

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin-dashboard');
    Route::get('/admin/list-event', [EventController::class, 'index'] )->name('admin-list-event');
    Route::get('/admin/event-akan-datang', function () {
        return view('admin/event-akan-datang');
    })->name('admin-event-akan-datang');
    Route::get('/admin/event-selesai', function () {
        return view('admin/event-selesai');
    })->name('admin-event-selesai');
    Route::get('/admin/list-order', function () {
        return view('admin/order');
    })->name('admin-list-order');
    Route::get('/admin/tambah-order', function () {
        return view('admin.tambah-order');
    })->name('admin-tambah-order');
    Route::get('/admin/edit-order', function () {
        return view('admin.edit-order');
    })->name('admin-edit-order');
    Route::get('/admin/list-kategori', function () {
        return view('admin/kategori');
    })->name('admin-list-kategori');
    Route::get('/admin/list-organizer', function () {
        return view('admin/organizer');
    })->name('admin-list-organizer');
    Route::get('/admin/tambah-organizer', function () {
        return view('admin.tambah-organizer');
    })->name('admin-tambah-organizer');
    Route::get('/admin/edit-organizer', function () {
        return view('admin.edit-organizer');
    })->name('admin-edit-organizer');
    Route::get('/admin/list-member', function () {
        return view('admin/member');
    })->name('admin-list-member');
    Route::get('/admin/tambah-member', function () {
        return view('admin.tambah-member');
    })->name('admin-tambah-member');
    Route::get('/admin/edit-member', function () {
        return view('admin.edit-member');
    })->name('admin-edit-member');
    Route::get('/admin/list-keuangan', function () {
        return view('admin/keuangan');
    })->name('admin-list-keuangan');
    Route::get('/admin/tambah-kategori', function () {
        return view('admin.tambah-kategori');
    })->name('admin-tambah-kategori');
    
});

Route::middleware(['auth', 'organizer'])->group(function () {
    Route::get('/organizer/dashboard', function () {
        return view('admin.dashboard');
    })->name('organizer-dashboard');
});
Auth::routes();