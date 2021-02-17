<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../css/boutique.css?v=<?php echo time(); ?>">
        <link rel="icon" href="assets/icon.png" />
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Beth+Ellen&family=Bodoni+Moda&display=swap" rel="stylesheet">
		<script src="https://kit.fontawesome.com/9ddb75d515.js" crossorigin="anonymous"></script>
		<title>Contact</title>
	</head>

    <body>
        <?php require 'header.php';?>
        <section id="banner_standard">
            <h2>Formulaire de contact</h2>
        </section>
        <section id="form_contact">
            <form method="post" action="contact.php">
                <label for="subject">Sélectionner un motif :</label>
                <select name="subject">
                    <optgroup label="Informations & Renseignements">
                        <option value="info_req">Demande d'informations</option>
                        <option value="devis_req">Obtenir un devis</option>
                    </optgroup>
                    <optgroup label="Groupe 2">
                        <option>Option 2.1</option>
                        <option>Option 2.2</option>
                    </optgroup>
                    <optgroup label="Confidentialité">
                        <option value="privacy_req">Droit d'accès aux données</option>
                    </optgroup>
                </select>
            </form>
        </section>
		<?php require 'footer.php';?>
    </body>
</html>