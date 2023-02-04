<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Absen</title>
	<link rel="stylesheet" href="/css/home.style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>
	<nav>
		<div class="profile">
			<h1>{{ $headerTab }}</h1>
		</div>
		<div class="notif">
			<i class="fa-solid fa-bell"></i>
		</div>
	</nav>
	<div class="navbar-buttom">
		<div class="nb-menu">
			<a href="/" class="home @if($main == 'home')active @endif">
				<i class="fa-solid fa-house-user"></i>
			</a>
			<div class="menu 
			@if($main == 'menu')
				active
			@endif">
				<i class="fa-solid fa-bars"></i>
			</div>
			<a href="/view" class="menu-profile @if($main == 'profile')
				active
			@endif">
				<i class="fa-solid fa-user"></i>
			</a>	
		</div>
	</div>
	<div class="m-void">
		<div class="void">
			@yield('content-void')
		</div>
	</div>
</body>
</html>