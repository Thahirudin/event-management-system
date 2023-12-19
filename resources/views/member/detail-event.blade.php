@extends('member.layout.master')
@section('addCss')
    <style>
        .detail h2 {
            font-size: 35px;
        }

        .detail h3 {
            font-size: 30px;
        }

        .detail h4 {
            font-size: 25px;
        }

        .detail h5 {
            font-size: 20px;
        }

        .detail h6 {
            font-size: 16px;
        }
    </style>
@endsection
@section('title')
    Detail Event
@endsection
@section('')
    active active-menu
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="iq-card rounded-5 px-3 py-4 mb-4">
                <div class="mb-3">
                    <div>
                        <h1 class="h1 text-center font-weight-bolder  text-wrap ">{{ $event->nama_event }}</h1>
                    </div>
                    <div><span><i class="fa fa-tag"></i> {{ $event->kategori->nama }}</span></div>
                </div>
                <div class="mb-5">
                    <img src="{{ asset('uploads/events') . '/' . $event->thumbnail }}" alt="{{ $event->thumbnail }}"
                        class="w-100 rounded">
                </div>
                <div class="text-wrap detail">
                    {!! $event->detail !!}
                </div>
            </div>
            <div class="iq-card rounded-5 px-3 py-4 mb-4">
                <div class="d-flex align-items-center justify-content-between ">
                    <div><span class="h3 font-weight-bold ">Share</span></div>
                    <div class="iq-social d-inline-block align-items-center">
                        <ul class="list-inline d-flex p-0 mb-0 align-items-center">
                            <li>
                                <a href=""
                                    class="avatar-40 rounded-circle bg-primary mr-2 facebook"><i class="fa fa-facebook"
                                        aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href=""
                                    class="avatar-40 rounded-circle bg-primary mr-2 twitter"><i class="fa fa-twitter"
                                        aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href=""
                                    class="avatar-40 rounded-circle bg-primary mr-2 instagram"><i class="fa fa-instagram"
                                        aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="iq-card px-3 py-4 mb-4">
                <div class="mb-3"><span class="h3 font-weight-bold ">Harga Tiket</span></div>
                @foreach ($event->harga as $harga)
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span>{{ $harga->nama_harga }} : </span>
                        </div>
                        <div>
                            <span>Rp. {{ number_format($harga->harga, 0, ',', '.') }}</span>
                        </div>
                    </div>
                @endforeach
                <div class="mt-3">
                    <div><span>Transfer ke :</span></div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span>{{ $event->user->nama_bank }}</span>
                        </div>
                        <div>
                            <span>{{ $event->user->nomor_rekening }}</span>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{ route('member-tambah-order', ['id' => $event->id]) }}" class="btn btn-primary btn-lg btn-block">Pesan Sekarang</a>
                </div>
            </div>
            <div class="iq-card px-3 py-4">
                <div class="mb-3"><span class="h3 font-weight-bold ">Organizer</span></div>
                <div class="d-flex align-items-center ">
                    <div class="mr-3">
                        <img src="{{ asset('uploads/organizers') . '/' . $event->user->profil }}"
                            alt="{{ $event->user->profil }}" style="object-fit: cover; height: 100px;  width: 100px;"
                            class="rounded-circle ">
                    </div>
                    <div>
                        <div><span class="h4 ">{{ $event->user->nama }}</span></div>
                        <div><a href="{{ route('member-profil-organizer', ['id' => $event->user->id]) }}">Lihat Profil</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="iq-card px-3 py-4 mb-4">
                <div class="mb-3"><span class="h3 font-weight-bold ">Event Terbaru</span></div>
                @foreach ($events as $event2)
                    <div>
                        <a href="{{ route('detail-event', ['slug' => $event2->slug]) }}">{{ $event2->nama_event }}</a>
                        <hr style="background-color: white; height: 1.5px;">
                    </div>
                @endforeach
            </div>
            <div class="iq-card px-3 py-4">
                <div class="mb-3"><span class="h3 font-weight-bold ">Kategori</span></div>
                @foreach ($kategoris as $kategori2)
                    <div>
                        <ul>
                            <li><a
                                    href="{{ route('detail-event', ['slug' => $kategori2->slug]) }}">{{ $kategori2->nama }}</a>
                            </li>
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('addJs')
@endsection
