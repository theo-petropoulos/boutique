<?php
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/session.php';
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/class/Watch.php';
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/class/ManWatch.php';

    if(isset($_POST['addbasket']) && $_POST['addbasket']){
        header('Refresh:0;');
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
        //If a basket is set, show all items in it
        if(isset($_COOKIE['basket']) && $_COOKIE['basket']){
            $basket=array_filter(explode('&id=', $_COOKIE['basket']));
            $basket=organize_array($basket);
            $total_price=0;
            foreach($basket as $key=>$value){?>
            <div class="order_items">
                <?php 
                $array=new ManWatch();
                $watch=new Watch();
                $watch->hydrate($array->get_one_product($key));
                $total_price=intval($total_price)+intval($watch->getPrix()*$value);
                echo 'nom = ' . $watch->getMarque() . ' - ' . $watch->getNom() . '// quantite = ' . $value . '// prix = ' . $watch->getPrix()*$value;
            }?>
            </div>
            <div class="order_total">
                <?='total = ' . $total_price;?>
            </div>
            <div id="order_pay">
                <form method="post" action="checkout.php">
                    <input type="hidden" name="checkout" value="<?=$_COOKIE['basket'];?>">
                    <input type="submit" value="Procéder au paiement">
                </form>
            </div>
    <?php }
        //Redirect on panier.php upon payment ( checkout only accessible while paying )
        else if(isset($_SESSION['purchase']) && $_SESSION['purchase']=='success'){
            echo "paiement succès.";
            unset($_SESSION['purchase']);
        }
        else{
            require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/panier/empty.php';
        }
    include realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/footer.php';?>
    </body>

</html>