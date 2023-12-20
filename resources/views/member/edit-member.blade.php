@extends('member.layout.master')
@section('addCss')
    {{-- Masukkan dibawah ini jika ingin nambahkan css --}}
@endsection
@section('title')
    Edit Member
@endsection
@section('list-member')
    active active-menu
@endsection
@section('content')
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between text-white">
            <div class="iq-header-title">
                <h4 class="card-title">Edit Profil</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <form action="{{ route('member-update-member', ['id' => $member->id]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama">Nama <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="nama" name="nama" required
                        value="{{ $member->nama }}">
                </div>
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="profil">Profil</label>
                    <input type="file" class="form-control" id="profil" name="profil"
                        accept="image/*">
                </div>
                @error('profil')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="alamat">Alamat <span style="color: red;">*</span></label>
                    <textarea type="text" class="form-control" id="alamat" name="alamat" required="required" rows="7">{{ $member->alamat }}</textarea>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin <span style="color: red;">*</span></label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required="required">
                        <option value="Laki-Laki" {{ $member->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki
                        </option>
                        <option value="Perempuan" {{ $member->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                            Perempuan</option>
                    </select>
                </div>
                @error('jenis_kelamin')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="no_hp">Nomor HP <span style="color: red;">*</span></label>
                    <input type="string" class="form-control" id="no_hp" name="no_hp" required="required"
                        value="{{ $member->no_hp }}">
                </div>
                @error('nomor_hp')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir <span style="color: red;">*</span></label>
                            <input type="string" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                required="required" value="{{ $member->tempat_lahir }}">
                        </div>
                        @error('tempat_lahir')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal lahir <span style="color: red;">*</span></label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                required="required" value="{{ $member->tanggal_lahir }}">
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
                                required="required" value="{{ $member->email }}">
                        </div>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="facebook">Link Facebook</label>
                            <input type="string" class="form-control" id="facebook" name="facebook"
                                value="{{ $member->facebook }}">
                        </div>
                        @error('facebook')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="instagram">Link instagram</label>
                            <input type="string" class="form-control" id="instagram" name="instagram"
                                value="{{ $member->instagram }}">
                        </div>
                        @error('instagram')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="twitter">Link Twitter atau X</label>
                            <input type="string" class="form-control" id="twitter" name="twitter"
                                value="{{ $member->twitter }}">
                        </div>
                        @error('twitter')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password <span style="color: red;">*</span></label>
                    <input type="password" class="form-control" id="password" name="password">
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
