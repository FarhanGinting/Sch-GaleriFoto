@extends('layouts.bone')
@section('title', 'Dashboard')
@section('content')
    @include('components.navbar')
    <section class="header mb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    
                    <h1 class="jumbo-header mb-30">
                        Catat Perjalanan<br>
                        Cepat & Mudah
                    </h1>
                    <p class="paragraph mb-30">
                        Catat Perjalanan Tanpa Batas, Cepat, dan <br>Mudah Bersama Layanan Kami!
                        
                    </p>
                    <p class="mb-50"><a href="" class="btn btn-primary">Buat Catatan
                            Perjalanan</a></p>
                    <div class="row stats text-center">
                        <div class="col-lg-4 item">
                            <h3 class="big-header">
                                @foreach ($LikeList as $key => $item)
                                @endforeach
                                {{ count($LikeList) }}
                            </h3>
                            <p class="paragraph">
                                Catatan
                            </p>
                        </div>
                        <div class="col-lg-4 item">
                            <h3 class="big-header">
                                Welcome
                            </h3>
                            <p class="paragraph">
                                 {{-- {{ Auth::user()->nama }} --}}
                            </p>
                        </div>
                        <div class="col-lg-4 item">
                            <h3 class="big-header">
                                Email
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
                        Perjalanan Anda
                    </h3>
                    <p class="paragraph">
                        Perjalanan Terbanyak Anda: Merentasi Batas, Menjelajahi Keindahan Dunia Bersama Kenangan Tak
                        Terlupakan!
                        {{ $LikeList->foto }}
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

                {{-- @foreach ($LikeList as $item)
                    <div class="col-lg-3">
                        <div class="item">

                            <a href="">

                                @if ($item->image != '')
                                    <img src="{{$item->image }}" alt=""
                                        class="img-fluid" >
                                @else
                                    <img src="{{ asset('images/image-not.png') }}" alt="" class="img-fluid">
                                @endif
                            </a>
                            <div class="info">
                                <a href="/details/{{ $item->id }}/{{ Str::slug($item->nama, '-') }}">
                                    <h3 class="small-header mb-2">
                                        {{ $item->nama }}
                                    </h3>
                                </a>
                                <div class="footer">
                                    <div class="location d-flex flex-row ">
                                        <img src="{{ asset('images/ic_loc.svg') }}" height="20" alt="">
                                        <p class="small-paragraph mb-0">
                                            {{ $item->lokasi }} - @isset($item->suhu)
                                                🌡️ {{ $item->suhu }}
                                            @endisset
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
                @endforeach --}}
            </div>
        </div>
    </section>
@endsection
