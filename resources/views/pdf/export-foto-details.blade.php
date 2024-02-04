@extends('layouts.bone')
@section('title', 'Details')
@section('content')
    <section class="house-details pb-5">
        <div class="container">
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
                </div>
                <div class="row gallery justify-content-center">
                    <div class="col-lg-6 mb-5">
                        @if ($fotoDetails->lokasi != '')
                            <img src="{{ asset($fotoDetails->lokasi) }}" class="img-fluid"
                                style="max-width: 100%; height: auto;" alt="">
                        @else
                            <img src="{{ asset('images/image-not.png') }}" class="img-fluid"
                                style="max-width: 100%; height: auto;" alt="">
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
                                        
                                        <div class="info">
                                            <h3 class="small-header mt-4">
                                                Deskripsi = {{ $fotoDetails->deskripsi }}
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mb-5">
                                        
                                        <div class="info">
                                            <h3 class="small-header mt-4">
                                                Tanggal Upload = {{ $fotoDetails->tanggal }}
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mb-5">
                                        
                                        <div class="info">
                                            <h3 class="small-header mt-4">
                                                Lokasi File = {{ $fotoDetails->lokasi }}
                                            </h3>
                                        </div>
                                        <div class="info">
                                            <h3 class="small-header mt-4">
                                                Total like : {{ $fotoDetails->likefoto_count }} | Total komen : {{ $fotoDetails->komentarfoto_count }}  
                                            </h3>
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
