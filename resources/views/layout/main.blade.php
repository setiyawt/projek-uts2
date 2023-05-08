<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Let'shop</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link href="{{ asset('global/css') }}/styleuser.css " rel="stylesheet">
</head>
<body>
    @include('layout.header');

    @yield('content')

    @if(!Auth::check())
        <section id="newsletter" class="section-p1 section-m1">
            <div class="newstext">
                <h4>Sign Up For Newsletters</h4>
                <p>Get Email updates about our latest shop and <span>special offers</span></p>
            </div>
            <div class="form">
                <input type="text" placeholder="Your Email Address">
                <button class="normal">Sign Up</button>
            </div>
        </section>
    @else
        <section id="newsletter" class="section-p1 section-m1">
            <div class="newstext">
                <h4>By logging in, You're already signed up for our newsletter program!</h4>
                <p>You'll get Email updates about our latest shop and <span>special offers</span></p>
            </div>
        </section>
    @endif

    @include('layout.footer');

    <script src="{{ asset('global/js') }}script.js"></script>
</body>
</html>
