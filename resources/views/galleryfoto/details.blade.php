@extends('layouts.bone')
@section('title', 'Details Album')
@section('content')
    @include('components.navbar')
    <div class="row gallery">
        @forelse ($albumDetails->fotos as $item)
            <div class="col-lg-4 mb-4">
                <div class="gallery-item">
                    <a href="">
                        <img src="{{ $item->lokasi }}" class="img-fluid" alt="">
                    </a>
                </div>
            </div>
        @empty
            <p>Album tidak memiliki foto.</p>
        @endforelse
    </div>
@endsection
