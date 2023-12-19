@extends('organizer.layout.master')
@section('addCss')
    {{-- Masukkan dibawah ini jika ingin nambahkan css --}}
@endsection
@section('title')
    Organizer - Dashboard
@endsection
@section('dashboard')
    active active-menu
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-sm-6 col-lg-6 col-xl-4">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="iq-cart-text text-uppercase">
                                    <p class="mb-0">
                                        Event
                                    </p>
                                </div>
                                <div class="icon iq-icon-box-top rounded-circle bg-primary">
                                    <i class="ri-calendar-event-fill"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <h4 class=" mb-0">
                                    @if ($totalEventHariIni > 0)
                                        +
                                    @else
                                        -
                                    @endif{{ $totalEventHariIni }}
                                </h4>
                                </h4>
                                <p class="mb-0 text-primary"><span><i
                                            class="fa  {{ $persenEvent >= 0 ? 'fa-caret-up' : 'fa-caret-down' }} mr-2"></i></span>{{ $persenEvent }}%
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 col-xl-4">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="iq-cart-text text-uppercase">
                                    <p class="mb-0 font-size-14">
                                        Organizer
                                    </p>
                                </div>
                                <div class="icon iq-icon-box-top rounded-circle bg-warning">
                                    <i class="lar la-star"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <h4 class=" mb-0">
                                    @if ($totalOrganizerHariIni > 0)
                                        +
                                    @else
                                        -
                                    @endif{{ $totalOrganizerHariIni }}
                                </h4>
                                <p class="mb-0 text-warning"><span><i
                                            class="fa {{ $persenOrganizer >= 0 ? 'fa-caret-up' : 'fa-caret-down' }} mr-2"></i></span>{{ $persenOrganizer }}%
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 col-xl-4">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="iq-cart-text text-uppercase">
                                    <p class="mb-0 font-size-14">
                                        Member
                                    </p>
                                </div>
                                <div class="icon iq-icon-box-top rounded-circle bg-success">
                                    <i class="lar la-user"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <h4 class=" mb-0">
                                    @if ($totalMemberHariIni >= 0)
                                        +
                                    @else
                                        -
                                    @endif{{ $totalMemberHariIni }}
                                </h4>
                                <p class="mb-0 text-success"><span><i
                                            class="fa {{ $persenMember >= 0 ? 'fa-caret-up' : 'fa-caret-down' }} mr-2"></i></span>{{ $persenMember }}%
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between align-items-center">
                    <div class="iq-header-title">
                        <h4 class="card-title">Top Event </h4>
                    </div>
                    <div id="top-rated-item-slick-arrow" class="slick-aerrow-block "></div>
                </div>
                <div class="iq-card-body">
                    <ul class="list-unstyled row top-rated-item mb-0">
                        @foreach ($topEvents as $topEvent)
                            <li class="col-sm-6 col-lg-4 col-xl-3 iq-rated-box">
                                <div class="card h-100 mb-0">
                                    <div class="iq-card-body p-0">
                                        <div class="iq-thumb">
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset('uploads/events') . '/' . $topEvent->thumbnail }}"
                                                    class="img-fluid w-100 img-border-radius" alt=""
                                                    style="object-fit: cover; height: 95px">
                                            </a>
                                        </div>
                                        <div class="iq-feature-list">
                                            <h6 class="font-weight-600 mb-0">{{ $topEvent->nama_event }}</h6>
                                            <p class="mb-0 mt-2">{{ $topEvent->kategori->nama }}</p>
                                            <div class="d-flex align-items-center my-2 iq-ltr-direction">
                                                <p class="mb-0 mr-2"><i
                                                        class="lar la-eye mr-1"></i>{{ $topEvent->orders_count }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="iq-card iq-card iq-card-block iq-card-stretch iq-card-height">
                <div class="iq-card-header">
                    <div class="iq-header-title">
                        <h4 class="card-title text-center">Event</h4>
                    </div>
                </div>
                <div class="iq-card-body pb-0">
                    <div id="view-chart-01">
                    </div>
                    <div class="row mt-1">
                        <div class="col-sm-6 col-md-3 col-lg-6 iq-user-list">
                            <div class="iq-card">
                                <div class="iq-card-body">
                                    <div class="media align-items-center">
                                        <div class="iq-user-box bg-primary"></div>
                                        <div class="media-body text-white">
                                            <p class="mb-0 font-size-14 line-height">Event <br>
                                                Akan Datang
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 col-lg-6 iq-user-list">
                            <div class="iq-card">
                                <div class="iq-card-body">
                                    <div class="media align-items-center">
                                        <div class="iq-user-box bg-warning"></div>
                                        <div class="media-body text-white">
                                            <p class="mb-0 font-size-14 line-height">Event <br>
                                                Selesai
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12  col-lg-4">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                <div class="iq-card-header d-flex align-items-center justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Kategori</h4>
                    </div>
                </div>
                <div class="iq-card-body p-0">
                    <div id="view-chart-03"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                <div class="iq-card-header d-flex align-items-center justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Top Category</h4>
                    </div>
                    <div class="iq-card-header-toolbar d-flex align-items-center seasons">
                        <div class="iq-custom-select d-inline-block sea-epi s-margin">
                            <select name="cars" class="form-control season-select">
                                <option value="season1">Today</option>
                                <option value="season2">This Week</option>
                                <option value="season2">This Month</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="iq-card-body row align-items-center">
                    <div class="col-lg-7">
                        <div class="row list-unstyled mb-0 pb-0">
                            <div class="col-sm-6 col-md-4 col-lg-6 mb-3">
                                <div class="iq-progress-bar progress-bar-vertical iq-bg-primary">
                                    <span class="bg-primary" data-percent="100"
                                        style="transition: height 2s ease 0s; width: 100%; height: 40%;"></span>
                                </div>
                                <div class="media align-items-center">
                                    <div class="iq-icon-box-view rounded mr-3 iq-bg-primary"><i
                                            class="las la-film font-size-32"></i></div>
                                    <div class="media-body text-white">
                                        <h6 class="mb-0 font-size-14 line-height">Actions</h6>
                                        <small class="text-primary mb-0">+34%</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-6 mb-3">
                                <div class="iq-progress-bar progress-bar-vertical iq-bg-secondary">
                                    <span class="bg-secondary" data-percent="100"
                                        style="transition: height 2s ease 0s; width: 100%; height: 70%;"></span>
                                </div>
                                <div class="media align-items-center">
                                    <div class="iq-icon-box-view rounded mr-3 iq-bg-secondary"><i
                                            class="las la-laugh-squint font-size-32"></i></div>
                                    <div class="media-body text-white">
                                        <p class="mb-0 font-size-14 line-height">Comedy</p>
                                        <small class="text-secondary mb-0">+44%</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-6 mb-3">
                                <div class="iq-progress-bar progress-bar-vertical iq-bg-info">
                                    <span class="bg-info" data-percent="100"
                                        style="transition: height 2s ease 0s; width: 100%; height: 40%;"></span>
                                </div>
                                <div class="media align-items-center">
                                    <div class="iq-icon-box-view rounded mr-3 iq-bg-info"><i
                                            class="las la-skull-crossbones font-size-32"></i></div>
                                    <div class="media-body text-white">
                                        <p class="mb-0 font-size-14 line-height">Horror</p>
                                        <small class="text-info mb-0">+56%</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-6 mb-3">
                                <div class="iq-progress-bar progress-bar-vertical iq-bg-warning">
                                    <span class="bg-warning" data-percent="100"
                                        style="transition: height 2s ease 0s; width: 40%; height: 40%;"></span>
                                </div>
                                <div class="media align-items-center">
                                    <div class="iq-icon-box-view rounded mr-3 iq-bg-warning"><i
                                            class="las la-theater-masks font-size-32"></i></div>
                                    <div class="media-body text-white">
                                        <p class="mb-0 font-size-14 line-height">Drama</p>
                                        <small class="text-warning mb-0">+65%</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-6 mb-lg-0 mb-3">
                                <div class="iq-progress-bar progress-bar-vertical iq-bg-success">
                                    <span class="bg-success" data-percent="100"
                                        style="transition: height 2s ease 0s; width: 60%; height: 60%;"></span>
                                </div>
                                <div class="media align-items-center mb-lg-0 mb-3">
                                    <div class="iq-icon-box-view rounded mr-3 iq-bg-success"><i
                                            class="las la-child font-size-32"></i></div>
                                    <div class="media-body text-white">
                                        <p class="mb-0 font-size-14 line-height">Kids</p>
                                        <small class="text-success mb-0">+74%</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-6  mb-lg-0 mb-3">
                                <div class="iq-progress-bar progress-bar-vertical iq-bg-danger">
                                    <span class="bg-danger" data-percent="100"
                                        style="transition: height 2s ease 0s; width: 80%; height: 80%;"></span>
                                </div>
                                <div class="media align-items-center">
                                    <div class="iq-icon-box-view rounded mr-3 iq-bg-danger"><i
                                            class="las la-grin-beam font-size-32"></i></div>
                                    <div class="media-body text-white">
                                        <p class="mb-0 font-size-14 line-height">Thrilled</p>
                                        <small class="text-danger mb-0">+40%</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div id="view-chart-02" class="view-cahrt-02"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Table List Event</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="table-responsive">
                        <table class="data-tables table movie_table" style="width:100%">
                            <thead>
                                <tr class="te">
                                    <th>No</th>
                                    <th>Organizer</th>
                                    <th>Kategori</th>
                                    <th>Nama Event</th>
                                    <th>Waktu</th>
                                    <th>Tiket Tersedia</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td>
                                            <div class="text-left">{{ $loop->index + 1 }}</div>
                                        </td>
                                        <td>
                                            <div class="text-left">{{ $event->user->nama }}</div>
                                        </td>
                                        <td>
                                            <div class="text-left">{{ $event->kategori->nama }}</div>
                                        </td>
                                        <td>
                                            <div class="text-left">{{ $event->nama_event }}</div>
                                        </td>
                                        <td>
                                            <div class="text-left">{{ $event->waktu }}</div>
                                        </td>
                                        <td>
                                            @foreach ($event->harga as $harga)
                                                <div class="text-left"><span>
                                                        {{ $harga->nama_harga . ':' . $harga->jumlah_tiket }}</span>
                                                </div>
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="text-left">{{ $event->status }}</div>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-primary dropdown-toggle" href="#" role="button"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    Aksi
                                                </a>

                                                <div class="dropdown-menu">
                                                    <a href="{{ route('organizer-edit-event', ['id' => $event->id]) }}"
                                                        class="dropdown-item">Edit</a>
                                                    <a href="{{ route('organizer-list-order-event', ['id' => $event->id]) }}"
                                                        class="dropdown-item">Lihat Order</a>
                                                    <a href="{{ route('organizer-list-keuangan-event', ['id' => $event->id]) }}"
                                                        class="dropdown-item">Lihat Keuangan</a>
                                                    <a href="{{ route('detail-event', ['id' => $event->slug]) }}"
                                                        class="dropdown-item">Lihat Detail Event</a>
                                                    <a onclick="confirmDelete(this)"
                                                        data-url="{{ route('organizer-hapus-event', ['id' => $event->id]) }}"
                                                        class="dropdown-item">Hapus</a>
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
    @php
        $eventss = [$totalEventAkandatang, $totalEventSelesai];
        $kategori = [];
        foreach ($kategoris as $kategori2) {
            $kategori[] = $kategori2->nama;
        }
    @endphp
@endsection
@section('addJs')
    {{-- Masukkan dibawah ini jika ingin menambahkan JS --}}
    <script>
        var eventAkanDatang = @json($eventss);
        if (jQuery('#view-chart-01').length) {
            var options = {
                series: eventAkanDatang,
                chart: {
                    width: 300,
                    type: "donut",
                },
                colors: ["#e20e02", "#f68a04"],
                labels: ["Event Akan Datang", "Event Selesai"],
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    show: false,
                    width: 0,
                },
                legend: {
                    show: false,
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200,
                        },
                        legend: {
                            position: "bottom",
                        },
                    },
                }, ],
            };

            var chart = new ApexCharts(document.querySelector("#view-chart-01"), options);
            chart.render();

        }
        if (jQuery('#view-chart-03').length) {
            var options = {
                series: [{
                    name: 'Bulan Ini',
                    data: [2, 2, 2, 2, 2]
                }, {
                    name: 'Bulan Lalu',
                    data: [2, 2, 2, 2, 2],
                }],
                colors: ['#e20e02', '#007aff'],
                chart: {
                    type: 'bar',
                    height: 230,
                    foreColor: '#D1D0CF'
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: @json($kategori),
                },
                yaxis: {
                    title: {
                        text: ''
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    enabled: false,
                    y: {
                        formatter: function(val) {
                            return "$ " + val + " thousands"
                        }
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#view-chart-03"), options);
            chart.render();
        }
    </script>
@endsection
