@extends('layout.main_a')

@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Daftar Admin</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Pengelolaan Admin</li>
                <li class="breadcrumb-item active">Data Admin</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card pt-2">
                        <div class="card-body">
                            <h5 class="card-title">Tabel Admin</h5>
                            @if(session('success'))
                                <div class="alert alert-success" role="alert" style="margin-top:4px">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <a href="/admin/tambah"><button type="button" class="btn btn-primary">Tambah Data</button></a>
                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">No. Telp</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Foto Profil</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($user as $hasil)
                                        @if( ($hasil->role) == 1 )
                                            <tr>
                                                <th>{{ $no++ }}</th>
                                                <td>{{ $hasil->name }}</td>
                                                <td>{{ $hasil->telepon }}</td>
                                                <td>{{ $hasil->email}}</td>
                                                <td>{{ $hasil->alamat }}</td>
                                                <td>
                                                    <a href="{{ asset('global/user') }}/{{ $hasil->image }}" target="_blank">
                                                        <img src="{{ asset('global/user') }}/{{ $hasil->image }}" width="100px">
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="/admin/{{ $hasil->id }}/edit" class="btn btn-primary">Edit</a>
                                                    <a href="/destroy/{{ $hasil->id }}/edit" class="btn btn-danger">Hapus</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        <!-- End Default Table Example -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

  @endsection
