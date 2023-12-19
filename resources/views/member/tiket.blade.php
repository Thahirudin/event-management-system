<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Document</title>
    <style>
        * {
            color: #333;
        }

        .tiket {
            width: 1000px;
            position: relative;
            /* Add this line to make it a positioned container */
        }

        .text1 {
            position: absolute;
            top: 0px;
            padding-top: 10px;
            /* Adjust the top value as needed */
            left: 40px;
            /* Adjust the left value as needed */
        }

        .text2 {
            position: absolute;
            top: 10px;
            /* Adjust the top value as needed */
            right: 40px;
            /* Adjust the left value as needed */
        }

        .text3 {
            position: absolute;
            top: 80px;
            left: 40px;
            right: 40px;
        }

        .text4 {
            position: absolute;
            bottom: 10px;
            /* Adjust the top value as needed */
            left: 40px;
            /* Adjust the left value as needed */
        }

        .text5 {
            position: absolute;
            bottom: 0px;
            padding-bottom: 10px;
            /* Adjust the top value as needed */
            right: 40px;
            /* Adjust the left value as needed */
        }

        .text6 {
            position: absolute;
            bottom: 80px;
            left: 40px;
            right: 40px;
        }
    </style>
</head>

<body>
    <div class="tiket">
        <div class="img-bg">
            <img src="{{ asset('img/tiket.jpg') }}" alt="" width="100%">
        </div>
        <div class="text1">
            <span class="text-white fw-semibold fs-3">#{{ $order->id }}</span>
        </div>
        <div class="text2">
            <span class="text-white fw-semibold">{{ $order->event->waktu }}</span>
        </div>
        <div class="text3">
            <div class="mb-4">
                <img src="{{ asset('img/Logo 2.png') }}" alt="Logo" width="180px">
            </div>
            <div>
                <div class="mb-4" style="height: 110px">
                    <h1 class="fs-2 fw-bolder text-center">{{ $order->event->nama_event }}</h1>
                </div>
                <div class="mb-4">
                    <p class="fw-bold fs-4 text-center text-danger">{{ $order->member->nama }}</p>
                </div>
            </div>
        </div>
        <div class="text6">
            <div class="d-flex justify-content-between  align-items-center gap-3 ">
                <div style="width: 100px" id="qrcode">
                </div>
                <div>
                    Lokasi: {{ $order->event->lokasi }}
                </div>
            </div>
        </div>
        <div class="text4">
            <span class="text-white fw-semibold">{{ $order->event->kategori->nama }}</span>
        </div>
        <div class="text5">
            <span class="text-white fw-semibold fs-3">#{{ $order->id }}</span>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    <!-- Masukkan ini ke dalam tag <head> di halaman HTML Anda -->
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script>
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            text: "{{ route('member-tiket' , ['id' => $order->id]) }}",
            width: 128,
            height: 128
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const element = document.querySelector(".tiket");

            html2pdf(element, {
                margin: 10,
                filename: 'tiket.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    width: 1000,
                    height: 543.77
                } // Tentukan lebar dan tinggi
            });
        });
    </script>




</body>

</html>
