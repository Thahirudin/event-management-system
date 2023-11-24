@extends('admin.layout.master')
@section('addCss')
    {{-- Masukkan dibawah ini jika ingin nambahkan css --}}
@endsection
@section('title')
    Tambah Member
@endsection
@section('kategori')
    active active-menu
@endsection
@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Tambah Member</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin-dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Tambah Member</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<div class="content">
	<div class="container-fluid">

		<div class="card">
            <div class="card-body">
                <form>
                    @csrf

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" required="required" >
</div>
<div class="form-group">
                        <label for="nama">Username</label>
                        <input type="text" name="nama" id="nama" class="form-control" required="required" >
</div>
<div class="form-group">
                        <label for="nama">Tanggal Lahir</label>
                        <input type="date" name="nama" id="nama" class="form-control" required="required">
</div>
<div class="form-group">
                        <label for="nama">Email</label>
                        <input type="text" name="nama" id="nama" class="form-control" required="required">
</div>
<div class="form-group">
                        <label for="nama">Password</label>
                        <input type="text" name="nama" id="nama" class="form-control" required="required">
</div>
<div class="text-right">
    <a href="#" class="btn btn-outline-secondary mr-2" role="button">Batal</a>
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>
                    </form>
</div>
</div>
</div>
</div>
@endsection
@section('addJs')
    {{-- Masukkan dibawah ini jika ingin menambahkan JS --}}
@endsection
