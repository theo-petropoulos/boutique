<?php 
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/session.php';
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<?php $title='Contact'; require $root . 'pages/globals/head.php';?>

    <body>
        <?php include $root . 'pages/globals/header.php';?>
        <section id="banner_standard">
            <h2>Formulaire de contact</h2>
        </section>
        <?php if( 
            (!isset($_POST['email']) || !$_POST['email']) && (!isset($_POST['nom']) || $_POST['nom']) && 
            (!isset($_POST['comment']) || !$_POST['comment']) ) { ?>
        <section id="form_contact">
            <form method="post" action="contact.php">
                <label for="email">Adresse mail* :</label>
                <input type="email" name="email" required>
                <div id="contact_infos">
                    <div class="contact_infos_flex">
                        <label for="nom">Nom* :</label>
                        <input type="text" name="nom" required>
                    </div>
                    <div class="contact_infos_flex">
                        <label for="prenom">Prénom* :</label>
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
            <div id="cond_newsletter">
                <p class="tinytext">
                    * Information obligatoire<br>
                    Les informations recueillies à partir de ce formulaire d'inscription font l’objet d’un traitement informatique
                    destiné à Von Harper© afin de vous proposer des produits et services adaptés à vos intérêts, 
                    de vous permettre d'accéder aux services du site ainsi qu'à des services spécifiques et de faciliter
                    le fonctionnement administratif et technique du site (plus de précisions dans le cadre de notre politique d'utilisation
                    des données). Vos données sont conservées en France durant 3 ans à compter de votre dernier contact avec le site
                        vonharper.com. Les données non facultatives sont indiquées dans le formulaire par la présence d'un astérisque : *.
                        Conformément à loi « informatique et Libertés » du 6 janvier 1978 modifiée, vous bénéficiez d’un droit d’accès, 
                        de rectification et d'opposition aux informations qui vous concernent. Vous disposez d'un droit d'opposition, 
                        pour des motifs légitimes, aux traitements vous concernant et vous pouvez vous opposer à tout moment aux traitements
                        de la prospection commerciale. Vous disposez également du droit de définir des directives relatives au sort de ses 
                        données après votre décès. Si vous souhaitez exercer ces droits et obtenir communication des informations vous 
                        concernant, veuillez vous adresser à privacy@vonharper.com.
                </p>
            </div>
        </section>
        <?php } else{ ?>
            <section id="form_return">
                <p> Votre message a bien été envoyé. Vous allez recevoir un mail de confirmation.<br>
                    Notre équipe vous répondra dans un 
                    délai de 48 à 72h hors week-end et périodes de fêtes.<br>
                    Retour à l'<a class="strtxt" href="/boutique/index.php">Accueil</a>.</p>
            </section>
        <?php } ?>
		<?php include $root . 'pages/globals/footer.php';?>
    </body>
</html>