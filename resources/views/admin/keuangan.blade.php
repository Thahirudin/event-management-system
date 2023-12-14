@extends('admin.layout.master')
@section('addCss')
    {{-- Masukkan dibawah ini jika ingin nambahkan css --}}
@endsection
@section('title')
    List Keuangan
@endsection
@section('list-keuangan')
    active active-menu
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Keuangan</h4>
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
                                    <th>Orgaizer_Id</th>
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
                                        <td>{{ $keuangan->bukti }}</td>
                                        <td>{{ $keuangan->event->nama_event }}</td>
                                        <td>{{ $keuangan->user->nama }}</td>
                                        <td><div class="d-flex align-items-center ">
                                        <div class="mr-3">
                                                        <a href="{{ route('admin-update-keuangan', ['id' => $keuangan->id]) }}"
                                                            class="btn btn-info">Edit</a>
                                                    </div>
                                                    <div class="mr-3">
                                                        <a href="{{ route('admin-hapus-keuangan', ['id' => $keuangan->id]) }}"
                                                            class="btn btn-primary">Hapus</a>
                                                    </div>
                                        </div></td>
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
@endsection
@section('addJs')
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
