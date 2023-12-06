@extends('admin.layout.master')
@section('addCss')
    {{-- Masukkan dibawah ini jika ingin menambahkan CSS --}}
@endsection

@section('title')
    List Order
@endsection

@section('order')
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
                        <div class="form-group">
                            <label for="mySelect">Status</label>
                            <select class="form-control" id="mySelect" name="status">
                                <option value="">Semua</option>
                                <option value="periksa">Periksa</option>
                                <option value="ditolak">Ditolak</option>
                                <option value="diterima">Diterima</option>
                            </select>
                        </div>
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Id Member</th>
                                    <th>Id Event</th>
                                    <th>Status</th>
                                    <th>Bukti</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $order->id_member }}</td>
                                        <td>{{ $order->id_event }}</td>
                                        <td>
                                            @if ($order->status == 'periksa')
                                                <div class="bg-warning rounded-pill text-center">{{ $order->status }}</div>
                                            @endif
                                        </td>
                                        <td><a href="{{ asset('uploads/orders') . '/' . $order->bukti }}">Klik Disini</a>
                                        </td>
                                        <td class="text-right">{{ number_format($order->harga->harga, 0, ',', '.') }}</td>
                                        <td>

                                            <a href="" class="btn btn-success mr-3 "
                                                {{ $order->status != 'periksa' ? 'hidden' : '' }}>Terima</a>
                                            <a href="{{ route('admin-edit-order', ['id' => $order->id]) }}"
                                                class="btn btn-info mr-3"
                                                {{ $order->status != 'periksa' ? 'hidden' : '' }}>Tolak</a>
                                            <a href="" class="btn btn-primary">Hapus</a>
                                        </td>
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
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            var dataTable = $('#datatable').DataTable();
            $('#mySelect').on('change', function() {
                var selectedValue = $(this).val();
                dataTable.column(3).search(selectedValue)
                    .draw(); // Ganti 1 dengan indeks kolom yang ingin difilter
            });
        });
    </script>
@endsection
