@extends('layout.main_a')

@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
        <h1>Daftar Kategori</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Products</li>
            <li class="breadcrumb-item active">Daftar Kategori</li>
            </ol>
        </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card pt-2">
                        <div class="card-body">
                            <h5 class="card-title">Tabel Kategori</h5>
                            @if(session('success'))
                                <div class="alert alert-success" role="alert" style="margin-top:4px">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <a href="{{ route('kategori.create') }}"><button type="button" class="btn btn-primary">Tambah Data</button></a>
                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategori as $no => $hasil)
                                        <tr>
                                            <th scope="row">{{ $no+1 }}</th>
                                            <td>{{ $hasil->category_name }}</td>
                                            <td>
                                                <a href="{{ asset('global/kategori') }}/{{ $hasil->category_image }}" target="_blank">
                                                    <img src="{{ asset('global/kategori') }}/{{ $hasil->category_image }}" width="100px">
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('kategori.destroy', $hasil->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ route('kategori.edit', $hasil->id) }}" class="btn btn-primary">Edit</a>
                                                    <button class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> <!-- End Default Table Example -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->

@endsection
