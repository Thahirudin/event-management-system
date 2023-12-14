@extends('member.layout.master')
@section('addCss')
    {{-- Masukkan dibawah ini jika ingin nambahkan css --}}
    <style>
        /* Add custom styles here */

        /* Rounded corners for the card */
        .card {
            border-radius: 15px;
            overflow: hidden;
            position: relative; /* To ensure rounded corners work even with images */
        }

        .card-body {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%; /* Adjust the width as needed */
            text-align: center;
        }

        /* Title styling */
        .card-title {
            position: absolute;
            bottom: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.7); /* Semi-transparent background */
            color: #fff; /* Text color */
            padding: 10px; /* Padding for the title */
            margin: 0;
        }

        /* Image styling */
        .card-img-top {
            border-radius: 15px 15px 0 0;
            width: 100%;/* Rounded corners only at the top */
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
<div class="container">

    <!-- Carousel Section -->
    <div id="carouselExample" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://ecs7.tokopedia.net/blog-tokopedia-com/uploads/2017/12/Blog_Acara-Konser-Musik-Tahunan-di-Indonesia-buat-Pecinta-Musik.jpg" class="d-block w-100" alt="Slide 1">
            <div class="carousel-caption d-none d-md-block text-left" style="position: absolute; top: 50%; left: 5%; transform: translateY(-50%); width: 40%;">
                <h5 style="font-size: 3em;">Gamelab Event</h5>
                <div class="mt-4">
                    <h2 style="font-family: 'Arial', sans-serif; font-size: 2em;">Event Countdown Timer</h2>
                    <div id="timer"></div>
                </div>
            </div>
        </div>
    </div>
</div>


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

    <div class="mt-4 text-center">
        <h2 style="font-family: 'Arial', sans-serif; text-align: center">Paling Banyak Terjual</h2><br><br>
        <div class="row">

            <!-- Card 1 -->
            <div class="col-md-4 top-selling-card">
                <div class="card">
                    <img src="https://your-event-image1.jpg" class="card-img-top" alt="Event 1">
                    <div class="card-body">
                        <h5 class="card-title">Event 1</h5>
                        <p class="card-text">Description of Event 1.</p>
                        <a href="#" class="btn btn-primary btn-hover">Buy Tickets</a>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4 top-selling-card">
                <div class="card">
                    <img src="https://your-event-image2.jpg" class="card-img-top" alt="Event 2">
                    <div class="card-body">
                        <h5 class="card-title">Event 2</h5>
                        <p class="card-text">Description of Event 2.</p>
                        <a href="#" class="btn btn-primary btn-hover">Buy Tickets</a>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4 top-selling-card">
                <div class="card">
                    <img src="https://your-event-image2.jpg" class="card-img-top" alt="Event 2">
                    <div class="card-body">
                        <h5 class="card-title">Event 3</h5>
                        <p class="card-text">Description of Event 3.</p>
                        <a href="#" class="btn btn-primary btn-hover">Buy Tickets</a>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-md-4 top-selling-card">
                <div class="card">
                    <img src="https://your-event-image2.jpg" class="card-img-top" alt="Event 2">
                    <div class="card-body">
                        <h5 class="card-title">Event 4</h5>
                        <p class="card-text">Description of Event 4.</p>
                        <a href="#" class="btn btn-primary btn-hover">Buy Tickets</a>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="col-md-4 top-selling-card">
                <div class="card">
                    <img src="https://your-event-image2.jpg" class="card-img-top" alt="Event 2">
                    <div class="card-body">
                        <h5 class="card-title">Event 5</h5>
                        <p class="card-text">Description of Event 5.</p>
                        <a href="#" class="btn btn-primary btn-hover">Buy Tickets</a>
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="col-md-4 top-selling-card">
                <div class="card">
                    <img src="https://your-event-image2.jpg" class="card-img-top" alt="Event 2">
                    <div class="card-body">
                        <h5 class="card-title">Event 6</h5>
                        <p class="card-text">Description of Event 6.</p>
                        <a href="#" class="btn btn-primary btn-hover">Buy Tickets</a>
                    </div>
                </div>
            </div>

                {{-- Add more cards as needed --}}
        </div>
    </div>

            <div class="mt-4 text-center">
                <a href="" class="btn btn-primary">
                <i class="fa fa-calendar"></i> Tampilkan Semua Event
                </a>
            </div>

    <div class="mt-4">
    <h2 style="font-family: 'Arial', sans-serif; text-align: center">Kategori Event</h2><br><br>
    <div class="row">

        <!-- Kategori 1 -->
        <div class="col-md-3">
            <a href="#" class="card-link">
                <div class="card common-card-style">
                    <img src="https://media.istockphoto.com/id/1305198154/id/foto/konser-rock-kerumunan-bersorak-di-depan-lampu-panggung-berwarna-warni-terang.jpg?s=612x612&w=0&k=20&c=77VbhAGbydhUb4y7H9tRfm-q7P_LDWCCcg1tvT-ruOc=" class="card-img-top" alt="Category 1">
                    <div class="card-body">
                        <h5>Umum</h5>
                    </div>
                </div>
            </a>
        </div>

        <!-- Kategori 2 -->
        <div class="col-md-3">
            <a href="#" class="card-link">
                <div class="card common-card-style">
                    <img src="https://akcdn.detik.net.id/visual/2022/06/14/ilustrasi-festival-musik_169.jpeg?w=650" class="card-img-top" alt="Category 2">
                    <div class="card-body">
                        <h5>Hiburan</h5>
                    </div>
                </div>
            </a>
        </div>

        <!-- Kategori 3 -->
        <div class="col-md-3">
            <a href="#" class="card-link">
                <div class="card common-card-style">
                    <img src="https://cdn1-production-images-kly.akamaized.net/VMzd0Vc7WL38iUo6N7hMI4ivYMM=/800x450/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/3346274/original/031208500_1610369317-pexels-agung-pandit-wiguna-3401403.jpg" class="card-img-top" alt="Category 3">
                    <div class="card-body">
                        <h5>Pendidikan dan Pengembangan</h5>
                    </div>
                </div>
            </a>
        </div>

        <!-- Kategori 4 -->
        <div class="col-md-3">
            <a href="#" class="card-link">
                <div class="card common-card-style">
                    <img src="https://www.rsannisa.co.id/img/thumbnail/b2ab667cc5693ca00b8148a2b49150e2.jpg" class="card-img-top" alt="Category 4">
                    <div class="card-body">
                        <h5>Kesehatan dan Kebugaran</h5>
                    </div>
                </div>
            </a>
        </div>

        <!-- Kategori 5 -->
        <div class="col-md-3">
            <a href="#" class="card-link">
                <div class="card common-card-style">
                    <img src="https://extramile.thehartford.com/wp-content/uploads/2018/03/ThinkstockPhotos-472551584.jpg" class="card-img-top" alt="Category 5">
                    <div class="card-body">
                        <h5>Sosial dan Amal</h5>
                    </div>
                </div>
            </a>
        </div>

        <!-- Add more categories as needed -->

    </div>
</div>


    <div class="mt-4">
    <h2 style="font-family: 'Arial', sans-serif; text-align: center">Bagaimana Event Berjalan</h2><br><br>
    <div class="row">
        <div class="col-md-4">
            <div class="text-center">
                <i class="fas fa-search fa-3x mb-3"></i>
                <h4>Choose Event</h4>
                <p>Pilih event favoritmu dari berbagai kategori yang tersedia.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="text-center">
                <i class="fas fa-ticket-alt fa-3x mb-3"></i>
                <h4>Get Ticket</h4>
                <p>Dapatkan tiketmu dengan mudah dan aman melalui platform kami.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="text-center">
                <i class="fas fa-calendar-check fa-3x mb-3"></i>
                <h4>Attend Event</h4>
                <p>Hadir dan nikmati pengalaman seru di event yang telah kamu pilih.</p>
            </div>
        </div>
    </div>
</div>

<div class="mt-4">
    <h2 style="font-family: 'Arial', sans-serif; text-align: center">Keunggulan Member</h2><br><br>
    <div class="row">
        <div class="col-md-4">
            <div class="text-center">
                <i class="fas fa-user fa-3x mb-3"></i>
                <h4>Akun Pribadi</h4>
                <p>Buat akun pribadi untuk mendapatkan akses penuh ke layanan kami.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="text-center">
                <i class="fas fa-credit-card fa-3x mb-3"></i>
                <h4>Pembayaran Aman</h4>
                <p>Lakukan pembayaran dengan aman menggunakan metode pembayaran yang telah disediakan.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="text-center">
                <i class="fas fa-comments fa-3x mb-3"></i>
                <h4>Dukungan 24/7</h4>
                <p>Tim dukungan kami siap membantu 24 jam sehari, 7 hari seminggu.</p>
            </div>
        </div>
    </div>
</div>

@endsection
@section('addJs')
    {{-- Masukkan dibawah ini jika ingin menambahkan JS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js"></script>
    <script>
        // Add your custom JavaScript here
        $(document).ready(function () {
            // Example countdown to a specific date and time
            $('#timer').countdown('2023/12/31', function (event) {
                $(this).html(event.strftime('%D days %H:%M:%S'));
            });
        });
    </script>

@endsection
