@extends('admin.layout.master')
@section('addCss')
    {{-- Masukkan dibawah ini jika ingin nambahkan css --}}
@endsection
@section('title')
    List Event
@endsection
@section('list-kategori')
    active active-menu
@endsection
@section('content')
<div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Kategori</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Event</th>
                                    <th>URL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>WEST MUSIC FESTIVAL</td>
                                    <td>....</td>
                                </tr>
                                <tr>
                                    <td>MOTO BIKE SHOW</td>
                                    <td>....</td>
                                </tr>
                                <tr>
                                    <td>ASIAN GAME 2018</td>
                                    <td>....</td>
                                </tr>
                                <tr>
                                    <td>IT FESTIVAL 2021</td>
                                    <td>....</td>
                                </tr>
                                <tr>
                                    <td>SMCU PALACE JAKARTA</td>
                                    <td>....</td>
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
