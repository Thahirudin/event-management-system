@extends('admin.layout.master')
@section('addCss')
    {{-- Masukkan dibawah ini jika ingin nambahkan css --}}
@endsection
@section('title')
    List Organizer
@endsection
@section('list-organizer')
    active active-menu
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Organizer</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Tanggal lahir</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John Doe</td>
                                    <td>1990-05-15</td>
                                    <td>john.doe@example.com</td>
                                    <td>secret123</td>
                                </tr>
                                <tr>
                                    <td>Jane Smith</td>
                                    <td>1985-08-22</td>
                                    <td>jane.smith@example.com</td>
                                    <td>password123</td>
                                </tr>
                                <tr>
                                    <td>Michael Johnson</td>
                                    <td>1982-12-10</td>
                                    <td>michael.j@example.com</td>
                                    <td>mypass123</td>
                                </tr>
                                <tr>
                                    <td>Emily Davis</td>
                                    <td>1995-03-28</td>
                                    <td>emily.d@example.com</td>
                                    <td>12345678</td>
                                </tr>
                                <tr>
                                    <td>William Brown</td>
                                    <td>1988-07-05</td>
                                    <td>william.b@example.com</td>
                                    <td>pass1234</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('addJs')
    {{-- Masukkan dibawah ini jika ingin menambahkan JS --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
@endsection
