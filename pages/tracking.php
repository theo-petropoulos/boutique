<?php 
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/session.php';
    if(isset($_POST) && $_POST){
        $_POST['ordernum']=intval($_POST['ordernum']);
        $_POST['postal']=intval($_POST['postal']);
        $return=verify_order($_POST, $db);
    }
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<?php $title='Suivi'; require $root . 'pages/globals/head.php';?>

    <body id="body_tracking">
        <?php include $root . 'pages/globals/header.php';?>
        <section id="banner_standard">
            <h2>Suivi de commande</h2>
        </section>
        <?php if(!isset($return) || !$return ){?>
            <section id="tracking_search">
                <p class="smalltxt">Pour accéder au suivi de votre commande, munissez-vous de votre adresse mail, de votre code postal, 
                et de votre numéro de commande accessible sur votre espace client, ou dans le mail de confirmation de commande.</p>
                <form method="post" action="">
                    <label for="ordernum">Numéro de commande :</label>
                    <input type="number" name="ordernum" required>
                    <label for="postal">Code postal :</label>
                    <input type="number" pattern="[0-9]{5}" name="postal" required>
                    <label for="mail">Adresse mail :</label>
                    <input type="email" name="mail" required>
                    <input type="submit" value="Valider">
                </form>
            </section>
        <?php } else if(isset($return) && $return){
            ?><section id="tracking_result"><?php
            switch(1){
                case is_array($return):
                    ?><p>La commande n°<span class="strtxt"><?=$_POST['ordernum'];?></span> en date du 
                    <span class="strtxt"><?=date('d-m-Y', strtotime($return['date']));?></span> à destination du 
                    <span class="strtxt"><?=$return['code_postal'];?></span> 
                    <?php switch($return['etat']){
                        case 'Payé':
                            ?>a été <span class="strtxt">validée</span>.<br>
                            Elle est actuellement est en cours de <span class="ita">traitement</span> et nos équipes 
                            s'occuperont prochainement de sa <span class="ita">préparation</span>.
                            <?php break;
                        case 'En préparation':
                            ?>est <span class="strtxt">en cours de préparation</span>.<br>
                            Nos équipes préparent actuellement votre colis. Dès que votre commande sera expédiée, vous recevrez un 
                            mail de confirmation comportant votre numéro de suivi.<?php
                            break;
                        case 'En livraison':
                            ?>est <span class="strtxt">en cours de livraison</span>.<br>
                            Tous vos articles ont bien été expédiés, vous pouvez suivre votre commande via ce lien : --A définir--<?php
                            break;
                        case 'Livré':
                            ?>a été <span class="strtxt">livrée</span>. <br>Si vous n'avez pas reçu votre commande, veuillez nous contacter via 
                            notre <a href="/boutique/pages/contact.php">formulaire de contact</a>.<?php
                            break;
                        default:
                            break;
                    }?>
                    </p>
                    <?php break;
                case $return=='nofind':
                    ?><p>Nous n'avons trouvé aucune commande associée à ce numéro et/ou ce code postal et/ou cette adresse mail. <br>Veuillez 
                    vérifier les informations et <a href="tracking.php">essayer</a> de nouveau.</p>
                    <?php break;
                case $return=='errinput':
                    ?><p>Certaines données que vous avez saisies sont invalides. Le numéro de commande ainsi que le code postal ne 
                    doivent être composés que de chiffres, et l'adresse mail doit être au format xxx@yyy.zzz. <br>Veuillez 
                    <a href="tracking.php">réessayer</a>.</p>
                    <?php break;
                default:
                    die("Une erreur inattendue est survenue.");
                    break;
            }
        ?></section><?php }
		include $root . 'pages/globals/footer.php';?>
    </body>
</html>