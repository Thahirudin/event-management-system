@extends('admin.layout.master')
@section('addCss')
    {{-- Masukkan dibawah ini jika ingin nambahkan css --}}
@endsection
@section('title')
    Admin - Dashboard
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
                </div>
                <div class="iq-card-body row align-items-center">
                    <div class="col-lg-7">
                        <div class="row list-unstyled mb-0 pb-0">
                             @php
                                $warna = ['bg-primary', 'bg-danger', 'bg-info','bg-warning', 'bg-success'];
                            @endphp
                            @foreach ($topKategoris as $key =>  $kategori)
                           
                                <div class="col-sm-6 col-md-4 col-lg-6 mb-3">
                                    <div class="iq-progress-bar progress-bar-vertical iq-{{  $warna[$key]  }}">
                                        <span class="{{  $warna[$key]  }}" data-percent="100"
                                            style="transition: height 2s ease 0s; width: 100%; height: 40%;"></span>
                                    </div>
                                    <div class="media align-items-center">
                                        <div class="iq-icon-box-view rounded mr-3 iq-{{ $warna[$key] }}"><i
                                                class="las la-film font-size-32"></i></div>
                                        <div class="media-body text-white">
                                            <h6 class="mb-0 font-size-14 line-height">{{ $kategori->nama }}</h6>
                                            <small class="text-primary mb-0">{{ $kategori->event_count }}</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

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
                                                    <a href="{{ route('admin-tambah-order', ['id' => $event->id]) }}"
                                                        class="dropdown-item">Beli</a>
                                                    <a href="{{ route('admin-edit-event', ['id' => $event->id]) }}"
                                                        class="dropdown-item">Edit</a>
                                                    <a href="{{ route('admin-list-order-event', ['id' => $event->id]) }}"
                                                        class="dropdown-item">Lihat Order</a>
                                                    <a href="{{ route('admin-list-keuangan-event', ['id' => $event->id]) }}"
                                                        class="dropdown-item">Lihat Keuangan</a>
                                                    <a href="{{ route('detail-event', ['id' => $event->slug]) }}"
                                                        class="dropdown-item">Lihat Detail Event</a>
                                                    <a onclick="confirmDelete(this)"
                                                        data-url="{{ route('admin-hapus-event', ['id' => $event->id]) }}"
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
        $topKategoriNama = [];
        $topKategoriTotal = [];
        foreach ($topKategoris as $kategori2) {
            $topKategoriNama[] = $kategori2->nama;
            $topKategoriTotal[] = $kategori2->event_count;
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
                    data: @json($dataBulanIni),
                }, {
                    name: 'Bulan Lalu',
                    data: @json($dataBulanLalu),
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
        if (jQuery('#view-chart-02').length) {
            var options = {
                series: @json($topKategoriTotal),
                chart: {
                    width: 250,
                    type: 'donut',
                },
                colors: ['#e20e02', '#83878a', '#007aff', '#f68a04', '#14e788'],
                labels: @json($topKategoriNama),
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: false,
                    width: 0
                },
                legend: {
                    show: false,
                    formatter: function(val, opts) {
                        return val + " - " + opts.w.globals.series[opts.seriesIndex]
                    }
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var chart = new ApexCharts(document.querySelector("#view-chart-02"), options);
            chart.render();
        }
    </script>
@endsection
