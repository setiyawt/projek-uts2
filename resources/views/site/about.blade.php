@extends('layout.main')

@section('content')

<section id="page-header" class="about-header">
    <h2>#Know_Us</h2>
    <p>We Spoil yourself with our product!</p>
    </section>

    <section id="about-head" class="section-p1">
    <img src="{{ asset('global/css/img') }}/a6.jpg" alt="">
    <div>
        <h2>Who are We?</h2>
        <p>Our purpose at Let'Shop is to help people to lead bold and full lives. We believe that if you look good, you feel good. And when you feel good you can do good for others around you. Let'Shop brings you a wide range of trendy hoodies, jacket, leggings, ext. all at affordable prices to make them accessible to you. </p>
        <abbr title="Hello"></abbr>
        <br>
        <br>
        <marquee bg-color="#ccc" loop="-1" scrollamount="5" width="100%">Let'Shop, look good to feel good</marquee>
    </div>
</section>

@endsection

