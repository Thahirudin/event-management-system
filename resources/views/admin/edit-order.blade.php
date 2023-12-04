@extends('admin.layout.master')

@section('addCss')
    {{-- Add CSS here if needed --}}
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
                <h4 class="card-title">Edit Order</h4>
            </div>
        </div>
        <div class="iq-card-body">
           <form action=" " method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="member">Id Member</label>
                    <input type="text" class="form-control" id="member" name="member_id">
                </div>

                <div class="form-group">
                    <label for="event">Id Event</label>
                    <input type="text" class="form-control" id="event" name="event_id">
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" id="status" name="status">
                </div>

                <div class="form-group">
                    <label for="Harga">Harga</label>
                    <input type="text" class="form-control" id="Harga" name="harga">
                </div>

                <div class="form-group">
                    <label for="bukti">Bukti</label>
                    <input type="file" class="form-control" id="bukti" name="bukti" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

@section('addJs')
    {{-- Add JS here if needed --}}
@endsection
