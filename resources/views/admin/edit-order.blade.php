@extends('admin.layout.master')
@section('addCss')
    {{-- Masukkan dibawah ini jika ingin nambahkan css --}}
@endsection
@section('title')
    Edit Order
@endsection
@section('kategori')
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
            <form>
                <div class="form-group">
                    <label for="order">Id Order</label>
                    <input type="text" class="form-control" id="order">
                </div>
                <div class="form-group">
                    <label for="member">Id Member</label>
                    <input type="text" class="form-control" id="member">
                </div>
                <div class="form-group">
                    <label for="event">Id Event</label>
                    <input type="text" class="form-control" id="event">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
@section('addJs')
    {{-- Masukkan dibawah ini jika ingin menambahkan JS --}}
@endsection
