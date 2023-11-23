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
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin-dashboard');
});

Route::middleware(['auth', 'organizer'])->group(function () {
    Route::get('/organizer/dashboard', function () {
        return view('admin.dashboard');
    })->name('organizer-dashboard');
});

Route::get('/admin/list-event', function () {
    return view('admin/list-event');
});
Auth::routes();