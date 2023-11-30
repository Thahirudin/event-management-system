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
        <form action="{{ route('admin-store-organizer') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required="required">
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <select class="form-control" id="jabatan" name="jabatan" required="required">
                    <option value="Organizer">Organizer</option>
                    <option value="Admin">Admin</option>
                </select>
            </div>
            <div class="form-group">
                <label for="profil">Profil</label>
                <input type="file" class="form-control" id="profil" name="profil" required="required" accept="image/*">
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required="required">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required="required">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required="required">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection

@section('addJs')
    {{-- Masukkan dibawah ini jika ingin menambahkan JS --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('error'))
        <script>
            Swal.fire({
                title: "gagal",
                text: "{{ session('error') }}",
                icon: "warning"
            });

            // Clear the session after displaying the success message
            @php
                session()->forget('error');
            @endphp
        </script>
    @endif
@endsection
