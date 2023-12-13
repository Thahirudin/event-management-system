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
                <div style="width: 100px">
                    <img src="data:image/png;base64,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"
                        alt="qr" class="w-100">
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
</body>

</html>
