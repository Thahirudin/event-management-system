@extends('organizer.layout.master')
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
    List Keuangan {{ $event->nama_event }}
@endsection
@section('list-keuangan')
    active active-menu
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header">
                    <div class="iq-header-title mb-3">
                        <h4 class="card-title">List Keuangan {{ $event->nama_event }}</h4>
                    </div>
                    <div>
                        <a href="{{ route('organizer-tambah-keuangan', ['id' => $event->id]) }}" class="btn btn-primary">Tambah Keuangan</a>
                    </div>
                    <div>
                        <label for="kategori">Pilih Kategori:</label>
                    <div class="form-group">
                        
                        <select class="form-control" id="kategori" onchange="filterData()">
                            <option value="semua">Semua</option>
                            <option value="pemasukan">Pemasukan</option>
                            <option value="pengeluaran">Pengeluaran</option>
                        </select>
                    </div>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tanggal</th>
                                    <th>Catatan</th>
                                    <th>Jenis</th>
                                    <th>Total</th>
                                    <th>Bukti</th>
                                    <th>Event_Id</th>
                                    <th>Organizer_Id</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keuangans as $keuangan)
                                    <tr>

                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $keuangan->tanggal }}</td>
                                        <td>{{ $keuangan->catatan }}</td>
                                        <td>{{ $keuangan->jenis }}</td>
                                        <td class="text-right">{{ number_format($keuangan->total, 0, ',', '.') }}</td>
                                        <td><a class="btn btn-primary popup-img"
                                                onclick="openPopup('{{ asset('uploads/keuangans') . '/' . $keuangan->bukti }}')"><i
                                                    class="fa fa-file"></i></a>
                                        </td>
                                        <td>{{ $keuangan->event->nama_event }}</td>
                                        <td>{{ $keuangan->user->nama }}</td>
                                        <td>
                                            <div class="d-flex align-items-center ">
                                                <div class="mr-3">
                                                    <a href="{{ route('admin-update-keuangan', ['id' => $keuangan->id]) }}"
                                                        class="btn btn-info">Edit</a>
                                                </div>
                                                <div class="mr-3">
                                                    <a onclick="confirmDelete(this)"
                                                        data-url="{{ route('admin-hapus-keuangan', ['id' => $keuangan->id]) }}"
                                                        class="btn btn-primary">Hapus</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Tanggal</th>
                                    <th>Catatan</th>
                                    <th>Jenis</th>
                                    <th>Total</th>
                                    <th>Bukti</th>
                                    <th>Event_Id</th>
                                    <th>Organizer_Id</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="popup-container" class="popup-container" onclick="closePopup()">
        <img src="" alt="Popup Image" id="popup-img">
    </div>
@endsection
@section('addJs')
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script>
        function openPopup(imageSrc) {
            document.getElementById('popup-img').src = imageSrc;
            document.getElementById('popup-container').style.display = 'flex';
        }

        function closePopup() {
            document.getElementById('popup-container').style.display = 'none';
        }
    </script>
    <script>
        $(document).ready(function() {
            var tabel = $('#datatable').DataTable();

            // Fungsi untuk menerapkan filter berdasarkan kategori pada kolom 2
            window.filterData = function() {
                var selectedKategori = $('#kategori').val();

                // Hapus filter sebelumnya pada kolom 2
                tabel.column(3).search('').draw();

                // Terapkan filter berdasarkan kategori yang dipilih pada kolom 2
                if (selectedKategori !== 'semua') {
                    tabel.column(3).search(selectedKategori).draw();
                }
            };
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
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
