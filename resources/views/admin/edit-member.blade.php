@extends('admin.layout.master')
@section('addCss')
    {{-- Masukkan dibawah ini jika ingin nambahkan css --}}
@endsection
@section('title')
    Edit member
@endsection
@section('kategori')
    active active-menu
@endsection
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Member</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin-list-member') }}">List Member</a></li>
                        <li class="breadcrumb-item active">Edit Member</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin-update-member', ['id' => $member->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method ('PUT')
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" required="required"
                                value="{{ $member->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                                required="required" value="{{ $member->tanggal_lahir }}">
                        </div>
                        <div class="form-group">
                            <label for="profil">Profil</label>
                            <input type="file" class="form-control" id="profil" name="profil"
                                accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required="required"
                                value="{{ $member->email }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="text-right">
                            <a href="{{ route('admin-list-member') }}" class="btn btn-outline-secondary mr-2"
                                role="button">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
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
