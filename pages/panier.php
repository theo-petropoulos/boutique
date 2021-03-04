<?php
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/session.php';
    require $root . 'model/class/Watch.php';
    require $root . 'model/class/ManWatch.php';

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
    <?php include $root . 'pages/header.php';
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
    include $root . 'pages/footer.php';?>
    </body>

</html>