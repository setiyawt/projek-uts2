@extends('layout.main_a')

@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
        <h1>Edit Admin</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Pengelolaan Admin</li>
            <li class="breadcrumb-item"><a href="/admin">Data Admin</a></li>
            <li class="breadcrumb-item active">Edit Admin</li>
            </ol>
        </nav>
        </div><!-- End Page Title -->


        <section class="section" style="border-radius: 40px;">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card pt-2">
                        <div class="card-body">
                            <h5 class="card-title">Edit Data Admin</h5>
                            @if($errors->any())
                                <div class="alert alert-danger" role="alert" style="margin-top:4px">
                                    @foreach($errors->all() as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </div>
                            @endif
                            <form action="/admin/{{ $user->id }}/edit" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h6>Name</h6>
                                <input class="form-control" name="name" value="{{ $user->name }}" id="name" type="text" aria-label="default input example" style="margin-top: 10px">
                                <br>
                                <h6>Phone</h6>
                                <input class="form-control" name="telepon" value="{{ $user->telepon }}" id="telepon" type="text"aria-label="default input example" style="margin-top: 10px">
                                <br>
                                <h6>Email</h6>
                                <input class="form-control" name="email" value="{{ $user->email }}" id="email" type="text" aria-label="default input example" style="margin-top: 10px">
                                <br>
                                <h6>Address</h6>
                                <input class="form-control" name="alamat" value="{{ $user->alamat }}" id="alamat" type="text" aria-label="default input example" style="margin-top: 10px">
                                <br>
                                <h6>Foto Profil</h6>
                                <img src="{{ asset('global/user') }}/{{ $user->image }}" width="100px">
                                <input type="hidden" name="foto" value="{{ asset('global/user') }}/{{ $user->image }}">
                                <input type="file" name="image" class="input-control"  class="file-upload">
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
