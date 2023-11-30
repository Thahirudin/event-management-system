@extends('admin.layout.master')
@section('addCss')
@endsection
@section('title')
    Tambah Event
@endsection
@section('event')
    active active-menu
@endsection
@section('content')
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Tambah Event</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <form action="{{ route('admin-store-event') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="id_organizer">Id Organizer</label>
                    <input type="text" class="form-control" id="id_organizer" name="id_organizer"
                        value="{{ Auth::user()->id }}" readonly autocomplete="off" required>
                </div>
                @error('id_organizer')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select class="form-control" id="kategori" name="kategori" autocomplete="off" required>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>
                @error('kategori')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="nama_event">Nama Event</label>
                    <input type="text" class="form-control" id="nama_event" name="nama_event" autocomplete="off"
                        required>
                </div>
                @error('nama_event')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <input type="file" name="thumbnail" accept="image/*">
                </div>
                @error('thumbnail')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="waktu">Waktu</label>
                            <input type="text" class="form-control" id="waktu" name="waktu"
                                placeholder="Pilih Tanggal dan Waktu" autocomplete="off" required>
                        </div>
                        @error('waktu')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi" autocomplete="off"
                                required>
                        </div>
                        @error('lokasi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="detail">Detail</label>
                    <textarea name="detail" id="detail" autocomplete="off" required></textarea>
                    @error('detail')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kontak">kontak</label>
                    <input type="text" class="form-control" id="kontak" name="kontak" autocomplete="off" required>
                </div>
                @error('kontak')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <button class="btn btn-info" onclick="tambahKolomHarga()">Tambah Kolom Harga</button>
                <div id="kolomHarga">
                    <!-- Kolom harga pertama -->
                    <div class="row" id="kolomHarga-1">
                        <div class="col">
                            <div class="form-group">
                                <label for="nama_harga">Nama Harga</label>
                                <input type="text" class="form-control" id="nama_harga" name="nama_harga[]"
                                    autocomplete="off" required>
                            </div>
                            @error('nama_harga[]')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" class="form-control" id="harga" name="harga[]" autocomplete="off"
                                    required>
                            </div>
                            @error('harga[]')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" id="status" name="status" readonly autocomplete="off"
                        required value="On Going">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
@section('addJs')
    <script>
        function generateSlug() {
            var kategoriInput = document.getElementById('kategori').value;
            var slugInput = kategoriInput.toLowerCase().replace(/\s+/g, '-');
            document.getElementById('slug').value = slugInput;
        }
    </script>
    <script src="https://cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('detail', {
            height: 550,
            uiColor: '#9AB8F3'
        });
    </script>
    <script>
        let indexKolomHarga = 1; // Indeks kolom harga dimulai dari 1

        function tambahKolomHarga() {
            indexKolomHarga++;
            let kolomHarga = document.getElementById("kolomHarga");

            let divRow = document.createElement("div");
            divRow.className = "row";
            divRow.id = "kolomHarga-" + indexKolomHarga;

            let divCol1 = document.createElement("div");
            divCol1.className = "col";
            let label1 = document.createElement("label");
            label1.textContent = "Nama Harga";
            let inputNamaHarga = document.createElement("input");
            inputNamaHarga.type = "text";
            inputNamaHarga.className = "form-control";
            inputNamaHarga.name = "nama_harga[]";
            inputNamaHarga.autocomplete = "off";
            inputNamaHarga.required = true;
            divCol1.appendChild(label1);
            divCol1.appendChild(inputNamaHarga);

            let divCol2 = document.createElement("div");
            divCol2.className = "col";
            let label2 = document.createElement("label");
            label2.textContent = "Harga";
            let inputHarga = document.createElement("input");
            inputHarga.type = "text";
            inputHarga.className = "form-control";
            inputHarga.name = "harga[]";
            inputHarga.autocomplete = "off";
            inputHarga.required = true;
            divCol2.appendChild(label2);
            divCol2.appendChild(inputHarga);

            divRow.appendChild(divCol1);
            divRow.appendChild(divCol2);

            kolomHarga.appendChild(divRow);
        }
    </script>
    <!-- Moment.js -->
    <script src="https://cdn.jsdelivr.net/npm/moment/moment.min.js"></script>

    <!-- Flatpickr JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        // Inisialisasi Flatpickr dengan opsi zona waktu lokal
        flatpickr("#waktu", {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            time_24hr: true,
            // Set zona waktu sesuai dengan zona waktu lokal
            timeZone: Intl.DateTimeFormat().resolvedOptions().timeZone,
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('sukses'))
        <script>
            Swal.fire({
                title: "Sukses",
                text: "{{ session('sukses') }}",
                icon: "success"
            });

            // Clear the session after displaying the success message
            @php
                session()->forget('sukses');
            @endphp
        </script>
    @endif
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