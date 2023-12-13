@extends('admin.layout.master')
@section('addCss')
    {{-- Masukkan dibawah ini jika ingin nambahkan css --}}
@endsection
@section('title')
    Tambah Organizer
@endsection
@section('organizer')
    active active-menu
@endsection
@section('content')
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between text-white">
            <div class="iq-header-title">
                <h4 class="card-title">Tambah Organizer</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <form action="{{ route('admin-store-organizer') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="nama" name="nama" required value="{{ old('nama') }}">
                </div>
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="jabatan">Jabatan <span style="color: red;">*</span></label>
                    <select class="form-control" id="jabatan" name="jabatan" required="required">
                        <option value="Organizer" {{ old('jabatan') == 'Organizer' ? 'selected' : '' }}>Organizer</option>
                        <option value="Admin" {{ old('jabatan') == 'Admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>
                @error('jabatan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="profil">Profil <span style="color: red;">*</span></label>
                    <input type="file" class="form-control" id="profil" name="profil" required="required"
                        accept="image/*" value="{{ old('profil ') }}">
                </div>
                @error('profil')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="alamat">Alamat <span style="color: red;">*</span></label>
                    <textarea type="text" class="form-control" id="alamat" name="alamat" required="required" rows="7" >{{ old('alamat') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin <span style="color: red;">*</span></label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required="required">
                        <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                @error('jenis_kelamin')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="no_hp">Nomor HP <span style="color: red;">*</span></label>
                    <input type="string" class="form-control" id="no_hp" name="no_hp" required="required" value="{{ old('no_hp') }}">
                </div>
                @error('nomor_hp')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="row row-cols-1 row-cols-md-2">
                    <div class="col">
                        <div class="form-group">
                            <label for="nama_bank">Nama Bank <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="nama_bank" name="nama_bank" required="required" value="{{ old('nama_bank') }}">
                        </div>
                        @error('nama_bank')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="nomor_rekening">Nomor Rekening <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="nomor_rekening" name="nomor_rekening"
                                required="required" value="{{ old('nomor_rekening') }}">
                        </div>
                        @error('nomor_rekening')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir <span style="color: red;">*</span></label>
                            <input type="string" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                required="required" value="{{ old('tempat_lahir') }}">
                        </div>
                        @error('tempat_lahir')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal lahir <span style="color: red;">*</span></label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                required="required" value="{{ old('tanggal_lahir') }}">
                        </div>
                        @error('tanggal_lahir')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2">
                    <div class="col">
                        <div class="form-group">
                            <label for="email">Email <span style="color: red;">*</span></label>
                            <input type="email" class="form-control" id="email" name="email"
                                required="required" value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="facebook">Link Facebook</label>
                            <input type="string" class="form-control" id="facebook" name="facebook" value="{{ old('facebook') }}">
                        </div>
                        @error('facebook')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="instagram">Link instagram</label>
                            <input type="string" class="form-control" id="instagram" name="instagram" value="{{ old('instagram') }}">
                        </div>
                        @error('instagram')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="twitter">Link Twitter atau X</label>
                            <input type="string" class="form-control" id="twitter" name="twitter" value="{{ old('twitter') }}">
                        </div>
                        @error('twitter')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password <span style="color: red;">*</span></label>
                    <input type="password" class="form-control" id="password" name="password" required="required" value="{{ old('password') }}">
                </div>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

@section('addJs')
    {{-- Masukkan dibawah ini jika ingin menambahkan JS --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('error'))
        <script>
            Swal.fire({
                title: "gagal",
                text: "{{ session('error') }}",
                icon: "warning"
            });

            // Clear the session after displaying the success message
            @php
                session()->forget('error');
            @endphp
        </script>
    @endif
@endsection
