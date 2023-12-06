@extends('admin.layout.master')
@section('addCss')
    {{-- Masukkan dibawah ini jika ingin nambahkan css --}}
@endsection
@section('title')
    Order Event
@endsection
@section('order')
    active active-menu
@endsection
@section('content')
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Order Event</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <div class="text-center mb-3">
                <img src="{{ asset('uploads/events') . '/' . $event->thumbnail }}" alt="" class="rounded w-100">
            </div>
            <div class="mb-3">
                <h1 class="h3">{{ $event->nama_event }}</h1>
            </div>
            <form action="{{ route('admin-tambah-order', ['id' => $event->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="member">Id Member</label>
                    <input type="text" class="form-control" id="member" name="id_member">
                </div>
                <div class="form-group">
                    <label for="event">Id Event</label>
                    <input type="text" class="form-control" id="event" name="id_event" value="{{ $event->id }}"
                        readonly>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" id="status" name="status" value="periksa" readonly>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <select class="form-control" id="harga" name="id_harga">
                        @foreach ($event->harga as $harga)
                            <option value="{{ $harga->id }}">{{ $harga->nama_harga }} : {{ $harga->harga }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="bukti">Bukti</label>
                    <input type="file" class="form-control" id="bukti" name="bukti" required="required"
                        accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary">Bayar</button>
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
