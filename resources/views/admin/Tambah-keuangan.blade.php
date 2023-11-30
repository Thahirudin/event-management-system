@extends('admin.layout.master')
@section('addCss')
    {{-- Masukkan dibawah ini jika ingin nambahkan css --}}
@endsection
@section('title')
{{-- Masukkan Title --}}
@endsection
@section('list-member')
    active active-menu
@endsection
@section('content')
{{-- Untuk masukkan konten --}}
<div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Basic Form</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate, ex ac venenatis mollis, diam nibh finibus leo</p>
                           <form action="{{ route('admin-store-event') }}" method="post" enctype="multipart/form-data">
                           @csrf
                              <div class="form-group">
                                 <label for="tanggal">tanggal:</label>
                                 <input type="date" class="form-control" id="tanggal" name="tanggal">
                              </div>
                              <div class="form-group">
                                 <label for="catatan">catatan:</label>
                                 <input type="text" class="form-control" id="catatan"name="catatan">
                              </div>
                              <div class="form-group">
                                 <label for="total">total:</label>
                                 <input type="number" class="form-control" id="total"name="total">
                              </div>
                              <div class="form-group">
                                 <label for="bukti">bukti:</label>
                                 <input type="file" class="form-control" id="bukti"name="bukti"accept="image/*">
                              </div>
                              <div class="form-group">
                                 <label for="event_id">event_id:</label>
                                 <input type="number" class="form-control" id="event_id"name="event_id">
                              </div>
                              <div class="form-group">
                                 <label for="organizer_id">organizer_id:</label>
                                 <input type="number" class="form-control" id="organizer_id"name="organizer_id">
                              </div>
                              <div class="checkbox mb-3">
                                 <label><input type="checkbox"> Remember me</label>
                              </div>
                              <button type="submit" class="btn btn-primary">Submit</button>
                              <button type="submit" class="btn btn-danger">Cancel</button>
                           </form>
                        </div>
                     </div>
@endsection
@section('addJs')
    {{-- Masukkan dibawah ini jika ingin menambahkan JS --}}
@endsection
