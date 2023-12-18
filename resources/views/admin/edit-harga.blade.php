@extends('admin.layout.master')
@section('addCss')
@endsection
@section('title')
    Edit Harga
@endsection
@section('event')
    active active-menu
@endsection
@section('content')
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Edit Harga</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <form action="{{ route('admin-update-harga', ['id' => $harga->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="id_event">Id Event</label>
                    <input type="text" class="form-control" id="id_event" name="id_event" readonly autocomplete="off" required value="{{ $harga->event->id }}">
                    @error('id_event')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_harga">Nama Harga</label>
                    <input type="text" class="form-control" id="nama_harga" name="nama_harga" autocomplete="off" required value="{{ $harga->nama_harga }}">
                    @error('nama_harga')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" autocomplete="off" required value="{{ $harga->harga }}">
                    @error('harga')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga">jumlah_tiket</label>
                    <input type="number" class="form-control" id="jumlah_tiket" name="jumlah_tiket" autocomplete="off" required value="{{ $harga->jumlah_tiket }}">
                    @error('jumlah_tiket')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
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
