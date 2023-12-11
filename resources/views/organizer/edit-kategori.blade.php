@extends('admin.layout.master')
@section('addCss')
    {{-- Masukkan dibawah ini jika ingin nambahkan css --}}
@endsection
@section('title')
    Edit Kategori
@endsection
@section('kategori')
    active active-menu
@endsection
@section('content')
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Edit Kategori</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <form action="{{ route('organizer-update-kategori', ['id' => $kategori->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <input type="text" class="form-control" id="kategori" oninput="generateSlug()" name="nama"
                        required autocomplete="off" value="{{ $kategori->nama }}">
                </div>
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="slug">Slug URL</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ $kategori->slug }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
@section('addJs')
    <script>
        function generateSlug() {
            var kategoriInput = document.getElementById('kategori').value;
            var slugInput = kategoriInput.toLowerCase().replace(/\s+/g, '-');
            document.getElementById('slug').value = slugInput;
        }
    </script>
@endsection
