@extends('organizer.layout.master')
@section('addCss')
    {{-- Masukkan dibawah ini jika ingin menambahkan CSS --}}
@endsection

@section('title')
    detail event
@endsection

@section('detail event')
    active active-menu
@endsection

@section('content')
    <div class="iq-card p-3">
        <div class="d-md-flex align-items-center justify-content-between  ">
            <div class="text-center text-md-left ">
                <h4 class="card-title">Detail Event</h4>
            </div>
        </div>
    </div>
    <div class="card-body toggle-section">
        <div class="row row-cols-1 row-cols-md-2">
            @foreach ($events as $event)
                <div class="col mb-4">
                    <div class="card h-100 event">
                        <div class="event-img card-img-top "
                            style="
                                background: url('{{ asset('uploads/events') . '/' . $event->thumbnail }}');
                                background-size: cover;
                                background-position: center;
                                height: 400px;
                            ">
                            <div class="mt-1"><span
                                    class="overlay-text @if ($event->status == 'Akan Datang') bg-success @endif @if ($event->status == 'Selesai') bg-secondary @endif @if ($event->status == 'Batal') bg-primary @endif p-2">{{ $event->status }}</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-md-2">
                                <div class="col-md-8 ">
                                    <div class="mb-2">
                                        <span class="card-title h5" style="color: #FFCCCC">{{ $event->nama_event }}</span>
                                    </div>
                                    <div class="mb-2">
                                        <span>{{ $event->waktu }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4 text-md-right ">
                                    <span>{{ $event->kategori->nama }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 mb-2 mb-md-0">
                                    <div class="d-flex align-items-center">
                                        <div class="mr-3 "> <i class="ri-map-pin-line h3"></i></div>
                                        <div><span>{{ $event->lokasi }}</span></div>
                                    </div>
                                </div>
                                <div class="col-md-4 text-md-right">
                                    <div class="dropdown dropup">
                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="ion-gear-b"></i>
                                            Aksi
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a href="{{ route('organizer-edit-event', ['id' => $event->id]) }}"
                                                class="dropdown-item">Edit</a>
                                            <a href="{{ route('organizer-list-order-event', ['id' => $event->id]) }}"
                                                class="dropdown-item">Lihat Order</a>
                                            <a href="{{ route('admin-list-keuangan-event', ['id' => $event->id]) }}"
                                                class="dropdown-item">Lihat Keuangan</a>
                                            <a onclick="confirmDelete(this)"
                                                data-url="{{ route('organizer-hapus-event', ['id' => $event->id]) }}"
                                                class="dropdown-item">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('addJs')
@endsection
