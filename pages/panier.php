<?php
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/session.php';
    require $root . 'model/class/Watch.php';
    require $root . 'model/class/ManWatch.php';

    if(isset($_POST['addbasket']) && $_POST['addbasket']){
        echo "test";
        header("Location: panier.php");
    }
    
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<?php $title='Panier'; require $root . 'pages/globals/head.php';?>

    <body>
    <?php include $root . 'pages/globals/header.php';
        ?><main class="basket"><?php
        //If a basket is set, show all items in it
        if(isset($_COOKIE['basket']) && $_COOKIE['basket']){?>
            <section id="notempty"><?php
                require $root . 'pages/panier/notempty.php';
            ?></section><?php
        }
        //Redirect on panier.php upon payment ( checkout only accessible while paying )
        else if(isset($_SESSION['purchase']) && $_SESSION['purchase']=='success'){
            echo "paiement succès.";
            unset($_SESSION['purchase']);
        }
        else{
            require $root . 'pages/panier/empty.php';
        }
        ?></main><?php
    include $root . 'pages/globals/footer.php';?>
    </body>

</html>