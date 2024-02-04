@extends('layouts.bone')
@section('title', 'Table Foto')
@section('content')
    @include('components.navbar')
    <div class="table-responsive  mx-auto p-5">
        <table class="table">
            <thead>
                <a href="table/export-pdf" class="btn btn-primary mb-4">Export ke PDF</a>
                <tr>
                    <th>#</th>
                    <th>Judul Foto</th>
                    <th>Nama Album</th>
                    <th>Pembuat</th>
                    <th>Lokasi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fotoList as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->album->nama }}</td>
                        <td>{{ $data->user->name }}</td>
                        <td>{{ $data->lokasi }}</td>
                        <td>
                            <a href="{{ route('foto.show', $data->id) }}">Detail</a> |
                            <a href="{{ route('foto.delete', $data->id) }}"> Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

