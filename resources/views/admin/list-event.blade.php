@extends('admin.layout.master')
@section('addCss')
    {{-- Masukkan dibawah ini jika ingin nambahkan css --}}
@endsection
@section('title')
    List Event
@endsection
@section('event')
    active active-menu
@endsection
@section('list event')
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
                                    <th>harga</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $loop->index +1 }}</td>
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
                                        <td>{{ $event->status }}</td>
                                        <td><a href="" class="btn btn-info mr-3">Edit</a> <a href=""
                                                class="btn btn-primary">Hapus</a></td>
                                    </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
@section('addJs')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
