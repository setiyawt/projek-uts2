<footer class="section-p1">
    <div class="col">
    <img class="logo" src="global/img/logo.png" width="60px"  alt="">
    <h4>Contact</h4>
    <p><strong>Address: </strong>Jl. PH. H. Mustofa No. 23 – Bandung, 40124 Indonesia</p>
    <p><strong>Phone: </strong> +62 22 7272215</p>
        <div class="follow">
            <h4>Follow Us</h4>
            <div class="icon">
                <a href="https://twitter.com/KamuKenalLoh"><i class="fab fa-twitter"></i></a>
                <a href="https://web.facebook.com/ariq.bagussugiharto/"><i class="fab fa-facebook"></i></a>
                <a href="https://www.instagram.com/ariq_b.s/"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
    <div class="col">
        <h4>About</h4>
        <a href="{{ route('about') }}">About Us</a>
        <a href="{{ route('contact') }}">Contact Us</a>
    </div>
    <div class="col">
        <h4>My Account</h4>
        <a href="{{ route('login') }}">Sign In</a>
        <a href="{{ route('register') }}">Register</a>
        <a href="{{ route('logout') }}">Logout</a>
    </div>

    <div class="copyright">
        <p>© 2022 Let'shop. All rights reserved.</p>
    </div>
</footer>
