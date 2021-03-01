<?php
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
    <?php include realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/header.php';?>

    <?php include realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/footer.php';?>
    </body>

</html>