@extends('layouts.bone')
@section('title', 'Login')
@section('content')
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Daftar Membuat Akun Anda</h5>
                                    <p class="text-center small">Isi email, nama dan password untuk daftar</p>
                                </div>
                                <form class="row g-3 needs-validation" form role="form" method="POST">
                                    @csrf
                                    <div class="col-12">
                                        <label for="name" class="form-label">Nama</label>
                                        <div class="input-group has-validation">
                                            <input type="text" name="name" id="name" class="form-control"
                                                required>
                                            <div class="invalid-feedback">Tolong masukan nama.</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="namalengkap" class="form-label">Nama Lengkap</label>
                                        <div class="input-group has-validation">
                                            <input type="text" name="namalengkap" id="namalengkap" class="form-control"
                                                required>
                                            <div class="invalid-feedback">Tolong masukan nama lengkap.</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <div class="input-group has-validation">
                                            <input type="text" name="alamat" id="alamat" class="form-control"
                                                required>
                                            <div class="invalid-feedback">Tolong masukan nama lengkap.</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="email" class="form-label">Email</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="email" name="email" id="email" class="form-control"
                                                required>
                                            <div class="invalid-feedback">Tolong masukan email.</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" required>
                                        <div class="invalid-feedback">Tolong masukan password!</div>
                                    </div>
                                    <div class="col-12">
                                        <input type="hidden" name="role_id" id="role_id" value="2">
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 mb-3" type="submit">Daftar</button>
                                    </div>
                                </form>
                                <p class="text-center small mt-2">
                                    <a href="/" class="">Punya Akun Masuk Sekarang</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
