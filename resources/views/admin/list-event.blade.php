@extends('admin.layout.master')
@section('addCss')
    {{-- Masukkan dibawah ini jika ingin nambahkan css --}}
    <style>
        .toggle-section {
            display: none;
        }

        .active {
            display: block !important;
        }

        /* Menghilangkan seluruh ikon pada tombol dropdown */
        .btn.dropdown-toggle::after {
            content: none;
        }
    </style>
@endsection
@section('title')
    List Event
@endsection
@section('list-event')
    active active-menu
@endsection
@section('content')
    <div class="iq-card p-3">
        <div class="d-md-flex align-items-center justify-content-between  ">
            <div class="text-center text-md-left ">
                <h4 class="card-title">List Event</h4>
            </div>
            <div class="d-flex justify-content-center ">
                <div class="mr-3">
                    <button type="button" class="btn btn-outline-primary rounded-pill mb-3 toggle-button active"
                        data-section="list">
                        <i class="la la-list"> List</i>
                    </button>
                </div>
                <div class="mr-3">
                    <button type="button" class="btn btn-outline-primary rounded-pill mb-3 toggle-button"
                        data-section="grid">
                        <i class="la la-border-all"> Grid</i>
                    </button>
                </div>
                <div><a href="{{ route('admin-store-event') }}" class="btn btn-info">Tambah Event</a></div>
            </div>
        </div>
    </div>
    <div class="card toggle-section" id="list">
        <div class="card-body ">
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
                                        <div><span> {{ $harga->nama_harga . ':' . $harga->jumlah_tiket }}</span>
                                        </div>
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
                                            <a href="{{ route('admin-edit-event', ['id' => $event->id]) }}"
                                                class="dropdown-item">Edit</a>
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
    <div class="card-body toggle-section" id="grid">
        <div class="row row-cols-1 row-cols-md-2">
            @foreach ($events as $event)
                <div class="col mb-4">
                    <div class="card h-100 event">
                        <div class="event-img card-img-top "
                            style="
                                background: url('{{ asset('uploads/events') . '/' . $event->thumbnail }}');
                                background-size: cover;
                                background-position: center;
                                height: 400px;
                            ">
                            <div class="mt-1"><span
                                    class="overlay-text @if ($event->status == 'Akan Datang') bg-success @endif @if ($event->status == 'Selesai') bg-secondary @endif @if ($event->status == 'Batal') bg-primary @endif p-2">{{ $event->status }}</span>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="row mb-md-2">
                                <div class="col-md-8 ">
                                    <div class="mb-2">
                                        <span class="card-title h5" style="color: #FFCCCC">{{ $event->nama_event }}</span>
                                    </div>
                                    <div class="mb-2">
                                        <span>{{ $event->waktu }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4 text-md-right ">
                                    <span>{{ $event->kategori->nama }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 mb-2 mb-md-0">
                                    <div class="d-flex align-items-center">
                                        <div class="mr-3 "> <i class="ri-map-pin-line h3"></i></div>
                                        <div><span>{{ $event->lokasi }}</span></div>
                                    </div>
                                </div>
                                <div class="col-md-4 text-md-right">
                                    <div class="dropdown dropup">
                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="ion-gear-b"></i>
                                            Aksi
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a href="{{ route('admin-tambah-order', ['id' => $event->id]) }}"
                                                class="dropdown-item">Beli</a>
                                            <a href="{{ route('admin-edit-event', ['id' => $event->id]) }}"
                                                class="dropdown-item">Edit</a>
                                            <a href="{{ route('admin-list-order-event', ['id' => $event->id]) }}"
                                                class="dropdown-item">Lihat Order</a>
                                            <a href="{{ route('admin-list-keuangan-event', ['id' => $event->id]) }}"
                                                class="dropdown-item">Lihat Keuangan</a>
                                            <a onclick="confirmDelete(this)"
                                                data-url="{{ route('admin-hapus-event', ['id' => $event->id]) }}"
                                                class="dropdown-item">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            @endforeach
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
            $("#list").addClass("active");

            $(".toggle-button").on("click", function() {
                var sectionId = $(this).data("section");

                // Sembunyikan semua bagian yang dapat diubah
                $(".toggle-section").removeClass("active").hide();

                // Tampilkan bagian yang dipilih
                $("#" + sectionId).addClass("active").show();

                // Tambahkan kelas aktif pada tombol yang diklik dan hapus dari tombol lainnya
                $(".toggle-button").removeClass("active");
                $(this).addClass("active");
            });
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
