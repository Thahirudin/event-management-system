@extends('admin.layout.master')
@section('addCss')
{{-- Masukkan dibawah ini jika ingin nambahkan css --}}
@endsection
@section('title')
List Pengeluaran
@endsection
@section('list-pengeluaran')
active active-menu
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">List Pengeluaran</h4>
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($keuangans as $keuangan)
                            <tr>
                                
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $keuangan->tanggal }}</td>
                                    <td>{{ $keuangan->catatan }}</td>
                                    <td>{{ $keuangan->jenis }}</td>
                                    <td class="text-right">{{ number_format($keuangan->total , 0, ',', '.')}}</td>
                                    <td>{{ $keuangan->bukti }}</td>
                                    <td>{{ $keuangan->event->nama_event  }}</td>
                                    <td>{{ $keuangan->user->nama }}</td>
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
    $(document).ready(function () {
        $('#datatable').DataTable();
    });

</script>
@endsection
