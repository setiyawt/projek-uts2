@extends('layout.main')

@section('content')

    <div class="section">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success" role="alert" style="margin-top:4px">
                    <h1>{{ session('success') }}</h1>
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger" role="alert" style="margin-top:4px">
                    <h1>{{ session('error') }}</h1>
                </div>
            @endif
            <h3>Profil</h3>
            <div class="box-kat">
                <form action="/profileuser/{{auth()->user()->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h5 style="display:inline-block;">Nama Lengkap</h5>
                    <br>
                    <input type="text" name="name" class="input-control" style="width: 1100px;" value="&ensp;{{auth()->user()->name}}">
                    <br>
                    <h5 style="display:inline-block;">Username</h5><br>
                    <input type="text" name="username" class="input-control" style="width: 1100px;" value="&ensp;{{auth()->user()->username}}">
                    <br>
                    <h5 style="display:inline-block;">Nomor Telepon</h5><br>
                    <input type="text" name="telepon" class="input-control" style="width: 1100px;" value="&ensp;{{auth()->user()->telepon}}">
                    <br>
                    <h5 style="display:inline-block;">Email</h5><br>
                    <input type="email" name="email" class="input-control" style="width: 1100px;" value="{{auth()->user()->email}}">
                    <br>
                    <h5 style="display:inline-block;">Alamat</h5><br>
                    <input type="text" name="alamat" class="input-control" style="width: 1100px;" value="&ensp;{{auth()->user()->alamat}}">
                    <br>
                    <h5 style="display:inline-block;">Gambar</h5><br>
                    <img src="{{ asset('global/user') }}/{{auth()->user()->image}}" width="100px">
                    <input type="hidden" name="foto" value="{{ asset('global/user') }}/{{auth()->user()->image}}">
                    <input type="file" name="image" class="input-control"  class="file-upload"><br>
                    <input type="submit" name="submit" value="Ubah Profil" class="btn-tambah" style="background-color:#fab2d3;"><br>
                </form>
            </div>

            <br><h3>Ubah Password</h3>
            <div class="box-kat">
                <form action="/profileuser/{{auth()->user()->id}}/gantipw" method="POST">
                    @csrf
                    <h5 style="display:inline-block;">Password Lama</h5>
                    <br>
                    <input type="password" name="current_pw" class="input-control">
                    <br>
                    <h5 style="display:inline-block;">Password Baru</h5>
                    <br>
                    <input type="password" name="password" class="input-control">
                    <br>
                    <h5 style="display:inline-block;">Konfirmasi Password Baru</h5>
                    <br>
                    <input type="password" name="confirmpw" class="input-control">
                    <br><input type="submit" name="submit" value="Ubah Password" class="btn-tambah" style="background-color:#fab2d3;">
                </form>
            </div>
        </div>
    </div>

@endsection
