@extends('layout.main_a')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Tambah Kategori</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item">Products</li>
          <li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Daftar Kategori</a></li>
          <li class="breadcrumb-item active">Tambah Kategori</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-xl-12">
                <div class="card pt-2">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Data Kategori</h5>
                        @if($errors->any())
                            <div class="alert alert-danger" role="alert" style="margin-top:4px">
                                @foreach($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h6>Nama Kategori</h6>
                            <input type="text" name="category_name" placeholder="Nama Kategori" class="form-control">
                            <br>
                            <h6>Pilih Gambar Kategori</h6>
                            <input type="file" name="category_image" class="form-control"  class="file-upload">
                            <br>
                            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                            <h6 style="padding-top:10px;">klik
                                <a href="{{ route('kategori.index') }}" style="color:#0e45fc;">disini</a> untuk kembali
                            </h6>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


  </main><!-- End #main -->
