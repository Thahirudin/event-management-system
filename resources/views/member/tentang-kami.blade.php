@extends('member.layout.master')
@section('addCss')
    <style>
        .box {
            border-radius: 150px;
            position: relative;
            overflow: hidden;
            text-align: center;
            padding: 10px;
        }

        .box:before {
            position: absolute;
            content: '';
            left: 0px;
            top: 0px;
            width: 0px;
            height: 100%;
            border-radius: 150px;
            box-shadow: inset 0 0 25px rgba(0, 0, 0, 0.30);
            transition: all 0.3s ease;

        }

        .box:hover:before {
            width: 100%;
        }

        .box:hover .image-wrapper {
            padding: 0;
        }

        .box:hover .box-desc {
            color: #fff;
        }

        .image-wrapper {
            position: relative;
            max-width: 250px;
            max-height: 250px;
            margin: 0 auto;
            overflow: hidden;
            border-radius: 50%;
            padding: 10px;
            transition: all 0.5s ease;
            box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.20);

        }

        .image-wrapper img {
            border-radius: 50%;
            transition: all 300ms ease;
        }

        .box-desc {
            position: relative;

        }

        .container h1 {
            text-align: center;
            font-size: 30px;
            color: red;
        }

        .container h3 {
            text-align: center;
            padding: 20px;
            font-size: 30px;
            color: red;
        }

        .container h2 {
            color: red;
        }

        section.left .contactTitle h2 {
            position: relative;
            font-size: 28px;
            color: red;
            display: inline-block;
            margin-bottom: 25px;
        }

        section.left .contactTitle h2::before {
            content: '';
            position: absolute;
            width: 50%;
            height: 1px;
            background-color: #888;
            top: 120%;
            left: 0;
        }

        section.left .contactTitle h2::after {
            content: '';
            position: absolute;
            width: 25%;
            height: 3px;
            background-color: red;
            top: calc(120% - 1px);
            left: 0;
        }

        section.left .contactTitle p {
            font-size: 17px;
            color: #ccc;
            letter-spacing: 1px;
            line-height: 1.2;
            padding-bottom: 22px;
        }

        section.left .contactInfo {
            margin-bottom: 16px;
        }

        .contactInfo .iconGroup {
            display: flex;
            align-items: center;
            margin: 25px 0px;
        }

        .iconGroup .icon {
            width: 45px;
            height: 45px;
            border: 2px solid red;
            border-radius: 50%;
            margin-right: 20px;
            position: relative;
        }

        .iconGroup .icon i {
            font-size: 20px;
            color: #ddd;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .iconGroup .details span {
            display: block;
            color: #888;
            font-size: 18px;
        }

        .iconGroup .details span:nth-child(1) {
            text-transform: uppercase;
            color: #ccc;
        }

        section.left .socialMedia {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            flex-wrap: wrap;
            margin: 22px 0px 20px;
        }

        .socialMedia a {
            width: 35px;
            height: 35px;
            text-decoration: none;
            text-align: center;
            margin-right: 15px;
            border-radius: 5px;
            background-color: red;
            transition: 0.4s;
        }

        .socialMedia a i {
            color: #ddd;
            font-size: 18px;
            line-height: 35px;
            border: 1px solid transparent;
            transition-delay: 0.4s;
        }

        .socialMedia a:hover {
            transform: translateY(-5px);
            background-color: #2e2e2e;
            color: red;
            border: 1px solid red;
        }

        .socialMedia a:hover i {
            color: red;
        }

        @media(max-width: 1100px) {
            .messageForm .halfWidth {
                flex-basis: 100%;
            }
        }

        @media(max-width: 900px) {
            .container .row {
                flex-wrap: wrap;
            }

            .row section.left,
            .row section.right {
                flex-basis: 100%;
                margin: 0px;
            }
        }
    </style>
@endsection
@section('title')
    Tentang Kami
@endsection
@section('tentang-kami')
    active active-menu
@endsection
@section('content')
    <section>
        <div class="mb-5">
            <div class="container">
                <div class="">
                    <h1 class="mb-3">Gamelab Event</h1>
                    <p> Gamelab Event adalah teknologi unggul dalam mendukung seluruh penyelenggara event mulai dari
                        distribusi
                        manajemen tiket,hingga penyediaan laporan analisa event di akhir acara. Gamelab Event mendukung
                        berbagai
                        jenis event termasuk festival,pameran,konser musik dan berbagai jenis lainnya.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="mb-5">
        <div>
            <div class="container ">
                <h3>Tim Kami</h3>
                <div class="row h-100 ">
                    @foreach ($organizers as $organizer)
                        <div class="col-sm-6 col-lg-3 my-auto">
                            <div class="box shadow-sm p-4">
                                <div class="image-wrapper mb-3">
                                    <img class="img-fluid" src="{{ asset('uploads/organizers') . '/' . $organizer->profil }}"
                                        alt="{{ $organizer->profil }}" />
                                </div>
                                <div class="box-desc">
                                    <h5>{{ $organizer->nama }}</h5>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="mb-5">
        <div class="container">
            <div class=" mb-3">
                <span class="h1  font-weight-bold text-primary">Kontak</span>
            </div>
            <hr>
            <div class="row iq-card py-5">
                <div class="col-md-6 mb-5">
                    <div class="mb-3"><span class="h2">Hubungi Kami</span></div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="avatar-50 rounded-circle mr-3 facebook d-flex align-items-center justify-content-center h4"
                            style="border: 3px solid #ff0000"><i class="fa fa-phone"></i></div>
                        <div><span class="h5">089628437540</span></div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="avatar-50 rounded-circle mr-3 facebook d-flex align-items-center justify-content-center h4"
                            style="border: 3px solid #ff0000"><i class="fa fa-envelope"></i></div>
                        <div><span class="h5">tohiruzain098@gmail.com</span></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('kontak-kirim-email') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" style="background-color: #191919" id="email"
                                name="email" placeholder="Masukkan Email">
                        </div>
                        <div class="form-group">
                            <label for="subjek">Subjek</label>
                            <input type="text" class="form-control" style="background-color: #191919" id="subjek"
                                name="subjek" placeholder="Masukkan Subjek">
                        </div>
                        <div class="form-group">
                            <label for="pesan">Pesan</label>
                            <textarea name="pesan" class="form-control" style="background-color: #191919" id="pesan" rows="10"></textarea>
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('addJs')
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
@endsection
