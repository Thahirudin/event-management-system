@extends('admin.layout.master')
@section('addCss')
    {{-- Masukkan dibawah ini jika ingin nambahkan css --}}
@endsection
@section('title')
    List Event
@endsection
@section('list-order')
    active active-menu
@endsection
@section('content')
<div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Order</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id Order</th>
                                    <th>Id Member</th>
                                    <th>Id Event</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>001</td>
                                    <td>141002</td>
                                    <td>VM2023NVM</td>
                                </tr>
                                <tr>
                                    <td>002</td>
                                    <td>141002</td>
                                    <td>VM2023NVM</td>
                                </tr>
                                <tr>
                                    <td>003</td>
                                    <td>141002</td>
                                    <td>VM2023NVM</td>
                                </tr>
                                <tr>
                                    <td>004</td>
                                    <td>141002</td>
                                    <td>VM2023NVM</td>
                                </tr>
                                <tr>
                                    <td>005</td>
                                    <td>141002</td>
                                    <td>VM2023NVM</td>
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
