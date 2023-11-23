<?php

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
    Route::get('/admin/list-event', function () {
        return view('admin/list-event');
    })->name('admin-list-event');
    Route::get('/admin/event-akan-datang', function () {
        return view('admin/event-akan-datang');
    })->name('admin-list-event');
    Route::get('/admin/event-selesai', function () {
        return view('admin/event-selesai');
    })->name('admin-event-selesai');
    Route::get('/admin/list-order', function () {
        return view('admin/order');
    })->name('admin-list-order');
    Route::get('/admin/list-kategori', function () {
        return view('admin/kategori');
    })->name('admin-list-kategori');
    Route::get('/admin/list-organizer', function () {
        return view('admin/organizer');
    })->name('admin-list-organizer');
    Route::get('/admin/list-member', function () {
        return view('admin/member');
    })->name('admin-list-member');
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