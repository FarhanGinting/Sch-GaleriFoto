@extends('layouts.bone')
@section('title', 'Dashboard')
@section('content')
    @include('components.navbar')
    <section class="header mb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">

                    <h1 class="jumbo-header mb-30">
                        Simpan Foto<br>
                        Cepat & Mudah
                    </h1>
                    <p class="paragraph mb-30">
                        Simpan Foto Tanpa Batas, Cepat, dan <br>Mudah Bersama Layanan Kami!

                    </p>
                    <p class="mb-50"><a href="{{ route('foto.create') }}" class="btn btn-primary">Upload Foto</a></p>
                    <div class="row stats text-center">
                        <div class="col-lg-4 item">
                            <h3 class="big-header">
                                {{ $totalFoto }}
                            </h3>
                            <p class="paragraph">
                                Foto
                            </p>
                        </div>
                        <div class="col-lg-4 item">
                            <h3 class="big-header">
                                {{ $totalAlbum }}
                            </h3>
                            <p class="paragraph">
                                Album
                            </p>
                        </div>
                        <div class="col-lg-4 item">
                            <h3 class="big-header">
                                Welcome
                            </h3>
                            <p class="paragraph">
                                {{ Auth::user()->name }}
                            </p>
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('images/Bannerweb.png') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    </section>
    <section class="best-items">
        <div class="container">
            <div class="row text-center mb-50">
                <div class="col-lg-12">
                    <img src="{{ asset('images/star.png') }}" height="42" alt="" class="mb-16">
                    <h3 class="big-header">
                        Foto Yang Anda Miliki
                    </h3>
                    <p class="paragraph">
                        Beberapa foto yang anda Miliki

                    </p>
                </div>
            </div>
            <div class="my-3 mb-5 d-flex justify-content-end">
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="keyword" placeholder="Search">
                        <button class="input-group-text btn btn-warning">🔍</button>
                    </div>
                    @if (Session::has('status'))
                        <!-- Modal -->
                        <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="statusModalLabel">Status</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {{ Session::get('message') }}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </form>
            </div>
            <div class="row">

                @foreach ($fotoList as $item)
                    <div class="col-lg-3">
                        <div class="item">
                            <a href="{{ route('foto.show', $item->id) }}">
                                @if ($item->lokasi != '')
                                    <img src="{{ $item->lokasi }}" alt="" class="img-fluid">
                                @else
                                    <img src="{{ asset('images/image-not.png') }}" alt="" class="img-fluid">
                                @endif
                            </a>
                            <div class="info">
                                <a href="{{ route('foto.show', $item->id) }}">
                                    <h3 class="small-header mb-2">
                                        {{ $item->name }}
                                    </h3>
                                </a>
                                <div class="footer">
                                    <div class="location d-flex flex-row ">
                                        <img src="{{ asset('images/ic_loc.svg') }}" height="20" alt="">
                                        <p class="small-paragraph mb-0">
                                            {{ $item->album->nama }}
                                        </p>
                                    </div>
                                    <div class="price">
                                        <p class="mb-0">
                                            {{ count($item->likefoto) }} 🩷 {{ count($item->komentarfoto) }} <i
                                                class="fa-solid fa-comments" style="color: #74C0FC;"></i>
                                        </p>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </section>
@endsection
