<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Form | Let'shop</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('global/css') }}/style-login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
	<img class="wave" src="{{ asset('global/admin/assets/img') }}/wave.jpg">
	<div class="container">
		<div class="img">
			<img src="{{ asset('global/admin/assets/img') }}/shopping.svg">
		</div>
		<div class="login-content">
			<form action="{{ route ('loginaksi') }}" method="POST">
                @csrf
				<img src="{{ asset('global/admin/assets/img') }}/logo.png">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <input type="text" name="username" placeholder="Username" class="input">
                    </div>
           		</div>
           		<div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <input type="password" name="password" placeholder="Password" class="input">
                    </div>
            	</div>
                @if ($errors->any())
                    <h5>Username atau Password anda tidak Valid!</h5>
                @endif
				<input type="submit" name="submit" value="Login" class="btn">
				<h4>Don't have an account?<a href="/register" style="text-align:center;"> Register Now!</a></h4>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('global/admin/assets/js') }}/main.js"></script>
</body>
</html>
