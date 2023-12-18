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

        /* Code for the right section (column) */

        .row section.right .messageForm {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            padding-top: 30px;
        }

        .row section.right .inputGroup {
            margin: 18px 0px;
            position: relative;
        }

        .messageForm .halfWidth {
            flex-basis: 48%;
        }

        .messageForm .fullWidth {
            flex-basis: 100%;
        }

        .messageForm input,
        .messageForm textarea {
            width: 100%;
            font-size: 18px;
            padding: 2px 0px;
            background-color: #2e2e2e;
            color: #ddd;
            border: none;
            border-bottom: 2px solid #666;
            outline: none;
        }

        .messageForm textarea {
            resize: none;
            height: 220px;
            display: block;
        }

        textarea::-webkit-scrollbar {
            width: 5px;
        }

        textarea::-webkit-scrollbar-track {
            background-color: #1e1e1e;
            border-radius: 15px;
        }

        textarea::-webkit-scrollbar-thumb {
            background-color: red;
            border-radius: 15px;
        }

        .inputGroup label {
            position: absolute;
            left: 0;
            bottom: 4px;
            color: #888;
            font-size: 18px;
            transition: 0.4s;
            pointer-events: none;
        }

        .inputGroup:nth-child(4) label {
            top: 2px;
        }

        .inputGroup input:focus~label,
        .inputGroup textarea:focus~label,
        .inputGroup input:valid~label,
        .inputGroup textarea:valid~label {
            transform: translateY(-30px);
            font-size: 16px;
        }

        .inputGroup button {
            padding: 8px 16px;
            font-size: 18px;
            background-color: red;
            color: #ddd;
            border: 1px solid transparent;
            border-radius: 25px;
            outline: none;
            cursor: pointer;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3);
            transition: 0.4s;
        }

        .inputGroup button:hover {
            background-color: #2e2e2e;
            color: red;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3);
            border: 1px solid red;
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
@section('tentang_kami')
    active active-menu
@endsection
@section('content')
    <div class="mb-5">
        <div class="container">
            <div class="card container">
                <h1>Gamelab Event</h1>
                <p> Gamelab Event adalah teknologi unggul dalam mendukung seluruh penyelenggara event mulai dari distribusi
                    manajemen tiket,hingga penyediaan laporan analisa event di akhir acara. Gamelab Event mendukung berbagai
                    jenis event termasuk festival,pameran,konser musik dan berbagai jenis lainnya.</p>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <h3>Tim Kami</h3>
            <div class="row vh-100">
                <div class="col-sm-6 col-lg-3 my-auto">
                    <div class="box shadow-sm p-4">
                        <div class="image-wrapper mb-3">
                            <img class="img-fluid" src="https://images.pexels.com/photos/555790/pexels-photo-555790.png"
                                alt="..." />
                        </div>
                        <div class="box-desc">
                            <h5>Jon Doe</h5>
                        </div>

                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 my-auto">
                    <div class="box shadow-sm p-4">
                        <div class="image-wrapper mb-3">
                            <img class="img-fluid" src="https://images.pexels.com/photos/555790/pexels-photo-555790.png"
                                alt="..." />
                        </div>
                        <div class="box-desc">
                            <h5>Jon Doe</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 my-auto">
                    <div class="box shadow-sm p-4">
                        <div class="image-wrapper mb-3">
                            <img class="img-fluid" src="https://images.pexels.com/photos/555790/pexels-photo-555790.png"
                                alt="..." />
                        </div>
                        <div class="box-desc">
                            <h5>Jon Doe</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 my-auto">
                    <div class="box shadow-sm p-4">
                        <div class="image-wrapper mb-3">
                            <img class="img-fluid" src="https://images.pexels.com/photos/555790/pexels-photo-555790.png"
                                alt="..." />
                        </div>
                        <div class="box-desc">
                            <h5>Jon Doe</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 my-auto">
                    <div class="box shadow-sm p-4">
                        <div class="image-wrapper mb-3">
                            <img class="img-fluid" src="https://images.pexels.com/photos/555790/pexels-photo-555790.png"
                                alt="..." />
                        </div>
                        <div class="box-desc">
                            <h5>Jon Doe</h5>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <section id="contact">
        <div class="container">
            <div class="contact-wrapper">
                <div class="row">
                    <section class="col left">
                        <div class="contactTitle">
                            <h2>Kontak</h2>
                            <p>Hubungi kami</p>
                        </div>
                        <div class="contactInfo">

                            <div class="iconGroup">
                                <div class="icon">
                                    <i class="fa fa-phone fa-2x"></i>
                                </div>
                                <div class="details">
                                    <span>Telepon</span>
                                    <span>+6282653748</span>
                                </div>
                            </div>

                            <div class="iconGroup">
                                <div class="icon">
                                    <i class="fa fa-envelope fa-2x"></i>
                                </div>
                                <div class="details">
                                    <span>Email</span>
                                    <span>event_gamelab@gmail.com</span>
                                </div>
                            </div>
                            <!--  *******   Contact Info Ends   *******  -->

                            <!--  *******   Social Media Starts   *******  -->

                            <div class="socialMedia">
                                <a href="#"><i class="fa fa-facebook-f"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-whatsapp"></i></a>
                            </div>
                    </section>
                    <section class="col right">

                        <!--  *******   Form Starts   *******  -->

                        <form class="messageForm">

                            <div class="inputGroup halfWidth">
                                <input type="text" name="" required="required">
                                <label>Nama</label>
                            </div>

                            <div class="inputGroup halfWidth">
                                <input type="email" name="" required="required">
                                <label>Email</label>
                            </div>

                            <div class="inputGroup fullWidth">
                                <input type="text" name="" required="required">
                                <label>Subject</label>
                            </div>

                            <div class="inputGroup fullWidth">
                                <textarea required="required"></textarea>
                                <label>Pesan</label>
                            </div>

                            <div class="inputGroup fullWidth">
                                <button>Kirim Pesan</button>
                            </div>

                        </form>
                    </section>
                </div>
            </div>
    </section>
@endsection
@section('addJs')
@endsection
