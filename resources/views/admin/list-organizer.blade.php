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

        .organizer img {
            object-fit: cover;
            height: 200px;
            width: 200px;
        }

        /* Menghilangkan seluruh ikon pada tombol dropdown */
        .btn.dropdown-toggle::after {
            content: none;
        }
    </style>
@endsection
@section('title')
    List Organizer
@endsection
@section('list-organizer')
    active active-menu
@endsection
@section('content')
    <div class="iq-card p-3">
        <div class="d-md-flex align-items-center justify-content-between  ">
            <div class="text-center text-md-left ">
                <h4 class="card-title">List Organizer</h4>
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
                <div><a href="{{ route('admin-tambah-organizer') }}" class="btn btn-info">Tambah Organizer</a></div>
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
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Tanggal Lahir</th>
                            <th>Email</th>
                            <th>Kasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($organizers as $organizer)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $organizer->nama }}</td>
                                <td>{{ $organizer->jabatan }}</td>
                                <td>{{ $organizer->tanggal_lahir }}</td>
                                <td>{{ $organizer->email }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-primary dropdown-toggle" href="#" role="button"
                                            data-toggle="dropdown" aria-expanded="false">
                                            Aksi
                                        </a>

                                        <div class="dropdown-menu">
                                            <a href="{{ route('admin-edit-organizer', ['id' => $organizer->id]) }}"
                                                class="dropdown-item">Edit</a>
                                            <a onclick="confirmDelete(this)"
                                                data-url="{{ route('admin-hapus-organizer', ['id' => $organizer->id]) }}"
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
        <div class="row row-cols-1 row-cols-md-3">
            @foreach ($organizers as $organizer)
                <div class="col mb-4">
                    <div class="card h-100 organizer">
                        <div class="text-center mt-3">
                            <img src="{{ asset('uploads/organizers') . '/' . $organizer->profil }}" class="rounded-circle "
                                alt="{{ $organizer->profil }}">
                        </div>
                        <div class="card-body">
                            <div class="text-center"><span class="h3"
                                    style="color: #FFCCCC">{{ $organizer->nama }}</span></div>
                            <div class="text-center mb-3"><span class="">{{ $organizer->email }}</span></div>
                            <div class="text-center">
                                <a href="{{ route('admin-edit-organizer', ['id' => $organizer->id]) }}"
                                    class="btn btn-info mr-3 ">Edit</a>
                                <a onclick="confirmDelete(this)"
                                    data-url="{{ route('admin-hapus-organizer', ['id' => $organizer->id]) }}"
                                    class="btn btn-primary ">Hapus</a>
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
