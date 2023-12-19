<?php
use App\http\Controllers\EventController;
use App\http\Controllers\KategoriController;
use App\http\Controllers\OrderController;
use App\http\Controllers\OrganizerController;
use App\http\Controllers\MemberController;
use App\http\Controllers\KeuanganController;
use App\http\Controllers\DashboardController;
use App\http\Controllers\HargaController;

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

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'adminIndex'])->name('admin-dashboard');
    // Event
    Route::get('/admin/list-event', [EventController::class, 'index'])->name('admin-list-event');
    Route::get('/admin/event-akan-datang', [EventController::class, 'adminEventAkanDatang'])->name('admin-event-akan-datang');
    Route::get('/admin/event-selesai', [EventController::class, 'adminEventSelesai'])->name('admin-event-selesai');
    Route::get('/admin/tambah-event', [EventController::class, 'adminCreate'])->name('admin-tambah-event');
    Route::post('/admin/tambah-event', [EventController::class, 'store'])->name('admin-store-event');
    Route::get('/admin/edit-event/{id}', [EventController::class, 'adminEdit'])->name('admin-edit-event');
    Route::put('/admin/edit-event/{id}', [EventController::class, 'update'])->name('admin-update-event');
    Route::get('/admin/hapus-event/{id}', [EventController::class, 'destroy'])->name('admin-hapus-event');
    // order
    Route::get('/admin/list-order', [OrderController::class, 'index'])->name('admin-list-order');
    Route::get('/admin/list-order/{id}', [OrderController::class, 'adminListOrderEvent'])->name('admin-list-order-event');
    Route::get('/admin/tambah-order/{id}', [OrderController::class, 'adminCreate'])->name('admin-tambah-order');
    Route::post('/admin/tambah-order/{id}', [OrderController::class, 'store'])->name('admin-store-order');
    Route::put('/admin/terima-order/{id}', [OrderController::class, 'adminTerimaOrder'])->name('admin-terima-order');
    Route::put('/admin/tolak-order/{id}', [OrderController::class, 'adminTolakOrder'])->name('admin-tolak-order');
    Route::get('/admin/hapus-order/{id}', [OrderController::class, 'destroy'])->name('admin-hapus-order');
    Route::get('/admin/tiket/{id}', [OrderController::class, 'adminTiket'])->name('admin-tiket');
    // kategori
    Route::get('/admin/list-kategori', [KategoriController::class, 'index'])->name('admin-list-kategori');
    Route::get('/admin/tambah-kategori', [KategoriController::class, 'adminCreate'])->name('admin-tambah-kategori');
    Route::post('/admin/tambah-kategori', [KategoriController::class, 'store'])->name('admin-store-kategori');
    Route::get('/admin/edit-kategori/{id}', [KategoriController::class, 'adminEdit'])->name('admin-edit-kategori');
    Route::put('/admin/edit-kategori/{id}', [KategoriController::class, 'update'])->name('admin-update-kategori');
    Route::get('/admin/hapus-kategori/{id}', [KategoriController::class, 'destroy'])->name('admin-hapus-kategori');
    // organizer
    Route::get('/admin/list-organizer', [OrganizerController::class, 'index'])->name('admin-list-organizer');
    Route::get('/admin/tambah-organizer', [OrganizerController::class, 'adminCreate'])->name('admin-tambah-organizer');
    Route::post('/admin/tambah-organizer', [OrganizerController::class, 'store'])->name('admin-store-organizer');
    Route::get('/admin/edit-organizer/{id}', [OrganizerController::class, 'adminEdit'])->name('admin-edit-organizer');
    Route::put('/admin/edit-organizer/{id}', [OrganizerController::class, 'update'])->name('admin-update-organizer');
    Route::get('/admin/hapus-organizer/{id}', [OrganizerController::class, 'destroy'])->name('admin-hapus-organizer');
    Route::get('/admin/profil-organizer/{id}', [OrganizerController::class, 'profil'])->name('admin-profil-organizer');
    // member
    Route::get('/admin/list-member', [MemberController::class, 'index'])->name('admin-list-member');
    Route::get('/admin/tambah-member', [MemberController::class, 'adminCreate'])->name('admin-tambah-member');
    Route::post('/admin/tambah-member', [MemberController::class, 'store'])->name('admin-store-member');
    Route::get('/admin/edit-member/{id}', [MemberController::class, 'adminEdit'])->name('admin-edit-member');
    Route::put('/admin/edit-member/{id}', [MemberController::class, 'update'])->name('admin-update-member');
    Route::get('/admin/hapus-member/{id}', [MemberController::class, 'destroy'])->name('admin-hapus-member');
    Route::get('/admin/profil-member/{id}', [MemberController::class, 'profil'])->name('admin-profil-member');
    // keuangan
    Route::get('/admin/keuangan/list-keuangan', [KeuanganController::class, 'index'])->name('admin-list-keuangan');
    Route::get('/admin/keuangan/list-keuangan/{id}', [KeuanganController::class, 'listKeuanganEvent'])->name('admin-list-keuangan-event');
    Route::get('/admin//keuangan/list-pemasukan', [KeuanganController::class, 'listPemasukan'])->name('admin-list-pemasukan');
    Route::get('/admin//keuangan/list-pengeluaran', [KeuanganController::class, 'listPengeluaran'])->name('admin-list-pengeluaran');
    Route::get('/admin/keuangan/tambah-keuangan/{id}', [KeuanganController::class, 'adminCreate'])->name('admin-tambah-keuangan');
    Route::post('/admin/keuangan/tambah-keuangan/{id}', [KeuanganController::class, 'store'])->name('admin-store-keuangan');
    Route::get('/admin/keuangan/edit-keuangan/{id}', [KeuanganController::class, 'adminEdit'])->name('admin-edit-keuangan');
    Route::put('/admin/keuangan/edit-keuangan/{id}', [KeuanganController::class, 'update'])->name('admin-update-keuangan');
    Route::get('/admin/hapus-keuangan/{id}', [KeuanganController::class, 'destroy'])->name('admin-hapus-keuangan');

    Route::get('/admin/harga/list-harga/{id}', [HargaController::class, 'index'])->name('admin-list-harga');
    Route::get('/admin/harga/tambah-harga/{id}', [HargaController::class, 'adminCreate'])->name('admin-tambah-harga');
    Route::post('/admin/harga/tambah-harga/{id}', [HargaController::class, 'store'])->name('admin-store-harga');
    Route::get('/admin/harga/edit-harga/{id}', [HargaController::class, 'adminEdit'])->name('admin-edit-harga');
    Route::put('/admin/harga/edit-harga/{id}', [HargaController::class, 'update'])->name('admin-update-harga');
    Route::get('/admin/hapus-harga/{id}', [HargaController::class, 'destroy'])->name('admin-hapus-harga');
});

Route::middleware(['auth', 'organizer'])->group(function () {
    Route::get('/organizer/dashboard', [DashboardController::class, 'organizerIndex'])->name('organizer-dashboard');
    // Event
    Route::get('/organizer/list-event', [EventController::class, 'organizerListEvent'])->name('organizer-list-event');
    Route::get('/organizer/event-akan-datang', [EventController::class, 'organizerEventAkanDatang'])->name('organizer-event-akan-datang');
    Route::get('/organizer/event-selesai', [EventController::class, 'organizerEventSelesai'])->name('organizer-event-selesai');
    Route::get('/organizer/tambah-event', [EventController::class, 'organizerCreate'])->name('organizer-tambah-event');
    Route::post('/organizer/tambah-event', [EventController::class, 'organizerStore'])->name('organizer-store-event');
    Route::get('/organizer/edit-event/{id}', [EventController::class, 'organizerEdit'])->name('organizer-edit-event');
    Route::put('/organizer/edit-event/{id}', [EventController::class, 'organizerUpdate'])->name('organizer-update-event');
    Route::get('/organizer/hapus-event/{id}', [EventController::class, 'organizerDestroy'])->name('organizer-hapus-event');
    // order
    Route::get('/organizer/list-order', [OrderController::class, 'organizerIndex'])->name('organizer-list-order');
    Route::get('/organizer/list-order/{id}', [OrderController::class, 'organizerListOrderEvent'])->name('organizer-list-order-event');
    Route::put('/organizer/terima-order/{id}', [OrderController::class, 'organizerTerimaOrder'])->name('organizer-terima-order');
    Route::put('/organizer/tolak-order/{id}', [OrderController::class, 'organizerTolakOrder'])->name('organizer-tolak-order');
    Route::get('/organizer/hapus-order/{id}', [OrderController::class, 'organizerDestroy'])->name('organizer-hapus-order');
    Route::get('/organizer/tiket/{id}', [OrderController::class, 'organizerTiket'])->name('organizer-tiket');
    // kategori
    Route::get('/organizer/list-kategori', [KategoriController::class, 'organizerIndex'])->name('organizer-list-kategori');
    Route::get('/organizer/tambah-kategori', [KategoriController::class, 'organizerCreate'])->name('organizer-tambah-kategori');
    Route::post('/organizer/tambah-kategori', [KategoriController::class, 'organizerStore'])->name('organizer-store-kategori');
    Route::get('/organizer/edit-kategori/{id}', [KategoriController::class, 'organizerEdit'])->name('organizer-edit-kategori');
    Route::put('/organizer/edit-kategori/{id}', [KategoriController::class, 'organizerUpdate'])->name('organizer-update-kategori');
    Route::get('/organizer/hapus-kategori/{id}', [KategoriController::class, 'organizerDestroy'])->name('organizer-hapus-kategori');
    // organizer
    Route::get('/organizer/list-organizer', [OrganizerController::class, 'organizerIndex'])->name('organizer-list-organizer');
    Route::get('/organizer/tambah-organizer', [OrganizerController::class, 'organizerCreate'])->name('organizer-tambah-organizer');
    Route::post('/organizer/tambah-organizer', [OrganizerController::class, 'store'])->name('organizer-store-organizer');
    Route::get('/organizer/edit-organizer/{id}', [OrganizerController::class, 'organizerEdit'])->name('organizer-edit-organizer');
    Route::put('/organizer/edit-organizer/{id}', [OrganizerController::class, 'organizerUpdate'])->name('organizer-update-organizer');
    Route::get('/organizer/hapus-organizer/{id}', [OrganizerController::class, 'organizerDestroy'])->name('organizer-hapus-organizer');
    Route::get('/organizer/profil-organizer/{id}', [OrganizerController::class, 'organizerProfil'])->name('organizer-profil-organizer');
    // member
    Route::get('/organizer/list-member', [MemberController::class, 'organizerIndex'])->name('organizer-list-member');
    Route::get('/organizer/tambah-member', [MemberController::class, 'organizerCreate'])->name('organizer-tambah-member');
    Route::post('/organizer/tambah-member', [MemberController::class, 'organizerStore'])->name('organizer-store-member');
    Route::get('/organizer/edit-member/{id}', [MemberController::class, 'organizerEdit'])->name('organizer-edit-member');
    Route::put('/organizer/edit-member/{id}', [MemberController::class, 'organizerUpdate'])->name('organizer-update-member');
    Route::get('/organizer/profil-member/{id}', [MemberController::class, 'organizerProfil'])->name('organizer-profil-member');
    // keuangan
    Route::get('/organizer/keuangan/list-keuangan', [KeuanganController::class, 'organizerIndex'])->name('organizer-list-keuangan');
    Route::get('/organizer/keuangan/list-keuangan/{id}', [KeuanganController::class, 'organizerListKeuanganEvent'])->name('organizer-list-keuangan-event');
    Route::get('/organizer//keuangan/pemasukan-event', [KeuanganController::class, 'organizerPemasukanEvent'])->name('organizer-list-pemasukan-event');
    Route::get('/organizer//keuangan/pengeluaran-event', [KeuanganController::class, 'organizerPengeluaranEvent'])->name('organizer-list-pengeluaran-event');
    Route::get('/organizer/keuangan/tambah-keuangan/{id}', [KeuanganController::class, 'organizerCreate'])->name('organizer-tambah-keuangan');
    Route::post('/organizer/keuangan/tambah-keuangan/{id}', [KeuanganController::class, 'organizerStore'])->name('organizer-store-keuangan');
    Route::get('/organizer/keuangan/edit-keuangan/{id}', [KeuanganController::class, 'organizerEdit'])->name('organizer-edit-keuangan');
    Route::put('/organizer/keuangan/edit-keuangan/{id}', [KeuanganController::class, 'organizerUpdate'])->name('organizer-update-keuangan');
    Route::get('/organizer//keuangan/list-pemasukan', [KeuanganController::class, 'organizerListPemasukan'])->name('organizer-list-pemasukan');
    Route::get('/organizer//keuangan/list-pengeluaran', [KeuanganController::class, 'organizerListPengeluaran'])->name('organizer-list-pengeluaran');
    Route::get('/organizer/hapus-keuangan/{id}', [KeuanganController::class, 'organizerDestroy'])->name('organizer-hapus-keuangan');
    Route::get('/organizer/harga/list-harga/{id}', [HargaController::class, 'organizerIndex'])->name('organizer-list-harga');
    Route::get('/organizer/harga/tambah-harga/{id}', [HargaController::class, 'organizerCreate'])->name('organizer-tambah-harga');
    Route::post('/organizer/harga/tambah-harga/{id}', [HargaController::class, 'organizerStore'])->name('organizer-store-harga');
    Route::get('/organizer/harga/edit-harga/{id}', [HargaController::class, 'organizerEdit'])->name('organizer-edit-harga');
    Route::put('/organizer/harga/edit-harga/{id}', [HargaController::class, 'organizerUpdate'])->name('organizer-update-harga');
    Route::get('/organizer/hapus-harga/{id}', [HargaController::class, 'organizerDestroy'])->name('organizer-hapus-harga');
});
Route::middleware([ 'member'])->group(function () {
    // order
    Route::get('/member/list-order', [OrderController::class, 'memberIndex'])->name('member-list-order');
    Route::get('/member/tambah-order/{id}', [OrderController::class, 'memberCreate'])->name('member-tambah-order');
    Route::post('/member/tambah-order/{id}', [OrderController::class, 'memberStore'])->name('member-store-order');
    Route::get('/member/profil-member/{id}', [MemberController::class, 'memberProfil'])->name('member-profil-member');
    Route::get('/member/edit-member/{id}', [MemberController::class, 'memberEdit'])->name('member-edit-member');

});
// Route::get('/member/list-order', [OrderController::class, 'memberIndex'])->name('member-list-order');
// 
Route::get('/tiket/{id}', [OrderController::class, 'memberTiket'])->name('member-tiket');
Route::get('/events', [EventController::class, 'memberAllEvent'])->name('member-all-event');
Route::get('/events/kategori/{slug}', [EventController::class, 'memberEventKategori'])->name('member-event-kategori');
Route::get('/', [DashboardController::class, 'memberHome'])->name('home');
Route::get('/daftar', [MemberController::class, 'memberCreate'])->name('member-tambah-member');
Route::get('/tentang-kami', [DashboardController::class, 'tentangKami'])->name('tentang-kami');
Route::get('/event/{id}', [EventController::class, 'detailEvent'])->name('detail-event');
Route::get('/member/tiket/{id}', [OrderController::class, 'memberTiket'])->name('member-tiket');
Route::get('/profil-organizer/{id}', [OrganizerController::class, 'memberProfil'])->name('member-profil-organizer');
Auth::routes();