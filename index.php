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
		<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet"> 
		<script src="https://kit.fontawesome.com/9ddb75d515.js" crossorigin="anonymous"></script>
		<title>Von Harper</title>
	</head>

    <body>
		<?php include $root . 'pages/header.php';?>
		<main id="main_index">
			<section id="video_container">
				<video playsinline autoplay muted loop id="bg_vid">
					<source src="assets/videos/planetarium.mp4" type="video/mp4">
					Votre navigateur ne prend pas en charge les vidéos intégrées.
				</video>
			</section>

			<section id="staring1">
				<?php include $root . 'pages/index/staring1.php'; $memrand=$rand?>
			</section>

			<section id="banner">
				<?php include $root . 'pages/index/banner.php';?>
			</section>

			<section id="staring2">
				<?php include $root . 'pages/index/staring1.php'; $memrand=$rand?>
			</section>
			
			<div class="separator">
			</div>
			<section id="quote">
				<p>“Citation qui n'a strictement aucun sens pour gens fortunés.”</p><p>_Edwin Von <span class="color">H</span>arper</p>
			</section>
		</main>
		<?php include $root . 'pages/footer.php';?>
    </body>
</html>