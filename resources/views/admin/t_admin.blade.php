@extends('layout.main_a')

@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
        <h1>Tambah Admin</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Pengelolaan Admin</li>
            <li class="breadcrumb-item"><a href="/admin">Data Admin</a></li>
            <li class="breadcrumb-item active">Tambah Admin</li>
            </ol>
        </nav>
        </div><!-- End Page Title -->


        <section class="section" style="border-radius: 40px;">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card pt-2">
                        <div class="card-body">
                            <h5 class="card-title">Tambah Data Admin</h5>
                            <form action="{{ route('aksitambah') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h6>Name</h6>
                                <input class="form-control" name="name" type="text" placeholder="Nama Lengkap..." aria-label="default input example" style="margin-top: 10px">
                                <br>
                                <h6>Username</h6>
                                <input class="form-control" name="username" type="text" placeholder="Username... " aria-label="default input example" style="margin-top: 10px">
                                <br>
                                <h6>Password</h6>
                                <input class="form-control" name="password" type="password" placeholder="Password..." aria-label="default input example" style="margin-top: 10px">
                                <br>
                                <h6>Nomor Telepon</h6>
                                <input class="form-control" name="telepon" type="text" placeholder="Nomor Telepon..." aria-label="default input example" style="margin-top: 10px">
                                <br>
                                <h6>Email</h6>
                                <input class="form-control" name="email" type="email" placeholder="Email..." aria-label="default input example" style="margin-top: 10px">
                                <br>
                                <h6>Alamat</h6>
                                <input class="form-control" name="alamat" type="text" placeholder="Alamat..." aria-label="default input example" style="margin-top: 10px">
                                <br>
                                <h6>Foto Profil</h6>
                                <input type="file" name="image" class="input-control" style="margin-top: 10px">
                                <br>
                                <input style="margin-top:20px;" type="submit" name="submit" value="Submit" class="btn btn-primary">
                                <h6 style="padding-top:10px;">klik
                                    <a href="/admin" style="color:#0e45fc;">disini</a> untuk kembali
                                </h6>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </main><!-- End #main -->

@endsection
