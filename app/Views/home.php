<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to CodeIgniter 4!</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css') ?>">
</head>
<body>

<!-- HEADER: MENU + HEROE SECTION -->
<header>
	<div class="menu">
		<ul>
			<li class="logo logo-text" style="">Recipe Blog</li>
			<li class="menu-toggle">
				<button onclick="toggleMenu();">&#9776;</button>
			</li>
			<li class="menu-item hidden"><a href="#">Home</a></li>
			<li class="menu-item hidden"><a href="#" target="_blank">Docs</a>
			</li>
			<li class="menu-item hidden"><a href="https://forum.codeigniter.com/" target="_blank">Login</a></li>
		</ul>
	</div>

	<div class="heroe">
		<h1>Welcome to our recipe application</h1>
		<h2>Made with love with CodeIgniter framework<?= CodeIgniter\CodeIgniter::CI_VERSION ?></h2>
		<br><br><br><br>
		<br><br><br><br>
	</div>
</header>

<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->
<footer>
	<div class="environment">
		<p>Page rendered in {elapsed_time} seconds</p><hr>
		<p>Environment: <?= ENVIRONMENT ?></p>
	</div>
	<div class="copyrights">
		<p>&copy; <?= date('Y') ?>, Developed by Gadrawingz</p>

	</div>
</footer>
<!-- SCRIPTS -->
<script>
	function toggleMenu() {
		var menuItems = document.getElementsByClassName('menu-item');
		for (var i = 0; i < menuItems.length; i++) {
			var menuItem = menuItems[i];
			menuItem.classList.toggle("hidden");
		}
	}
</script>

<!-- -->
</body>
</html>
