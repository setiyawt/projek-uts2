@extends('layout.main')

@section('content')

    <section id="page-header">
        <h2>This Week Fashion Sale</h2>
        <p>Save more with coupons & up to 70% off!</p>
    </section>

    <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Summer Collection New Mordern Design</p>
        @include('site.produk')
    </section>

    <section id="pagination" class="section-p1">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#"><i class="fal fa-long-arrow-alt-right"></i></a>
    </section>

@endsection
