@extends('admin.layout.master')
@section('addCss')
    {{-- Masukkan dibawah ini jika ingin nambahkan css --}}
@endsection
@section('title')
    Tambah Order
@endsection
@section('order')
    active active-menu
@endsection
@section('content')
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Tambah Order</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <div class="text-center">
                <img src="{{asset('uploads/events').'/'.$event->thumbnail}}" alt="" class="rounded w-100">
            </div>
            <div>
                <h1 class="h3">{{$event->nama_event}}</h1>
            </div>
            <form action="{{ route('admin-tambah-order', ['id' => $event->id]) }}" method="POST">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="member">Id Member</label>
                    <input type="text" class="form-control" id="member" name="member_id">
                </div>
                <div class="form-group">
                    <label for="event">Id Event</label>
                    <input type="text" class="form-control" id="event" name="event_id" value="{{$event->id}}" readonly>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" id="status" name="status" value="periksa" readonly>
                </div>
                 <div class="form-group">
                                 <label for="harga">Harga</label>
                                 <select class="form-control" id="harga" name="harga">
                    @foreach ($event->harga as $harga)
                                    <option>{{ $harga->nama_harga }} : {{ $harga->harga }}</option>
                                   
                                    @endforeach
                                 </select>
                              </div>
                <div class="form-group">
                    <label for="bukti">Bukti</label>
                    <input type="file" class="form-control" id="bukti" name="bukti" required="required"
                        accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
@section('addJs')
    {{-- Masukkan dibawah ini jika ingin menambahkan JS --}}
@endsection
