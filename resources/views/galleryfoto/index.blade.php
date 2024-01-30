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
                    <p class="mb-50"><a href="{{ route('create') }}" class="btn btn-primary">Upload Foto</a></p>
                    <div class="row stats text-center">
                        <div class="col-lg-4 item">
                            <h3 class="big-header">
                                @foreach ($albumList as $key => $item)
                                @endforeach
                                {{ count($albumList) }}
                            </h3>
                            <p class="paragraph">
                                Foto
                            </p>
                        </div>
                        <div class="col-lg-4 item">
                            <h3 class="big-header">
                                Album
                            </h3>
                            <p class="paragraph">
                                {{-- {{ Auth::user()->nama }} --}}
                            </p>
                        </div>
                        <div class="col-lg-4 item">
                            <h3 class="big-header">
                                Welcome
                            </h3>
                            <p class="paragraph">
                                {{-- {{ Auth::user()->email }} --}}
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
                        Foto Yang Anda Suka
                    </h3>
                    <p class="paragraph">
                        Beberapa foto yang anda suka

                    </p>
                </div>
            </div>
            <div class="my-3 mb-5 d-flex justify-content-end">
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="keyword" placeholder="Search">
                        <button class="input-group-text btn btn-warning">🔍</button>
                    </div>
                </form>
            </div>
            <div class="row">

                @foreach ($albumList as $item)
                    <div class="col-lg-3">
                        <div class="item">
                            
                            <a href="">

                                @if ($item->image != '')
                                    <img src="{{ $item->image }}" alt="" class="img-fluid">
                                @else
                                    <img src="{{ asset('images/image-not.png') }}" alt="" class="img-fluid">
                                @endif
                            </a>
                            <div class="info">
                                <a href="/details/{{ $item->id }}">
                                    <h3 class="small-header mb-2">
                                        {{ $item->nama }}
                                    </h3>
                                </a>
                                <div class="footer">
                                    <div class="location d-flex flex-row ">
                                        <img src="{{ asset('images/ic_loc.svg') }}" height="20" alt="">
                                        <p class="small-paragraph mb-0">
                                                {{ $item->user->namalengkap }} - {{ $item->fotos_count }} Foto
                                        </p>
                                    </div>
                                    <div class="price">
                                        <p class="mb-0">
                                            {{ $item->tanggal }}

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
