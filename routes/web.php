<?php
use App\http\Controllers\EventController;
use App\http\Controllers\KategoriController;
use App\http\Controllers\OrderController;
use App\http\Controllers\OrganizerController;
use App\http\Controllers\MemberController;

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
    // Event
    Route::get('/admin/list-event', [EventController::class, 'index'])->name('admin-list-event');
    Route::get('/admin/event-akan-datang', function () {
        return view('admin/event-akan-datang');
    })->name('admin-event-akan-datang');
    Route::get('/admin/event-selesai', function () {
        return view('admin/event-selesai');
    })->name('admin-event-selesai');
    Route::get('/admin/tambah-event', [EventController::class, 'adminCreate'])->name('admin-tambah-event');
    Route::post('/admin/tambah-event', [EventController::class, 'store'])->name('admin-store-event');
    // order
    Route::get('/admin/list-order', [OrderController::class, 'index'])->name('admin-list-order');
    Route::get('/admin/tambah-order', [OrderController::class, 'adminCreate'])->name('admin-tambah-order');
    Route::post('/admin/tambah-order', [OrderController::class, 'store'])->name('admin-store-order');
    Route::get('/admin/edit-order', [OrderController::class, 'adminEdit'])->name('admin-edit-order');
    // kategori
    Route::get('/admin/list-kategori', [KategoriController::class, 'index'])->name('admin-list-kategori');
    Route::get('/admin/tambah-kategori', [KategoriController::class, 'adminCreate'])->name('admin-tambah-kategori');
    Route::post('/admin/tambah-kategori', [KategoriController::class, 'store'])->name('admin-store-kategori');
    // organizer
    Route::get('/admin/list-organizer', [OrganizerController::class, 'index'])->name('admin-list-organizer');
    Route::get('/admin/tambah-organizer', [OrganizerController::class, 'adminCreate'])->name('admin-tambah-organizer');
    Route::post('/admin/tambah-organizer', [OrganizerController::class, 'store'])->name('admin-store-organizer');
    Route::get('/admin/edit-organizer', [OrganizerController::class, 'adminEdit'])->name('admin-edit-organizer');
    // member
    Route::get('/admin/list-member', [MemberController::class, 'index'])->name('admin-list-member');
    Route::get('/admin/tambah-member', [MemberController::class, 'adminCreate'])->name('admin-tambah-member');
    Route::post('/admin/tambah-member', [MemberController::class, 'store'])->name('admin-store-member');
    Route::get('/admin/edit-member', [MemberController::class, 'adminEdit'])->name('admin-edit-member');
    // keuangan
    Route::get('/admin/list-keuangan', function () {
        return view('admin/keuangan');
    })->name('admin-list-keuangan');

});

Route::middleware(['auth', 'organizer'])->group(function () {
    Route::get('/organizer/dashboard', function () {
        return view('admin.dashboard');
    })->name('organizer-dashboard');
});
Auth::routes();