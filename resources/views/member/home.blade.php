@extends('member.layout.master')
@section('addCss')
    {{-- Masukkan dibawah ini jika ingin nambahkan css --}}
    <style>
        .common-card-style {
            border: 8px solid #e20e02;
        }

        .common-card-style img {
            border-radius: 0 !important;
            height: 200px;
            /* Set a fixed height for all images */
            object-fit: cover;
            /* Ensure images maintain aspect ratio and cover the container */
        }

        .common-card-style:hover img {
            transform: scale(1.2);
        }

        .common-card-style:hover {
            border: 8px solid #FFFFFF;
        }

        .body-top-selling {
            width: 100%;
            height: 100%;
            padding: 0
        }

        .body-top-selling card-text {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .carousel img {
            object-fit: cover;
            height: 600px;
        }

        .event .nama_event {
            color: #ffcccc;
        }

        .event a:hover .nama_event {
            color: #e20e02;
        }

        .kategori:hover .kategori-img {
            transform: scale(1.1);
            /* Atur skala sesuai keinginan */
            transition: transform 0.3s ease;
            /* Atur durasi dan jenis animasi */
        }

        .kategori .overlay-text {
            color: white;
            /* Setel opasitas awal menjadi 0 */
            transition: opacity 0.3s ease;
            /* Atur animasi opasitas */
        }

        .kategori:hover .overlay-text {
            opacity: 1;
            /* Setel opasitas menjadi 1 saat dihover */
        }


        @media (max-width: 767px) {

            /* Sesuaikan breakpoint mobile sesuai kebutuhan Anda */
            .carousel img {
                height: 250px !important;
                /* Menggunakan !important untuk memastikan aturan ini mengatasi aturan sebelumnya */
            }
        }
    </style>
@endsection
@section('title')
    Gamelab Event
@endsection
@section('dashboard')
    active active-menu
@endsection
@section('content')
    <!-- Carousel Section -->
    <section style="margin-bottom: 100px">
        <div id="carouselExample" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner rounded">
                @foreach ($events as $event)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img src="{{ asset('uploads/events') . '/' . $event->thumbnail }}" class="d-block w-100"
                            alt="Slide 1">
                    </div>
                @endforeach

                <!-- Add more slides as needed -->
            </div>
            <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <section style="margin-bottom: 100px">
        <div class="text-center mb-5">
            <span class="text-center h2 text-primary font-weight-bold ">Event Terbaru</span>
        </div>
        <div class="event">
            <div class="row row-cols-1 row-cols-md-3">
                @foreach ($events as $event)
                    <div class="col mb-4">
                        <a href="{{ route('detail-event', ['slug' => $event->slug]) }}">
                            <div class="card h-100 event">
                                <div class="event-img card-img-top "
                                    style="
                                background: url('{{ asset('uploads/events') . '/' . $event->thumbnail }}');
                                background-size: cover;
                                background-position: center;
                                height: 250px;
                            ">
                                    <div class="mt-3 ml-3"><span
                                            class="overlay-text @if ($event->status == 'Akan Datang') bg-success @endif @if ($event->status == 'Selesai') bg-secondary @endif @if ($event->status == 'Batal') bg-primary @endif p-2">{{ $event->status }}</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="mb-2 nama_event">
                                        <span class="card-title h5">{{ $event->nama_event }}</span>
                                    </div>
                                    <div class="mb-2">
                                        <span class="text-white">{{ $event->waktu }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="text-center">
                <a href="{{ route('member-all-event') }}" class="btn btn-primary">Lihat Event Lainnya</a>
            </div>
        </div>
    </section>
    <section style="margin-bottom: 100px">
        <div>
            <div class="text-center mb-5">
                <span class="text-center h2 text-primary font-weight-bold ">Kategori</span>
            </div>
            <div>
                <div class="row row-cols-1 row-cols-md-3 ">
                    @foreach ($kategoris as $kategori)
                        <div class="col mb-5">
                            <a href="{{ route('member-event-kategori', ['slug' => $kategori->slug]) }}">
                                <div class="card h-100 kategori">
                                    <div class="kategori-img card-img-top"
                                        style="
                                    background: url('https://images.unsplash.com/photo-1682687981907-170c006e3744?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxlZGl0b3JpYWwtZmVlZHwxfHx8ZW58MHx8fHx8');
                                    background-size: cover;
                                    background-position: center;
                                    height: 250px;
                                ">
                                        <div class="d-flex text-center align-items-center justify-content-center h-100">
                                            <span class="overlay-text p-2 h1">{{ $kategori->nama }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
    <section>
        <div class="mt-5">
            <h2 style="font-family: 'Arial', sans-serif; text-align: center">Bagaimana Event Berjalan</h2><br><br>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="text-center">
                        <i class="fas fa-search fa-3x mb-3"></i>
                        <h4>Choose Event</h4>
                        <p>Pilih event favoritmu dari berbagai kategori yang tersedia.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="text-center">
                        <i class="fas fa-ticket-alt fa-3x mb-3"></i>
                        <h4>Get Ticket</h4>
                        <p>Dapatkan tiketmu dengan mudah dan aman melalui platform kami.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="text-center">
                        <i class="fas fa-calendar-check fa-3x mb-3"></i>
                        <h4>Attend Event</h4>
                        <p>Hadir dan nikmati pengalaman seru di event yang telah kamu pilih.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <h2 style="font-family: 'Arial', sans-serif; text-align: center">Keunggulan Member</h2><br><br>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="text-center">
                        <i class="fas fa-user fa-3x mb-3"></i>
                        <h4>Akun Pribadi</h4>
                        <p>Buat akun pribadi untuk mendapatkan akses penuh ke layanan kami.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="text-center">
                        <i class="fas fa-credit-card fa-3x mb-3"></i>
                        <h4>Pembayaran Aman</h4>
                        <p>Lakukan pembayaran dengan aman menggunakan metode pembayaran yang telah disediakan.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="text-center">
                        <i class="fas fa-comments fa-3x mb-3"></i>
                        <h4>Dukungan 24/7</h4>
                        <p>Tim dukungan kami siap membantu 24 jam sehari, 7 hari seminggu.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('addJs')
    {{-- Masukkan dibawah ini jika ingin menambahkan JS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js"></script>
    <script>
        // Add your custom JavaScript here
        $(document).ready(function() {
            // Example countdown to a specific date and time
            $('#timer').countdown('2023/12/31', function(event) {
                $(this).html(event.strftime('%D days %H:%M:%S'));
            });
        });
    </script>
@endsection
