@extends('layout.main_a')

@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
        <h1>Daftar Produk</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Products</li>
            <li class="breadcrumb-item active">Daftar Produk</li>
            </ol>
        </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card pt-2">
                        <div class="card-body">
                            <h5 class="card-title">Tabel Produk</h5>
                            @if(session('success'))
                                <div class="alert alert-success" role="alert" style="margin-top:4px">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <a href="{{ route('produk.create') }}"><button type="button" class="btn btn-primary">Tambah Data</button></a>
                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produk as $no => $hasil)
                                        <tr>
                                            <th>{{ $no+1 }}</th>
                                            <td>{{ $hasil->class['category_name'] }}</td>
                                            <td>{{ $hasil->product_name }}</td>
                                            <td>Rp {{ number_format($hasil->product_price, 2) }}</td>
                                            <td>
                                                <a href="{{ asset('global/produk') }}/{{ $hasil->product_image }}" target="_blank">
                                                    <img src="{{ asset('global/produk') }}/{{ $hasil->product_image }}" width="100px">
                                                </a>
                                            </td>
                                            <td>@if($hasil->product_status==1) <b class="text-success">Aktif</b> @else <b class="text-danger">Tidak Aktif</b> @endif</td>
                                            <td>
                                                <form action="{{ route('produk.destroy', $hasil->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ route('produk.edit', $hasil->id) }}" class="btn btn-primary">Edit</a>
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
