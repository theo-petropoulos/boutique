<?php
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/session.php';
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/class/Watch.php';
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/class/ManWatch.php';

    //Access to checkout is only granted upon data sent by post
    if(isset($_POST) && $_POST){
        require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/checkout/conditions.php';
    } else die('Vous ne pouvez pas accéder à cette page.');
?>

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
		<title>Paiement</title>
	</head>

    <body>
    <?php include realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/header.php';
        if(isset($total_price) && is_int($total_price) && $total_price){?>
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
    include realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/footer.php';?>
    </body>
</html>