<?php
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/session.php';
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/class/Watch.php';

    if(isset($_COOKIE['basket']) && $_COOKIE['basket']){
        $basket=array_filter(explode('&id=', $_COOKIE['basket']));
        $basket=organize_array($basket);
    }
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
		<title>Panier</title>
	</head>

    <body>
    <?php include realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/header.php';
        if(isset($basket) && $basket){
            foreach($basket as $key=>$value){?>
            <div class="order_items">
                <?php 
                $item=new Watch();
                $item->setId($key);
                $specs=$item->getSpecs($db);
                echo 'nom = ' . $specs['marque'] . ' - ' . $specs['nom'] . '// quantite = ' . $value . '// prix = ' . $specs['prix']*$value;
            }?>
            </div>
            <div id="order_pay">
                <form method="post" action="checkout.php">
                    <input type="hidden" name="checkout" value="<?=$_COOKIE['basket'];?>">
                    <input type="submit" value="Procéder au paiement">
                </form>
            </div>
    <?php } 
        else if(isset($_SESSION['purchase']) && $_SESSION['purchase']=='success'){
            echo "paiement succès.";
            unset($_SESSION['purchase']);
        }
        else{
            echo "panier vide";
        }
    include realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/footer.php';?>
    </body>

</html>