@extends('member.layout.master')
@section('addCss')
    {{-- Masukkan dibawah ini jika ingin nambahkan css --}}
@endsection
@section('title')
    Profil Organizer
@endsection
@section('kategori')
    active active-menu
@endsection
@section('content')
    <div class="iq-card">
        <div class="iq-card-body profile-page">
            <div class="profile-header">
                <div class="cover-container text-center">
                    <img src="{{ asset('uploads/organizers') . '/' . $organizer->profil }}" alt="user"
                        class="rounded-circle img-fluid img-thumbnail" style="max-width: 200px; max-height: 200px;">
                    <div class="profile-detail mt-3">
                        <h3>{{ $organizer->nama }}</h3>
                        {{ $organizer->jabatan }}
                    </div>
                    <div class="iq-social d-inline-block align-items-center">
                        <ul class="list-inline d-flex p-0 mb-0 align-items-center">
                            <li>
                                <a href="{{ $organizer->facebook }}"
                                    class="avatar-40 rounded-circle bg-primary mr-2 facebook"><i class="fa fa-facebook"
                                        aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="{{ $organizer->twitter }}"
                                    class="avatar-40 rounded-circle bg-primary mr-2 twitter"><i class="fa fa-twitter"
                                        aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="{{ $organizer->instagram }}"
                                    class="avatar-40 rounded-circle bg-primary mr-2 instagram"><i class="fa fa-instagram"
                                        aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between align-items-center mb-0">
            <div class="iq-header-title">
                <h4 class="card-title mb-0">Personal Details</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <ul class="list-inline p-0 mb-0">
                <li>
                    <div class="row align-items-center justify-content-between mb-3">
                        <div class="col-sm-6">
                            <h6>Nama</h6>
                        </div>
                        <div class="col-sm-6">
                            {{ $organizer->nama }}
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row align-items-center justify-content-between mb-3">
                        <div class="col-sm-6">
                            <h6>Tempat/Tanggal Lahir</h6>
                        </div>
                        <div class="col-sm-6">
                            {{ $organizer->tempat_lahir }}/{{ $organizer->tanggal_lahir }}
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row align-items-center justify-content-between mb-3">
                        <div class="col-sm-6">
                            <h6>Jenis Kelamin</h6>
                        </div>
                        <div class="col-sm-6">
                            {{ $organizer->jenis_kelamin }}
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row align-items-center justify-content-between mb-3">
                        <div class="col-sm-6">
                            <h6>Email</h6>
                        </div>
                        <div class="col-sm-6">
                            {{ $organizer->email }}
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row align-items-center justify-content-between mb-3">
                        <div class="col-sm-6">
                            <h6>Alamat</h6>
                        </div>
                        <div class="col-sm-6">
                            {{ $organizer->alamat }}
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row align-items-center justify-content-between mb-3">
                        <div class="col-sm-6">
                            <h6>No hp</h6>
                        </div>
                        <div class="col-sm-6">
                            {{ $organizer->no_hp }}
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row align-items-center justify-content-between mb-3">
                        <div class="col-sm-6">
                            <h6>Rekening</h6>
                        </div>
                        <div class="col-sm-6">
                            {{ $organizer->nama_bank }} : {{ $organizer->nomor_rekening }}
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection
@section('addJs')
    {{-- Masukkan dibawah ini jika ingin menambahkan JS --}}
@endsection
