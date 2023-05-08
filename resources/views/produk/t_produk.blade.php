@extends('layout.main_a')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Tambah Produk</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item">Products</li>
          <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Daftar Produk</a></li>
          <li class="breadcrumb-item active">Tambah Produk</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section" style="border-radius: 40px;">
        <div class="row">
            <div class="col-xl-12">
                <div class="card pt-2">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Data Produk</h5>
                        @if($errors->any())
                            <div class="alert alert-danger" role="alert" style="margin-top:4px">
                                @foreach($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h6 style="margin-top:12px">Kategori Produk</h6>
                                <select class="form-select" name="category_id" aria-label="Default select example">
                                <option value="">--Pilih--</option>
                                @foreach ($kategori as $kat)
                                    <option value="{{ $kat->id }}">{{ $kat->category_name }}</option>
                                @endforeach
                                </select>
                            <h6 style="margin-top:16px">Nama Produk</h6>
                                <input class="form-control" name="product_name" type="text" placeholder="Nama Produk" aria-label="default input example">
                            <h6 style="margin-top:16px">Harga Produk</h6>
                                <input class="form-control" name="product_price" type="text" placeholder="Harga" aria-label="default input example">
                            <h6 style="margin-top:16px">Pilih Gambar Produk</h6>
                                <input type="file" name="product_image" class="form-control"  class="file-upload">
                            <h6 style="margin-top:16px">Deskripsi Produk</h6>
                                <div class="form-floating">
                                    <textarea class="form-control" name="product_description" placeholder="Deskripsi" style="height: 100px"></textarea>
                                </div>
                            <h6 style="margin-top:16px">Status Produk</h6>
                                <select class="form-select" name="product_status" aria-label="Default select example">
                                    <option selected>--Pilih--</option>
                                    <option value="1" {{ 1 }}>Aktif</option>
                                    <option value="0" {{ 0 }}>Tidak Aktif</option>
                                </select>
                            <input style="margin-top:24px;" type="submit" name="submit" value="Submit" class="btn btn-primary">
                            <h6 style="padding-top:10px;">klik
                                <a href="{{ route('produk.index') }}" style="color:#0e45fc;">disini</a> untuk kembali
                            </h6>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


  </main><!-- End #main -->

  @endsection
