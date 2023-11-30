@extends('admin.layout.master')
@section('addCss')
{{-- Masukkan dibawah ini jika ingin nambahkan css --}}
@endsection
@section('title')
List Event
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
                <div><a href="{{route('admin-tambah-keuangan')}}" class="btn btn-primary">Tambah Keuangan</a></div>
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
                            <tr>
                                <td>01</td>
                                <td>12-12-2023</td>
                                <td>Beli Mie</td>
                                <td>Uang Keluar</td>
                                <td>3500</td>
                                <td>$-</td>
                                <td>03</td>
                                <td>1234</td>

                            </tr>

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
                                <th>Orgaizer_Id</th>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#datatable').DataTable();
    });

</script>
@endsection
