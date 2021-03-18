<?php 
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/session.php';
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<?php $title='Suivi'; require $root . 'pages/globals/head.php';?>

    <body id="body_tracking">
        <?php include $root . 'pages/globals/header.php';?>
        <section id="banner_standard">
            <h2>Suivi de commande</h2>
        </section>
        <section id="tracking_block">
            <p>Pour accéder au suivi de votre commande, munissez-vous de votre adresse mail, de votre code postal, 
            et de votre numéro de commande accessible sur votre espace client, ou dans le mail de confirmation de commande.</p>
            <form method="post" action="">
                <label for="ordernum">Numéro de commande :</label>
                <input type="number" name="ordernum" required>
                <label for="postal">Code postal :</label>
                <input type="number" pattern="[0-9]{5}" required>
                <label for="mail">Adresse mail :</label>
                <input type="email" name="mail" required>
                <input type="submit" value="Valider">
            </form>
        </section>
		<?php include $root . 'pages/globals/footer.php';?>
    </body>
</html>