<?php
include_once '../model/class/Manager.php';
include_once '../model/class/ManProduct.php';
include_once '../model/class/Watch.php';
session_start();

$Product = new Watch();
$Man = new ManProduct();
$arrayProduct = $Man->getProduct(intval($_GET['collection']), intval($_GET['produit']));
$Product->hydrate($arrayProduct);
$Similary = $Man->getProductByCollection($Product->getMarque());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a95f1c7873.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/product.css">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/boutique.css?v=<?php echo time(); ?>">
    <link rel="icon" href="../assets/icon.png"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Beth+Ellen&family=Bodoni+Moda&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<?php require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/header.php'; ?>
<main>
    <!-- TITRE (PRODUCT) -->
    <div class="container_main_title">
        <h1 class="main_title"><?= strtoupper($_SESSION['marque']) ?></h1>
    </div>

    <section class="product_self">
        <div class="container_pic_prod">
            <img class="pic_prod" width="300px" src="<?= $_SESSION['path_pic'] . '/' . $Product->getNomImage() ?>"
                 alt="">
        </div>
        <article class="artticle_prod">
            <h2><?= $Product->getNom() ?></h2>
            <p><?= "Description produit dynamique" ?></p>
            <span><?= $Product->getPrix() . '€' ?></span>
            <button>Ajouter au panier</button>
        </article>
    </section>
    <hr class="sep_simil">
    <section class="container_simil">
        <h3 class="title_sim">Produits similaires</h3>
        <div class="container_prod_simil">
            <?php foreach ($Similary as $item): ?>
                <div>
                    <?php if ($_GET['collection'] == 2): ?>
                        <a href=""><img width="80px" src="<?= $_SESSION['path_pic'] . '/' . $item['image'] ?>" *alt=""></a>
                    <?php else: ?>
                        <a href=""><img width="100px" src="<?= $_SESSION['path_pic'] . '/' . $item['image'] ?>" alt=""></a>
                    <?php endif; ?>
                    <h5 class="product_simi"><?= $item['nom'] ?></h5>
                </div>
            <?php endforeach; ?>
        </div>

    </section>
</main>
<?php require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/footer.php'; ?>
</body>
</html>