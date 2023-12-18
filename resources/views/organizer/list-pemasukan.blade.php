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
    List Pemasukan Keuangan
@endsection
@section('list-pemasukan')
    active active-menu
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">List Pemasukan Keuangan</h4>
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
                                                onclick="openPopup('{{asset('uploads/keuangans').'/'. $keuangan->bukti }}')"><i class="fa fa-file"></i></a>
                                        </td>
                                        <td>{{ $keuangan->event->nama_event }}</td>
                                        <td>{{ $keuangan->user->nama }}</td>
                                        <td>
                                            <div class="d-flex align-items-center ">
                                                <div class="mr-3">
                                                    <a href="{{ route('organizer-update-keuangan', ['id' => $keuangan->id]) }}"
                                                        class="btn btn-info">Edit</a>
                                                </div>
                                                <div class="mr-3">
                                                    <a onclick="confirmDelete(this)"
                                                        data-url="{{ route('organizer-hapus-keuangan', ['id' => $keuangan->id]) }}"
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
            $('#datatable').DataTable();
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
