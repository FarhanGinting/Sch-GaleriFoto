@extends('layouts.bone')
@section('title', 'Add New')
@section('content')
    @include('components.navbar')
    <section class="section">
        <div class="row mx-auto p-5">

            <div class="d-flex justify-content-center">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mt-3 mb-4">Form Album</h5>

                        <!-- Vertical Form -->
                        <form method="POST" action="{{ route('album.store') }}" class="row g-3" >
                            @csrf

                            <div class="col-12">
                                <label class="form-label">Judul Album</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">📷</span>
                                    <input type="text" name="nama" id="nama" class="form-control">
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Deskripsi Album</label>
                                <input type="text" name="deskripsi" class="form-control" id="deskripsi" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" id="tanggal" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Username</label>
                                <div class="input-group has-validation">
                                    <select name="UserID" id="UserID" class="form-control">
                                        <option value="">Pilih User</option>
                                        @foreach ($userCB as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center column-gap-4 mt-5 mb-4">
                                <a href="/" class="btn btn-secondary" style="margin-right: 20px;">Cancel</a>
                                <button type="submit" name="simpan" class="btn btn-primary" value="Simpan">Submit</button>
                            </div>                            
                        </form>
                        <!-- Vertical Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
