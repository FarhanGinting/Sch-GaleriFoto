@extends('layouts.bone')
@section('title', 'All Album')
@section('content')
    @include('components.navbar')

    <section class="best-items">
        <div class="container">
            <div class="row text-center mb-50">
                <div class="col-lg-12">
                    <img src="{{ asset('images/star.png') }}" height="42" alt="" class="mb-16">
                    <h3 class="big-header">
                        Album Yang Anda Miliki
                    </h3>
                    <p class="paragraph">
                        Beberapa Album yang anda Miliki

                    </p>
                </div>
            </div>

            <div class="my-3 mb-5 d-flex justify-content-between">
                <p class=""><a href="{{ route('album.create') }}" class="btn btn-primary">Tambah Album</a></p>
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
                @foreach ($albumList as $album)
                    <div class="col-lg-3">
                        <div class="item">
                            @if ($album->last_foto)
                                <a href="{{ route('album.show', $album->id) }}">
                                    <img src="{{ $album->last_foto }}" alt="" class="img-fluid">
                                </a>
                            @else
                                <img src="{{ asset('images/image-not.png') }}" alt="" class="img-fluid">
                            @endif
                            <div class="info">
                                <a href="{{ route('album.show', $album->id) }}">
                                    <h3 class="small-header mb-2">
                                        {{ $album->nama }}
                                    </h3>
                                </a>
                                <div class="footer">
                                    <div class="location d-flex flex-row ">
                                        <img src="{{ asset('images/ic_loc.svg') }}" height="20" alt="">
                                        <p class="small-paragraph mb-0">
                                            {{ $album->tanggal }}
                                        </p>
                                    </div>
                                    <div class="price">
                                        <p class="mb-0">
                                            {{ $album->foto_count }} Foto
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
