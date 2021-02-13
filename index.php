<?php

?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/boutique.css?v=<?php echo time(); ?>">
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
				<figure class="watch_min">
					<img src="assets/product-images/audemars-code1159/front-nobg.png">
					<figcaption><h3>Van Cleef & Arpels</h3>Description de la montre lorem ipsum lorem ipsum lorem ipsum</figcaption>
				</figure>
				<figure class="watch_min">
					<img src="assets/product-images/audemars-code1159/front-nobg.png">
					<figcaption><h3>Hublot</h3>Description de la montre lorem ipsum lorem ipsum lorem ipsum</figcaption>
				</figure>
				<figure class="watch_min">
					<img src="assets/product-images/audemars-code1159/front-nobg.png">
					<figcaption><h3>Audemars Piguet</h3>Description de la montre lorem ipsum lorem ipsum lorem ipsum</figcaption>
				</figure>
				<figure class="watch_min">
					<img src="assets/product-images/audemars-code1159/front-nobg.png">
					<figcaption><h3>Blancpain</h3>Description de la montre lorem ipsum lorem ipsum lorem ipsum</figcaption>
				</figure>
			</section>
			<section id="banner">
				<div id="banner_desc">
					<h2>Omega</h2>
					<p>Description de la marque et du modèle lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum</p>
				</div>
			</section>
			<section id="staring2">
				<figure class="watch_min">
					<img src="assets/product-images/audemars-code1159/front-nobg.png">
					<figcaption><h3>Omega</h3>Description de la montre lorem ipsum lorem ipsum lorem ipsum</figcaption>
				</figure>
				<figure class="watch_min">
					<img src="assets/product-images/audemars-code1159/front-nobg.png">
					<figcaption><h3>Omega</h3>Description de la montre lorem ipsum lorem ipsum lorem ipsum</figcaption>
				</figure>
				<figure class="watch_min">
					<img src="assets/product-images/audemars-code1159/front-nobg.png">
					<figcaption><h3>Omega</h3>Description de la montre lorem ipsum lorem ipsum lorem ipsum</figcaption>
				</figure>
				<figure class="watch_min">
					<img src="assets/product-images/audemars-code1159/front-nobg.png">
					<figcaption><h3>Omega</h3>Description de la montre lorem ipsum lorem ipsum lorem ipsum</figcaption>
				</figure>
			</section>
			<div class="separator">
			</div>
			<section id="quote">
				<p>“Citation qui n'a strictement aucun sens pour gens fortunés.”</p><p>_Edwin Von Harper</p>
			</section>
		</main>

		<footer>
			<div id="footer_logo"><h1><span class="h1font">V</span>on <span class="h1font">H</span>arper</h1></div>
			<div id="footer_nav">
				<div id="footer_links">
					<ul id="footer_ul">
						<li><a href="">Newsletter</a></li>
						<li><a href="">Nous contacter</a></li>
						<li><a href="">Mentions légales</a></li>
						<li><a href="">Suivi de commande</a></li>
					</ul>
				</div>
				<div id="footer_social">
					<ul id="social_icons">
						<li><a href=""><i class="fab fa-facebook-square"></i></a></li>
						<li><a href=""><i class="fab fa-instagram-square"></i></a></li>
						<li><a href=""><i class="fab fa-twitter-square"></i></a></li>
						<li><a href=""><i class="fab fa-youtube-square"></i></a></li>
					</ul>
				</div>
			</div>
		</footer>
    </body>
</html>