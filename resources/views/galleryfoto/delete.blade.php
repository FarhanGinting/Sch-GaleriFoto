@extends('layouts.bone')
@section('title', 'Confirmation Delete')
@section('content')

    <div class="row house-informations justify-content-center align-items-center h-100">
        <div class="col-lg-7">
            <h3 class="small-header mb-2 mt-4">
                Yakin hapus data perjalanan: {{ $foto->name }} dengan lokasi: ({{ $foto->lokasi }})
            </h3>
            <div class="row features mt-4">
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="info">
                                <a href="/table" class="btn btn-secondary w-100 mt-3">Kembali</a>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="info">
                                <form action="{{ route('foto.destroy', $foto->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger w-100 mt-3" type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
