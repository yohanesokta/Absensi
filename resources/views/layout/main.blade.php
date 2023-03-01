<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Absen</title>
	<link rel="stylesheet" href="/css/home.style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
	@yield('newmeta')
</head>
<body>
	<nav>
		<div class="profile">
			<h1>{{ $headerTab }}</h1>
		</div>
			<a href="/setting" class="notif">
				<i class="fa-solid fa-gear"></i>
			</a>
	</nav>
	<div class="navbar-buttom">
		<div class="nb-menu">
			<a href="/" class="home @if($main == 'home')active @endif" onclick="model.style.display='flex'">
				<i class="fa-solid fa-house-user"></i>
			</a>
			<a href="/absen" class="menu 
			@if($main == 'menu')
				active
			@endif">
				<i class="fa-solid fa-bars"></i>
			</a>
			<a href="/view" class="menu-profile @if($main == 'profile')
				active
			@endif" onclick="model.style.display='flex'">
				<i class="fa-solid fa-user"></i>
			</a>	
		</div>
	</div>
	<div class="m-void">
		<div class="void">
			@yield('content-void')
		</div>
	</div>
		<script>
		let model = document.getElementById('blank');
		model.style.display = 'none';
	</script>
</body>
</html>
