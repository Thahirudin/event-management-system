@extends('admin.layout.master')
@section('addCss')
    {{-- Masukkan dibawah ini jika ingin nambahkan css --}}
@endsection
@section('title')
    Tambah Organizer
@endsection
@section('kategori')
    active active-menu
@endsection
@section('content')
<div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between text-white">
        <div class="iq-header-title">
            <h4 class="card-title">Tambah Organizer</h4>
        </div>
    </div>
    <div class="iq-card-body">
        <form>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama">
            </div>
            <div class="form-group">
                <label for="tgllahir">Tanggal lahir</label>
                <input type="date" class="form-control" id="tgllahir">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection

@section('addJs')
    {{-- Masukkan dibawah ini jika ingin menambahkan JS --}}
@endsection
