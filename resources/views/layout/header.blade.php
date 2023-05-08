<section id="header">
    <a href="{{ route('index') }}"><img class="logo" src="{{ asset('global/css/img') }}/logo.png"  alt=""></a>
    <div>
        <ul id="navbar">
            <li><a href="{{ route('index') }}" class="{{Request::is('/')?'active':''}}">Home</a></li>
            <li><a href="{{ route('shop') }}">Shop</a></li>
            <li><a href="{{ route('about') }}" class="{{Request::is('about')?'active':''}}">About</a></li>
            <li><a href="{{ route('contact') }}" class="{{Request::is('contact')?'active':''}}">Contact</a></li>
            @if(!Auth::check())
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
                <li style="padding:0px 10px 0px 0px;">
                    <a href="#"><img src="{{ asset('global/user') }}/{{ auth()->user()->image }}" width="35px" alt="" style="border-radius: 50%;display:inline-block;"></a>
                </li>
                <div class="dropdown">
                    <li style="padding:0px 0px 0px 0px;">
                        <a href="#">{{ auth()->user()->name }}</a>
                    </li>
                    <li></li>
                    <div class="dropdown-content">
                        <a href="/profileuser/{{ auth()->user()->id }}">Profil</a>
                        <a href="{{ route('logout') }}">Keluar</a>
                    </div>
                </div>
            @endif
        </ul>
    </div>
    <div id="mobile">
        <i id="bar" class="fas fa-outdent"></i>
    </div>
</section>
