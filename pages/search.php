<?php
	require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/session.php';
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<?php isset($_GET['search']) ? $title= $_GET['search'] . ' | Recherche' : $title='Recherche'; require $root . 'pages/globals/head.php';?>

    <body>
		<?php include $root . 'pages/globals/header.php';?>
        <main id="main_search">
        <?php if(isset($_GET['search']) && $_GET['search']){?>
            <section id="search_results">
                <?php include $root . 'pages/search/results.php';?>
            </section>
            <div class="suggestions_text"><p>Suggestions</p><span class="line"></span></div>
            <section class="suggestions">
                <?php $sugg_qty=5; include realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/panier/suggestions.php';?>
            </section>
        <?php }

        else{?>
            <section id="nosearch"><p>Il semblerait que vous n'ayez saisit aucun terme à rechercher.<br>
            <a href="/boutique/index.php">Accueil</a></p></section>
        <?php } ?>
        </main>
        <?php include $root . 'pages/globals/footer.php';?>
    </body>
</html>