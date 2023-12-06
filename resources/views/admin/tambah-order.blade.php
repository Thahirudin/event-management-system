@extends('admin.layout.master')
@section('addCss')
    {{-- Masukkan dibawah ini jika ingin nambahkan css --}}
    <style>
        .popup-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
        }

        #popup-img {
            max-width: 80%;
            max-height: 80%;
        }
    </style>
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
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <div class="text-center mb-3">
                            <img src="{{ asset('uploads/events') . '/' . $event->thumbnail }}" alt="{{ $event->nama }}"
                                class="popup-img rounded w-100"
                                onclick="openPopup('{{ asset('uploads/events') . '/' . $event->thumbnail }}')">
                        </div>
                        <div class="mb-3">
                            <span class="h1 font-weight-bold ">{{ $event->nama_event }}</span>
                            <p>{{ $event->waktu }}</p>
                            <div class="d-flex align-items-center">
                                <div class="mr-3 "> <i class="ri-map-pin-line h3"></i></div>
                                <div><span class="h3">{{ $event->lokasi }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('admin-tambah-order', ['id' => $event->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="member">Id Member</label>
                            <input type="text" class="form-control" id="member" name="id_member">
                        </div>
                        <div class="form-group">
                            <label for="event">Id Event</label>
                            <input type="text" class="form-control" id="event" name="id_event"
                                value="{{ $event->id }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" id="status" name="status" value="periksa"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <select class="form-control" id="harga" name="id_harga">
                                @foreach ($event->harga as $harga)
                                    <option value="{{ $harga->id }}">{{ $harga->nama_harga }}:
                                        {{ number_format($harga->harga, 0, ',', '.') }} Tiket Tersedia:
                                        {{ $harga->jumlah_tiket }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bukti">Bukti</label>
                            <input type="file" class="form-control" id="bukti" name="bukti" required="required"
                                accept="image/*">
                        </div>
                        @if ($event->status == 'Akan Datang')
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Bayar</button>
                            </div>
                        @else
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <span>Event Telah <strong>{{ $event->status }}</strong></span>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="popup-container" class="popup-container" onclick="closePopup()">
        <img src="" alt="Popup Image" id="popup-img">
    </div>
@endsection
@section('addJs')
    {{-- Masukkan dibawah ini jika ingin menambahkan JS --}}
    <script>
        function openPopup(imageSrc) {
            document.getElementById('popup-img').src = imageSrc;
            document.getElementById('popup-container').style.display = 'flex';
        }

        function closePopup() {
            document.getElementById('popup-container').style.display = 'none';
        }
    </script>
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
