<?php
var_dump($_GET);
include_once '../model/class/Manager.php';
include_once '../model/class/ManProduct.php';
include_once '../model/class/Product.php';

$Product = new Product();
$Man = new ManProduct();
$arrayProduct = $Man->getProduct(intval($_GET['collection']), intval($_GET['produit']));
$Product->hydrate($arrayProduct);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a95f1c7873.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/produit.css">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/boutique.css?v=<?php echo time(); ?>">
    <link rel="icon" href="../assets/icon.png"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Beth+Ellen&family=Bodoni+Moda&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<?php require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/header.php';?>
<main>
    <!-- TITRE (PRODUCT) -->
    <div class="container_main_title">
        <h1 class="main_title">"<?= "NOM DE LA MARQUE AFFICHAGE DYNAMIQUE" ?>"</h1>
    </div>

    <section class="product_self">
        <div class="container_pic_prod">
            <h3>Caracteristique principal</h3>
            <!--            <img src="--><?php //"URL de l'image dynamique"  ?><!--" alt="">-->
        </div>
        <article>
            <h2>Découvrez la "<?= "nom du produit dynamique" ?>"</h2>
            <p><?= "Description produit dynamique" ?></p>
            <button>Ajouter au panier</button>
        </article>
    </section>
    <hr class="sep_simil">
    <section class="container_simil">
        <h3 class="title_sim">Produits similaires</h3>
        <div class="container_prod_simil">
            <div>PRODUIT</div>
            <div>PRODUIT</div>
            <div>PRODUIT</div>
            <div>PRODUIT</div>
        </div>
    </section>
</main>
<?php require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/footer.php';?>
</body>
</html>