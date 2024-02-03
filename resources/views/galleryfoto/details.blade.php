@extends('layouts.bone')
@section('title', 'Detail Foto')
@section('content')
    @include('components.navbar')

    <section class="house-details pb-5">
        <div class="container">
{{-- Modal Like --}}
            <div class="modal fade" id="openlikeModal" tabindex="-1" aria-labelledby="openlikeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="openlikeModalLabel">Like</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body d-flex justify-content-end">
                            <div class="modal-body d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#historilikeModal">Lihat Like</button>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addlikeModal">Tambah Like</button>
                            </div>     
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="addlikeModal" tabindex="-1" aria-labelledby="likeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Like</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('like.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="FotoID" class="form-label">Nama Foto</label>
                                    <input type="text" name="FotoID" id="FotoID" value="{{ $fotoDetails->name }}"
                                        class="form-control" readonly>
                                    <input type="hidden" name="FotoID" value="{{ $fotoDetails->id }}">
                                </div>
                                <div class="mb-3">
                                    <label for="UserID" class="form-label">Nama Pengguna</label>
                                    <input type="text" name="UserID" id="UserID" value="{{ Auth::user()->name }}"
                                        class="form-control" readonly>
                                    <input type="hidden" name="UserID" value="{{ Auth::user()->id }}">
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="text" class="form-control" id="tanggal" name="tanggal"
                                        value="{{ now()->toDateString() }}" required readonly>
                                </div>

                                <div class="modal-footer d-flex">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary ms-auto">Save Like</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="historilikeModal" tabindex="-1" aria-labelledby="likeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="historilikeModalLabel">Like</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @if ($fotoDetails->likefoto_count > 0)
                                <ul>
                                    @foreach ($fotoDetails->likefoto as $like)
                                        <li>{{ $like->user->name }}</li>
                                        <p class="small-header">
                                            {{ $like->tanggal }}
                                        </p>
                                    @endforeach
                                </ul>
                            @else
                                <p>Tidak ada like.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
{{-- End ModaL Like --}}

{{-- {{ Modal Komen }} --}}
            <div class="modal fade" id="openkomentarModal" tabindex="-1" aria-labelledby="openkomentarModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="openkomentarModalLabel">Komentar</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#historikomentarModal">Lihat Komen</button>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addkomentarModal">Tambah Komen</button>
                        </div>                        
                    </div>
                </div>
            </div>
            <div class="modal fade" id="addkomentarModal" tabindex="-1" aria-labelledby="komentarModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="komentarModalLabel">Tambah Komentar</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('komentar.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="FotoID" class="form-label">Nama Foto</label>
                                    <input type="text" name="FotoID" id="FotoID" value="{{ $fotoDetails->name }}"
                                        class="form-control" readonly>
                                    <input type="hidden" name="FotoID" value="{{ $fotoDetails->id }}">
                                </div>
                                <div class="mb-3">
                                    <label for="UserID" class="form-label">Nama Pengguna</label>
                                    <input type="text" name="UserID" id="UserID" value="{{ Auth::user()->name }}"
                                        class="form-control" readonly>
                                    <input type="hidden" name="UserID" value="{{ Auth::user()->id }}">
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="text" class="form-control" id="tanggal" name="tanggal"
                                        value="{{ now()->toDateString() }}" required readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="komentar" class="form-label">Komentar</label>
                                    <textarea class="form-control" id="komentar" name="komentar" rows="3" required></textarea>
                                </div>
                                <div class="modal-footer d-flex">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary ms-auto">Save Komentar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="historikomentarModal" tabindex="-1" aria-labelledby="komentarModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="historikomentarModalLabel">Komentar</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @if ($fotoDetails->komentarfoto_count > 0)
                                <ul>
                                    @foreach ($fotoDetails->komentarfoto as $komentar)
                                        <li>{{ $komentar->user->name }} - {{ $komentar->tanggal }}</li>
                                        <p class="small-header">
                                            {{ $komentar->komentar }}
                                        </p>
                                    @endforeach
                                </ul>
                            @else
                                <p>Tidak ada komentar.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
{{-- {{ End Modal Komen }} --}}
            
            <div class="row align-items-center mb-8">
                <div class="col-lg-6">
                    <h1 class="jumbo-header">
                        {{ $fotoDetails->name }}
                    </h1>
                    <p class="paragraph">
                        {{ $fotoDetails->album->nama }}
                    </p>
                </div>
                <div class="col-lg-6 header">
                    <h3 class="small-header">
                        {{ $fotoDetails->likefoto_count }} <a data-bs-toggle="modal" data-bs-target="#openlikeModal"> 💗</a>
                        {{ $fotoDetails->komentarfoto_count }} <a data-bs-toggle="modal"
                            data-bs-target="#openkomentarModal"> 💬</a>
                    </h3>
                </div>

            </div>
            <div class="row gallery justify-content-center">
                <div class="col-lg-6 mb-5">
                    @if ($fotoDetails->lokasi != '')
                        <img src="{{ asset($fotoDetails->lokasi) }}" class="img-fluid" alt="">
                    @else
                        <img src="{{ asset('images/image-not.png') }}" class="img-fluid" alt="">
                    @endif
                </div>
            </div>

            <div class="row house-informations justify-content-center">
                <div class="col-lg-7">

                    <h3 class="small-header mb-4 ">
                        Keterangan
                    </h3>
                    <div class="row features">
                        <div class="col-lg-12">
                            <div class="row ">
                                <div class="col-lg-8 mb-5">
                                    <img src="{{ asset('images/information.png') }}" class="icon" alt="">
                                    <div class="info">
                                        <h3 class="small-header mt-4">
                                            {{ $fotoDetails->deskripsi }}
                                        </h3>

                                    </div>
                                </div>
                                <div class="col-lg-8 mb-5">
                                    <img src="{{ asset('images/timetable.png') }}" class="icon" alt="">
                                    <div class="info">
                                        <h3 class="small-header mt-4">
                                            {{ $fotoDetails->tanggal }}
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-lg-8 mb-5">
                                    <img src="{{ asset('images/folder.png') }}" class="icon" alt="">
                                    <div class="info">
                                        <h3 class="small-header mt-4">
                                            {{ $fotoDetails->lokasi }}
                                        </h3>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <h3 class="small-header mb-2 mt-4">
                        Aksi
                    </h3>
                    <div class="row features">
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="info">
                                        <a href="{{ route('index') }}" class="btn btn-secondary w-100 mt-3">Kembali</a>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="info">
                                        <form action="" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger w-100 mt-3" type="submit">Delete</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="info">
                                        <a href="{{ route('foto.edit', $fotoDetails->id) }}" type="submit"
                                            class="btn btn-warning w-100 mt-3">Edit Data</a>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="info">
                                        <a href="" type="submit" class="btn btn-primary w-100 mt-3">Export
                                            PDF</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
