@extends('organizer.layout.master')
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
            <form action="{{ route('organizer-store-kategori') }}" method="post">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <input type="text" class="form-control" id="kategori" oninput="generateSlug()" name="nama"
                        required>
                </div>
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="slug">Slug URL</label>
                    <input type="text" class="form-control" id="slug" name="slug">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('sukses'))
        <script>
            Swal.fire({
                title: "Sukses",
                text: "{{ session('sukses') }}",
                icon: "success"
            });

            // Clear the session after displaying the success message
            @php
                session()->forget('sukses');
            @endphp
        </script>
    @endif
@endsection
