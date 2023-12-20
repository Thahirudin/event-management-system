<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Daftar Gamevent</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/../assets/images/favicon.ico" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css') }}/bootstrap.min.css">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{ asset('css') }}/typography.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('css') }}/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('css') }}/responsive.css">
</head>

<body>
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Sign in Start -->
    <section class="sign-in-page">
        <div class="container my-5">
            <div class="row justify-content-center align-items-center height-self-center">
                <div class="col-md-12 align-self-center form-padding">
                    <div class="sign-user_card ">
                        <div class="sign-in-page-data">
                            <div class="sign-in-from w-100 m-auto">
                                <h3 class="mb-3 text-center">Daftar</h3>
                                <form action="{{ route('member-store-member') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="nama" name="nama" required value="{{ old('nama') }}">
                </div>
                @error('nama')
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
                        <div class="mt-3">
                            <div class="d-flex justify-content-center links">
                                Tidak Punya Akun? <a href="sign-up.html" class="text-primary ml-2">Daftar</a>
                            </div>
                            <div class="d-flex justify-content-center links">
                                <a href="pages-recoverpw.html" class="f-link">Lupa Password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sign in END -->
            <!-- color-customizer -->
        </div>
    </section>
    <!-- Sign in END -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js') }}/jquery.min.js"></script>
    <script src="{{ asset('js') }}/popper.min.js"></script>
    <script src="{{ asset('js') }}/bootstrap.min.js"></script>
    <!-- Appear JavaScript -->
    <script src="{{ asset('js') }}/jquery.appear.js"></script>
    <!-- Countdown JavaScript -->
    <script src="{{ asset('js') }}/countdown.min.js"></script>
    <!-- Counterup JavaScript -->
    <script src="{{ asset('js') }}/waypoints.min.js"></script>
    <script src="{{ asset('js') }}/jquery.counterup.min.js"></script>
    <!-- Wow JavaScript -->
    <script src="{{ asset('js') }}/wow.min.js"></script>
    <!-- Slick JavaScript -->
    <script src="{{ asset('js') }}/slick.min.js"></script>
    <!-- Owl Carousel JavaScript -->
    <script src="{{ asset('js') }}/owl.carousel.min.js"></script>
    <!-- Magnific Popup JavaScript -->
    <script src="{{ asset('js') }}/jquery.magnific-popup.min.js"></script>
    <!-- Smooth Scrollbar JavaScript -->
    <script src="{{ asset('js') }}/smooth-scrollbar.js"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('js') }}/chart-custom.js"></script>
    <!-- Custom JavaScript -->
    <script src="{{ asset('js') }}/custom.js"></script>

</body>

</html>
