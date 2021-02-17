<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../css/boutique.css?v=<?php echo time(); ?>">
        <link rel="icon" href="/boutique/assets/images/icon.png" />
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
                <label for="email">Adresse mail :</label>
                <input type="email" name="email" required>
                <div id="contact_infos">
                    <div class="contact_infos_flex">
                        <label for="nom">Nom :</label>
                        <input type="text" name="nom" required>
                    </div>
                    <div class="contact_infos_flex">
                        <label for="prenom">Prénom :</label>
                        <input type="text" name="prenom" required>
                    </div>
                </div>
                <label for="subject">Sélectionner un motif :</label>
                <select name="subject">
                    <optgroup label="Informations & Renseignements">
                        <option value="info_req">Demande d'informations</option>
                        <option value="devis_req">Obtenir un devis</option>
                    </optgroup>
                    <optgroup label="Assistance">
                        <option value="bugsignal_req">Signaler un bug, un problème</option>
                        <option value="bugsignal_req">Suivre ma commande</option>
                        <option value="bugsignal_req">Je ne trouve pas ma commande</option>
                        <option value="bugsignal_req">Je n'ai pas reçu de mail de confirmation</option>
                        <option value="bugsignal_req">Je n'arrive pas à me connecter</option>
                    </optgroup>
                    <optgroup label="Carrières & Recrutement">
                        <option value="infojob_req">Renseignements sur le recrutement</option>
                        <option value="job_req">Candidature spontanée</option>
                    </optgroup>
                    <optgroup label="Confidentialité">
                        <option value="privacy_req">Droit d'accès aux données</option>
                    </optgroup>
                </select>
                <label for="message">Saissez votre message :</label>
                <textarea name="comment" placeholder="Bonjour, je vous contacte car..." minlenght="30" maxlenght="500" rows="5" cols="40" required></textarea><br>
                <div id="checkbox_newsletter" class="checkbox_contact">
                    <input type="checkbox" name="consent" required>
                    <label for="consent" id="label_consent">Je reconnais avoir lu les <a href="/boutique/pages/mentions.php">termes et conditions</a> 
                    et accepte de recevoir des communications de la part de Von Harper© dans le cadre de ma demande.</label>
                </div>
                <input type="submit" value="Envoyer">
            </form>
        </section>
		<?php require 'footer.php';?>
    </body>
</html>