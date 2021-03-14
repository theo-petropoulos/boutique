<?php
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/session.php';
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/class/Watch.php';
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/class/ManWatch.php';
    
    //Access to checkout is only granted upon data sent by post
    if((isset($_POST) && $_POST )|| (isset($_SESSION['checkout']) && $_SESSION['checkout'])){
        require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/checkout/conditions.php';
    } else die('Vous ne pouvez pas accéder à cette page.');
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<?php $title='Paiement'; require $root . 'pages/globals/head.php';?>

    <body id="body_checkout">
    <?php include $root . 'pages/globals/header.php';
        if(isset($instock['return']) && $instock['return']==0){
            $watch = new Watch();
            $watch->setId($instock['object']);
            $res=$watch->getSpecs($db);
            ?><div id="outofstock"><p>Le produit : <?=$res['nom'];?> que vous avez commandé n'est plus disponible 
            dans la quantité demandée ( <?=$res['stock'];?> unité<?php if($res['stock']>1){echo 's';}?> restantes ).<br>
            Il a automatiquement été retiré de votre panier.<br>
            Revenir à <a href="/boutique/pages/panier.php">Mon Panier</a></p></div>
        <?php }
        else if(isset($total_price) && is_int($total_price) && $total_price){?>
        <div id="checkingout">
            <div id="formcontainer">
                <form method="post" action="checkout.php">
                    <input type="hidden" name="checkout" value="<?=$_POST['checkout'];?>">
                    <label for="creditcard">Numéro de carte : </label>
                    <input type="text" name="creditcard" pattern="[0-9]{16}" required>
                    <div>
                        <div class="column">
                            <label for="expiration">Date d'expiration :</label>
                            <input type="date" name="expiration" min="<?=date("Y-m-d");?>" required>
                        </div>
                        <div class="column">
                            <label for="cryptogram">Cryptogramme :</label>
                            <input type="text" name="cryptogram" pattern="[0-9]{3}" required>
                        </div>
                    </div>
                    <input type="submit" value="Valider">
                </form>
            </div>
        </div>
        <?php } 
        else die("Une erreur inattendue est survenue.");
    include $root . 'pages/globals/footer.php';?>
    </body>
</html>