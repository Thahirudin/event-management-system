@extends('admin.layout.master')
@section('addCss')
    {{-- Masukkan dibawah ini jika ingin menambahkan CSS --}}
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
    Order
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
                                <option value="sukses">Sukses</option>
                            </select>
                        </div>
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Member</th>
                                    <th>Nama Event</th>
                                    <th>Bukti</th>
                                    <th>Harga</th>
                                    <th>Detail</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $order->member->nama }}</td>
                                        <td>{{ $order->event->nama_event }}</td>
                                        <td><a class="btn btn-primary popup-img"
                                                onclick="openPopup('{{ asset('uploads/orders') . '/' . $order->bukti }}')"><i
                                                    class="fa fa-file"></i></a>
                                        </td>
                                        <td class="text-right">{{ number_format($order->harga_tiket, 0, ',', '.') }}</td>
                                        <td>{{ $order->detail }}</td>
                                        <td>
                                            @if ($order->status == 'periksa')
                                                <div class="bg-warning rounded-pill text-center">{{ $order->status }}</div>
                                            @endif
                                            @if ($order->status == 'ditolak')
                                                <div class="bg-primary rounded-pill text-center">{{ $order->status }}</div>
                                            @endif
                                            @if ($order->status == 'sukses')
                                                <div class="bg-success rounded-pill text-center">{{ $order->status }}</div>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-end ">
                                                <div {{ $order->status != 'periksa' ? 'hidden' : '' }}>
                                                    <form action="{{ route('admin-terima-order', ['id' => $order->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <button class="btn btn-success mr-3">Terima</button>
                                                    </form>
                                                </div>
                                                <div {{ $order->status != 'periksa' ? 'hidden' : '' }}>
                                                    <button type="button" class="btn btn-warning mr-3 text-white"
                                                        data-toggle="modal" data-target="#exampleModal"
                                                        data-id="{{ $order->id }}">
                                                        Tolak
                                                    </button>

                                                </div>
                                                @if ($order->status == 'sukses')
                                                    <div class="mr-3">
                                                        <a href="{{ route('admin-tiket', ['id' => $order->id]) }}"
                                                            class="btn btn-info">Lihat Tiket</a>
                                                    </div>
                                                @endif
                                                <div>
                                                    <a onclick="confirmDelete(this)"
                                                        data-url="{{ route('admin-hapus-order', ['id' => $order->id]) }}"
                                                        class="btn btn-primary">Hapus</a>
                                                </div>
                                            </div>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alasan Ditolak</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="rejectForm" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="detail">Alasan Ditolak</label>
                            <textarea name="detail" class="form-control" id="detail" cols="30" rows="10"></textarea>
                        </div>
                        <input type="hidden" name="order_id" id="order-id-input" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary mr-3">Tolak</button>
                    </div>
                </form>
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
            var dataTable = $('#datatable').DataTable();
            $('#mySelect').on('change', function() {
                var selectedValue = $(this).val();
                dataTable.column(6).search(selectedValue)
                    .draw(); // Ganti 1 dengan indeks kolom yang ingin difilter
            });
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
    {{-- Form Modal --}}
    <script>
        $(document).ready(function() {
            $('.btn-warning').on('click', function() {
                var orderId = $(this).data('id');

                // Set data-id value to the form action
                var formAction = "{{ route('admin-tolak-order', ['id' => ':order_id']) }}";
                formAction = formAction.replace(':order_id', orderId);
                $('#rejectForm').attr('action', formAction);

                // Set data-id value to the hidden input
                $('#order-id-input').val(orderId);

                // Show the modal
                $('#exampleModal').modal('show');
            });

            // Handle modal close event
            $('#exampleModal').on('hidden.bs.modal', function() {
                // Reset form action and hidden input value
                $('#rejectForm').attr('action', '');
                $('#order-id-input').val('');
                // Optionally reset textarea value
                $('#detail').val('');
            });
        });
    </script>
@endsection
