<?php
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/session.php';
    require $root . 'model/class/Watch.php';
    require $root . 'model/class/ManWatch.php';

    if(isset($_POST['addbasket']) && $_POST['addbasket']){
        header("Location: panier.php");
    }
    
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<?php $title='Panier'; require $root . 'pages/globals/head.php';?>

    <body>
    <?php include $root . 'pages/globals/header.php';
        ?><main class="basket">
            <section id="banner_standard">
                <h2>Mon Panier</h2>
            </section><?php
        //If a basket is set, show all items in it
        if(isset($_COOKIE['basket']) && $_COOKIE['basket']){?>
            <section id="notempty"><?php
                require $root . 'pages/panier/notempty.php';
            ?></section><?php
        }
        //Redirect on panier.php upon payment ( checkout only accessible while paying )
        else if(isset($_SESSION['purchase']) && $_SESSION['purchase']=='success'){
        ?><section id="payment_success">
            <p>Votre commande a bien été enregistrée. Vous allez bientôt recevoir un mail de confimation.<br>
            Vous pouvez retrouver le détail de votre commande sur votre <a href="/boutique/pages/profil.php">espace personnel</a>, 
            dans la rubrique Historique des commandes.</p>
        </section><?php
            unset($_SESSION['purchase']);
        }
        else{
            require $root . 'pages/panier/empty.php';
        }
        ?></main><?php
    include $root . 'pages/globals/footer.php';?>
    </body>

</html>