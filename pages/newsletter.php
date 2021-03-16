<?php
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/session.php';

    if(isset($_GET['u']) && $_GET['u']){
        $news=unsub_newsletter($_GET['u']);
    }
    else if(isset($_POST) && $_POST){
        $news=sub_newsletter($_POST);
        if($news!=='alreadysub'){
            $message='newsletter';
            $mail_adress=$_POST['mail'];
            $link='localhost/boutique/pages/newsletter.php?u=' . $mail_adress;
            require $root . 'model/mailer.php';
        }
    }
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<?php $title='Newsletter'; require $root . 'pages/globals/head.php';?>

    <body>
        <?php include $root . 'pages/globals/header.php';?>
        <main id="main_newsletter">
            <section id="banner_standard">
                <h2>Inscription à la Newsletter</h2>
            </section>

            <?php if(!isset($_POST) || !$_POST && !isset($_GET['u'])){?>
            <section id="form_newsletter">
                <form action="newsletter.php" method="post">
                    <label for="mail">Adresse mail* :</label>
                    <input type="email" name="mail" placeholder="exemple@mail.com" required>
                    <div id="checkbox_newsletter">
                        <input type="checkbox" name="consent" required>
                        <label for="consent" id="label_consent">Je reconnais avoir lu les <a href="/boutique/pages/mentions.php">termes et conditions</a> 
                        et accepte de recevoir des communications de la part de Von Harper©. 
                        Je peux à tout moment me rétracter de ce service.</label>
                    </div>
                    <input type="submit" value="Envoyer">
                </form>
            </section>
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
            <?php } else if(isset($_POST) && $_POST || isset($_GET['u'])){?>
                <section id="newsletter_return"><?php
                switch($news){
                    //If user's input isn't correct
                    case 'suberr':?>
                        <p>L'adresse mail est invalide. Veuillez <a href="newsletter.php">réessayer</a>.</p>
                        <?php break;
                    //If user is already registered, update its newsletter status to 1
                    case 'subchanged':?>
                        <p>Vos préférences ont été mises à jour.<br>
                        Retourner à l'<a class="strtxt" href="/boutique/index.php">Accueil</a>.</p>
                        <?php break;
                    //If the mail doesn't exist in the db, add it and set its newsletter status to 1
                    case 'subsuccess':?>
                        <p>Votre inscription a bien été prise en compte.<br>Un e-mail de confirmation vous a été envoyé.</p>
                        <!-- TODO /PHPMAILER/ -->
                        <?php break;
                    //If the user is already sub
                    case 'alreadysub':?>
                        <p>Vous êtes déjà inscrit à notre Newsletter. Nous vous remercions pour votre intérêt.<br>
                        Retourner à l'<a class="strtxt" href="/boutique/index.php">Accueil</a>.</p>
                        <?php break;
                    //If something went wrong
                    default:?>
                        <p>Un problème est survenu. Veuillez <a href="newsletter.php">réessayer</a>.</p>
                        <?php break;
                }
                ?></section><?php
            }?>     
        </main>
        <?php include $root . 'pages/globals/footer.php';?>
    </body>
</html>