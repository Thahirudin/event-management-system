@extends('admin.layout.master')
@section('addCss')
    {{-- Masukkan dibawah ini jika ingin nambahkan css --}}
@endsection
@section('title')
    Tambah Kategori
@endsection
@section('kategori')
    active active-menu
@endsection
@section('content')
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Tambah Kategori</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <form>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <input type="text" class="form-control" id="kategori">
                </div>
                <div class="form-group">
                    <label for="slug">Slug URL</label>
                    <input type="text" class="form-control" id="slug">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
@section('addJs')
    {{-- Masukkan dibawah ini jika ingin menambahkan JS --}}
@endsection
