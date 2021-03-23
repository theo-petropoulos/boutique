<?php
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/session.php';
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<?php $title='404 - Page non trouvée'; require $root . 'pages/globals/head.php';?>

    <body id="body_404">
        <?php include $root . 'pages/globals/header.php';?>
        <main id="main_404">
            <div class="p">
                <p><span class="giant_text">404.</span></p>
                <p>
                    <span class="big_text_404">Le document demandé n'a pas été trouvé.<br></span>
                    <span class="text_404">Nos montres n'indiquant pas le nord, nous ne saurions retrouver le chemin.<br>
                    Retourner à l'<a href="/boutique/index.php">Accueil</a> ?</span>
                </p>
            </div>
            <?php for($i=0;$i<100;$i++){?>
                <div class="block"></div>
            <?php }?>
        </main>
		<?php include $root . 'pages/globals/footer.php';?>
    </body>
</html>