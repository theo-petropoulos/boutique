<?php
	require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/session.php';
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/boutique.css?v=<?php echo time(); ?>">
        <link rel="icon" href="/boutique/assets/images/icon.png" />
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Beth+Ellen&family=Bodoni+Moda&display=swap" rel="stylesheet">
		<script src="https://kit.fontawesome.com/9ddb75d515.js" crossorigin="anonymous"></script>
		<title>Von Harper</title>
	</head>

    <body>
		<?php include realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/header.php';?>
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
		<?php include realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/footer.php';?>
    </body>
</html>