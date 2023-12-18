@extends('organizer.layout.master')
@section('addCss')
    {{-- Masukkan dibawah ini jika ingin nambahkan css --}}
@endsection
@section('title')
    {{-- Masukkan Title --}}
    Tambah Keuangan
@endsection
@section('keuangan')
    active active-menu
@endsection
@section('content')
    {{-- Untuk masukkan konten --}}
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Tambah Keuangan</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <form action="{{ route('organizer-store-keuangan', ['id' => $event->id]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="tanggal">tanggal:</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                </div>
                @error('tanggal')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="catatan">catatan:</label>
                    <input type="text" class="form-control" id="catatan"name="catatan" required>
                </div>
                @error('catatan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="jenis">Jenis</label>
                    <select class="form-control" id="jenis" name="jenis" autocomplete="off" required>
                        <option value="Pemasukan">Pemasukan</option>
                        <option value="Pengeluaran">Pengeluaran</option>
                    </select>
                </div>
                @error('jenis')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="total">total:</label>
                    <input type="number" class="form-control" id="total"name="total" required>
                </div>
                @error('total')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="bukti">bukti:</label>
                    <input type="file" class="form-control" id="bukti"name="bukti" accept="image/*" required>
                </div>
                @error('bukti')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="event_id">event_id:</label>
                    <input type="number" class="form-control" id="event_id"name="event_id" value="{{ $event->id }}"
                        readonly required>
                </div>
                @error('event_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group" hidden>
                    <label for="organizer_id">organizer_id:</label>
                    <input type="number" class="form-control" id="organizer_id"name="organizer_id"
                        value="{{ Auth::user()->id }}" readonly required>
                </div>
                @error('organizer_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
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
                title: "Gagal",
                text: "{{ session('sukses') }}",
                icon: "success"
            });

            // Clear the session after displaying the success message
            @php
                session()->forget('error');
            @endphp
        </script>
    @endif
@endsection
