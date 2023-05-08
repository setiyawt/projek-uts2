@extends('layout.main')

@section('content')

    <section id="prodetails" class="section-p1">
        <div class="single-pro-image">
            <img src="{{ asset('global/produk') }}/{{ $produk->product_image }}" width="100%" id="MainIng" alt="">
        </div>
        <div class="single-pro-details">
            <h6><a href="{{ route('index') }}">Home</a> /
                {{ $produk->class['category_name'] }}
            </h6>
            <h4>{{ $produk->product_name }}</h4>
            <h2>Rp <td>{{ number_format($produk->product_price, 2) }}</td></h2>
            <h4>Product Details</h4>
            <span>{{ $produk->product_description}}</span>
        </div>
    </section>

@endsection
