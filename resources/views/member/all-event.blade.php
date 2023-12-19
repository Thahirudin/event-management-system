@extends('member.layout.master')
@section('addCss')
@endsection
@section('title')
Semua Event
@endsection
@section('')
    active active-menu
@endsection
@section('content')
    <section>
        <div class="row mb-5 justify-content-between ">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select class="form-control" id="kategori" name="kategori" required="required"
                        style="background-color: #191919">
                        <option value="{{ route('member-all-event') }}">Semua</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ route('member-event-kategori', ['slug' => $kategori->slug]) }}"
                                @if ($kategori2) {{ $kategori2->id == $kategori->id ? 'selected' : '' }} @endif>
                                {{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="cari">Pencarian</label>
                    <input type="text" class="form-control" style="background-color: #191919" id="cari"
                        name="cari" placeholder="Masukkan Pencarian">
                </div>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3">
            @foreach ($events as $event)
                <div class="col mb-4">
                    <a href="{{ route('detail-event', ['slug' => $event->slug]) }}">
                        <div class="card h-100 event">
                            <div class="event-img card-img-top "
                                style="
                                background: url('{{ asset('uploads/events') . '/' . $event->thumbnail }}');
                                background-size: cover;
                                background-position: center;
                                height: 250px;
                            ">
                                <div class="mt-3 ml-3"><span
                                        class="overlay-text @if ($event->status == 'Akan Datang') bg-success @endif @if ($event->status == 'Selesai') bg-secondary @endif @if ($event->status == 'Batal') bg-primary @endif p-2">{{ $event->status }}</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mb-2 nama_event">
                                    <span class="card-title h5">{{ $event->nama_event }}</span>
                                </div>
                                <div class="mb-2">
                                    <span class="text-white">{{ $event->waktu }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-end ">
            <div>
                {{ $events->links() }}
            </div>
        </div>
    </section>
@endsection
@section('addJs')
    {{-- Masukkan dibawah ini jika ingin menambahkan JS --}}
    <script>
        document.getElementById('kategori').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            if (selectedOption.value) {
                window.location.href = selectedOption.value;
            }
        });
    </script>
@endsection
