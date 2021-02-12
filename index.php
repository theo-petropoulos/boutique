<?php

?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/boutique.css">
        <link rel="icon" href="assets/icon.png" />
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Beth+Ellen&family=Bodoni+Moda&display=swap" rel="stylesheet"> 
		<script src="https://kit.fontawesome.com/9ddb75d515.js" crossorigin="anonymous"></script>
		<title>Von Harper</title>
	</head>

    <body>
        <header>
			<h1><span class="h1font">V</span>on <span class="h1font">H</span>arper</h1>
			<div id="nav_bar">
				<div id="nav_bar1">
					<ul id="nav_ul1">
						<li id="nav_nouveautes"><a href="">Nouveautés</a></li>
						<li id="nav_montres"><a href="">Montres</a></li>
						<li id="nav_adresses"><a href="">Points de vente</a></li>
						<li id="nav_apropos"><a href="">À propos</a></li>
						<li id=""
					</ul>
				</div>
				<div id="nav_bar2">
					<ul id="nav_ul2">
						<li id="nav_profil"><a href=""><i class="fas fa-user-tie"></i></a></li>
						<li id="nav_panier"><a href=""><i class="fas fa-shopping-cart"></i></a></li>
						<li id="search_bar">
							<form method="post" action="">
								<input type="text" id="search" name="search">
								<button type="submit"><i class="fas fa-search"></i></button>
							</form>
						</li>
					</ul>
				</div>
			</div>
        </header>

		<main>
			<section id="video_container">
				<video playsinline autoplay muted loop id="bg_vid">
					<source src="assets/videos/planetarium.mp4" type="video/mp4">
					Votre navigateur ne prend pas en charge les vidéos intégrées.
				</video>
			</section>
			<section id="staring1">
				<div class="watch_min">
					<img src="assets/product-images/audemars-code1159/font-nobg.png">
				</div>
			</section>
		</main>
    </body>
</html>