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
                                    <th>Nama Event</th>
                                    <th>Tanggal</th>
                                    <th>Detail</th>
                                    <th>Harga</th>
                                    <th>Kontak</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>JOYLAND JAKARTA 2023</td>
                                    <td>24 Nov - 26 Nov 2023</td>
                                    <td> Music and arts festival</td>
                                    <td>Rp 488.000</td>
                                    <td>0329373746</td>
                                </tr>
                                <tr>
                                    <td>JOYLAND JAKARTA 2023</td>
                                    <td>24 Nov - 26 Nov 2023</td>
                                    <td>Music and arts festival</td>
                                    <td>6Rp 488.000</td>
                                    <td>0329373746</td>
                                </tr>
                                <tr>
                                    <td>JOYLAND JAKARTA 2023</td>
                                    <td>24 Nov - 26 Nov 2023</td>
                                    <td>Music and arts festival</td>
                                    <td>Rp 488.000</td>
                                    <td>0329373746</td>
                                </tr>
                                <tr>
                                    <td>JOYLAND JAKARTA 2023</td>
                                    <td>24 Nov - 26 Nov 2023</td>
                                    <td>Music and arts festival</td>
                                    <td>Rp 488.000</td>
                                    <td>0329373746</td>
                                </tr>
                                <tr>
                                    <td>JOYLAND JAKARTA 2023</td>
                                    <td>24 Nov - 26 Nov 2023</td>
                                    <td>Music and arts festival</td>
                                    <td>Rp 488.000</td>
                                    <td>0329373746</td>
                                </tr>

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
@endsection
