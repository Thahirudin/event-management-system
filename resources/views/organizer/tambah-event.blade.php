@extends('organizer.layout.master')
@section('addCss')
@endsection
@section('title')
    Tambah Event
@endsection
@section('event')
    active active-menu
@endsection
@section('content')
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Tambah Event</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <form action="{{ route('organizer-store-event') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="id_organizer">Id Organizer</label>
                    <input type="text" class="form-control" id="id_organizer" name="id_organizer"
                        value="{{ Auth::user()->id }}" readonly autocomplete="off" required>
                </div>
                @error('id_organizer')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select class="form-control" id="kategori" name="kategori" autocomplete="off" required>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ old('kategori') == "$kategori->id" ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>
                @error('kategori')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="nama_event">Nama Event</label>
                    <input type="text" class="form-control" id="nama_event" name="nama_event" oninput="generateSlug()"
                        autocomplete="off" required value="{{ old('nama_event') }}">
                </div>
                @error('nama_event')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="slug">slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" autocomplete="off" required value="{{ old('slug') }}">
                </div>
                @error('slug')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <input type="file" name="thumbnail" accept="image/*" required>
                </div>
                @error('thumbnail')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="waktu">Waktu</label>
                            <input type="text" class="form-control" id="waktu" name="waktu"
                                placeholder="Pilih Tanggal dan Waktu" autocomplete="off" required value="{{ old('waktu') }}">
                        </div>
                        @error('waktu')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi" autocomplete="off"
                                required value="{{ old('lokasi') }}">
                        </div>
                        @error('lokasi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="detail">Detail</label>
                    <textarea name="detail" id="detail" autocomplete="off" required >{{ old('detail') }}</textarea>
                    @error('detail')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kontak">kontak</label>
                    <input type="text" class="form-control" id="kontak" name="kontak" autocomplete="off" required value="{{ old('kontak') }}">
                </div>
                @error('kontak')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" id="status" name="status" readonly
                        autocomplete="off" required value="Akan Datang">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
@section('addJs')
    <script>
        function generateSlug() {
            var eventInput = document.getElementById('nama_event').value;
            var slugInput = eventInput.toLowerCase().replace(/\s+/g, '-');
            document.getElementById('slug').value = slugInput;
        }
    </script>
    <script src="https://cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('detail', {
            height: 550,
            uiColor: '#9AB8F3'
        });
    </script>
    <!-- Moment.js -->
    <script src="https://cdn.jsdelivr.net/npm/moment/moment.min.js"></script>

    <!-- Flatpickr JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        // Inisialisasi Flatpickr dengan opsi zona waktu lokal
        flatpickr("#waktu", {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            time_24hr: true,
            // Set zona waktu sesuai dengan zona waktu lokal
            timeZone: Intl.DateTimeFormat().resolvedOptions().timeZone,
        });
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
