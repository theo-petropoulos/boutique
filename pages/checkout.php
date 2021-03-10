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

    <body>
    <?php include $root . 'pages/globals/header.php';
        if(isset($instock) && $instock==0){
            echo "out of stock";
        }
        else if(isset($total_price) && is_int($total_price) && $total_price){?>
        <form method="post" action="checkout.php">
            <input type="hidden" name="checkout" value="<?=$_POST['checkout'];?>">
            <label for="creditcard">Numéro de carte : </label>
            <input type="text" name="creditcard" pattern="[0-9]{16}" required>
            <label for="expiration">Date d'expiration :</label>
            <input type="date" name="expiration" min="<?=date("Y-m-d");?>" required>
            <label for="cryptogram">Cryptogramme :</label>
            <input type="text" name="cryptogram" pattern="[0-9]{3}" required>
            <input type="submit" value="Valider">
        </form>
        <?php } 
    include $root . 'pages/globals/footer.php';?>
    </body>
</html>