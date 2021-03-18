<?php
	require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/session.php';
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<?php $title='Von Harper'; require $root . 'pages/globals/head.php';?>

    <body>
		<?php include $root . 'pages/globals/header.php';?>
		<main id="main_index">
			<section id="video_container">
				<video playsinline autoplay muted loop id="bg_vid">
					<source src="assets/videos/blancpain.mp4" type="video/mp4">
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
		<?php include $root . 'pages/globals/footer.php';?>
    </body>
</html>