@extends('organizer.layout.master')
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
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Profil</th>
                                    <th>Tanggal lahir</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($organizers as $organizer)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $organizer->nama }}</td>
                                    <td>{{ $organizer->jabatan }}</td>
                                    <td>{{ $organizer->profil }}</td>
                                    <td>{{ $organizer->tanggal_lahir }}</td>
                                    <td>{{ $organizer->email }}</td>
                                    <td>{{ $organizer->password }}</td>
                                </tr>
                            @endforeach
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
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
@endsection
