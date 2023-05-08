@extends('layout.main')

@section('content')

    <section id="page-header" class="about-header">
        <h2>#Let's_Talk</h2>
        <p>LEAVE A MESSANGE, We love to hear from you!</p>
    </section>

    <section id="contact-details" class="section-p1">
        <div class="details">
            <span>GET IN TOUCH</span>
            <h2>Visit one of our agency locations or contact us today</h2>
            <h3>Head Office</h3>
            <div>
                <li>
                    <i class="fal fa-map"></i>
                    <p>alamat itenas</p>
                </li>
                <li>
                    <i class="far fa-envelope"></i>
                    <p>letshop@gmail.com</p>
                </li>
                <li>
                    <i class="fas fa-phone-alt"></i>
                    <p>+62 22 7272215</p>
                </li>
                <li>
                    <i class="far fa-clock"></i>
                    <p>Monday to Saturday: 9am to 16pm</p>
                </li>
            </div>
        </div>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9386658792364!2d107.63400411431692!3d-6.897939469419524!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7bb26b63b69%3A0x9ed5cea73b538ee0!2sInstitut%20Teknologi%20Nasional%20Bandung!5e0!3m2!1sid!2sid!4v1670156165160!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <section id="form-details">
        <form action="">
            <span>LEAVE A MESSAGE</span>
            @if(!Auth::check())
                <h2>We love to hear from you</h2>
                <input type="text" placeholder="Your Name">
                <input type="text" placeholder="E-mail">
                <input type="text" name="judul" placeholder="Subject">
                <textarea name="pesan" id="" cols="30" rows="10" placeholder="Your Message"></textarea>
                <button class="normal">Submit</button>
            @else
                <h2>We love to hear from you {{ auth()->user()->name }}!</h2>
                <input type="text" name="judul" placeholder="Subject">
                <textarea name="pesan" id="" cols="30" rows="10" placeholder="Your Message"></textarea>
                <button class="normal">Submit</button>
            @endif
        </form>
    </section>

@endsection
