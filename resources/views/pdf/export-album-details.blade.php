@extends('layouts.bone')
@section('title', 'Export PDF Table')
@section('content')
    <section class="house-details pb-5">
        <div class="container">
            <div class="row align-items-center mb-8">
                <div class="col-lg-6">
                    <h1 class="jumbo-header">
                        {{ $albumDetails->nama }}
                    </h1>
                    <p class="paragraph">
                        {{ $albumDetails->deskripsi }}
                    </p>
                </div>
                <div class="col-lg-6 header">
                </div>
            </div>
            <div class="row">
                @foreach ($albumDetails->foto as $data)
                    <div class="col-lg-3">
                        <div class="item shadow rounded">
                            @if ($data->lokasi && file_exists(public_path($data->lokasi)))
                                <img src="{{ asset($data->lokasi) }}" class="img-fluid" style="max-width: 100%; height: auto;" alt="">
                            @else
                                <img src="{{ asset('images/image-not.png') }}" class="img-fluid" style="max-width: 100%; height: auto;" alt="">
                            @endif
                            <div class="info">
                                <h3 class="small-header mt-2 p-2">
                                    {{ $data->name }}
                                </h3>
                                <div class="footer">
                                    <div class="location d-flex flex-row px-2">
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
        </div>
    </section>



@endsection
