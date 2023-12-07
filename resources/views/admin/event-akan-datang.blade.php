@extends('admin.layout.master')
@section('addCss')
    {{-- Masukkan dibawah ini jika ingin nambahkan css --}}
@endsection
@section('title')
    List Event Akan Datang
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
                        <h4 class="card-title">List Event Akan Datang</h4>
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
                                    <th>Tiket Tersedia</th>
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
                                        <td>
                                            @foreach ($event->harga as $harga)
                                               <div><span> {{ $harga->nama_harga . ':' . $harga->jumlah_tiket }}</span></div>
                                            @endforeach
                                        </td>

                                        <td><img src="{{ asset('uploads/events') . '/' . $event->thumbnail }}"
                                                alt="{{ $event->nama_event }}" height="150"></td>
                                        <td>{{ $event->status }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-primary dropdown-toggle" href="#" role="button"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    Aksi
                                                </a>

                                                <div class="dropdown-menu">
                                                    <a href="{{ route('admin-tambah-order', ['id' => $event->id]) }}"
                                                        class="dropdown-item">Beli</a>
                                                    <a href="{{ route('admin-edit-event', ['id' => $event->id] ) }}" class="dropdown-item">Edit</a>
                                                    <a href="{{ route('admin-list-order-event', ['id' => $event->id]) }}"
                                                        class="dropdown-item">Lihat Order</a>
                                                        <a href="{{ route('admin-list-keuangan-event', ['id' => $event->id]) }}"
                                                        class="dropdown-item">Lihat Keuangan</a>
                                                    <a onclick="confirmDelete(this)"
                                            data-url="{{ route('admin-hapus-event', ['id' => $event->id]) }}"
                                                class="dropdown-item">Hapus</a>
                                                </div>
                                            </div>
                                        </td>
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
        confirmDelete = function(button) {
            var url = $(button).data('url');
            Swal.fire({
                title: 'Anda yakin?',
                text: 'Data ini akan dihapus!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = url;
                }
            })
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
