@extends('admin.layout.master')
@section('addCss')
    {{-- Masukkan dibawah ini jika ingin nambahkan css --}}
@endsection
@section('title')
    List Event
@endsection
@section('list-event')
    active active-menu
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">List Event</h4>
                    </div>
                    <div>
                        <a href="{{ route('admin-store-event') }}" class="btn btn-primary">Tambah Event</a>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Organizer</th>
                                    <th>Kategori</th>
                                    <th>Nama Event</th>
                                    <th>Waktu</th>
                                    <th>Lokasi</th>
                                    <th>Kontak</th>
                                    <th>Harga</th>
                                    <th>Jumlah Tiket</th>
                                    <th>Thumbnail</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $event->user->nama }}</td>
                                        <td>{{ $event->kategori->nama }}</td>
                                        <td>{{ $event->nama_event }}</td>
                                        <td>{{ $event->waktu }}</td>
                                        <td>{{ $event->lokasi }}</td>
                                        <td>{{ $event->kontak }}</td>
                                        <td>
                                            @foreach ($event->harga as $harga)
                                                <p>{{ $harga->nama_harga }} : {{ $harga->harga }}</p>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($event->harga as $harga)
                                                <p>{{ $harga->jumlah_tiket }}</p>
                                            @endforeach
                                        </td>
                                        
                                        <td><img src="{{ asset('uploads/events').'/'. $event->thumbnail }}" alt="{{ $event->nama_event }}" height="150"></td>
                                        <td>{{ $event->status }}</td>
                                        <td><a href="{{ route('admin-tambah-order', ['id' => $event->id]) }}" class="btn btn-success mr-3">Order</a><a href=""
                                                class="btn btn-info mr-3">Edit</a> <a href=""
                                                class="btn btn-primary">Hapus</a></td>
                                    </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('addJs')
    {{-- Masukkan dibawah ini jika ingin menambahkan JS --}}
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
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
@endsection
