@extends('layouts.bone')
@section('title', 'Details Album')
@section('content')
    @include('components.navbar')
    <style>
        .info {
            text-align: justify;
        }
    </style>
    <section class="house-details pb-5">
        <div class="container">
            <div class="row align-items-center mb-4">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between">
                        <h1 class="big-header">
                            {{ $albumDetails->nama }}
                        </h1>
                        <h3 class="small-header text-start">
                            {{ $albumDetails->user->name }}
                        </h3>
                    </div>
                    <p class="paragraph info">
                        {{ $albumDetails->deskripsi }}
                    </p>
                </div>

            </div>
            <hr class="mb-5" style="color: blue">
            <div class="row">
                @foreach ($albumDetails->foto as $data)
                    <div class="col-lg-3">
                        <div class="item shadow rounded">
                            <a href="{{ route('foto.show', $data->id) }}">
                                @if ($data->lokasi && file_exists(public_path($data->lokasi)))
                                    <img src="{{ asset($data->lokasi) }}" class="img-fluid" alt="">
                                @else
                                    <img src="{{ asset('images/image-not.png') }}" class="img-fluid" alt="">
                                @endif
                            </a>
                            <div class="info">
                                <a href="{{ route('foto.show', $data->id) }}">
                                    <h3 class="small-header mt-2 p-2">
                                        {{ $data->name }}
                                    </h3>
                                </a>
                                <div class="footer">
                                    <div class="location d-flex flex-row px-2">
                                        <img src="{{ asset('images/ic_loc.svg') }}" height="20" alt="">
                                        <p class="small-paragraph ">
                                            {{ $data->tanggal }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            <div class="row house-informations justify-content-center">
                <div class="col-lg-7">
                </div>
                <div class="col-lg-7">
                    <h3 class="small-header mb-2 mt-5">
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
                                        <a href="{{ route('album.edit', $albumDetails->id) }}" type="submit"
                                            class="btn btn-warning w-100 mt-3">Edit Data</a>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="info">
                                        <a href="{{ route('album.exportPdfDetails', $albumDetails->id) }}" type="submit" class="btn btn-primary w-100 mt-3">Export
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
