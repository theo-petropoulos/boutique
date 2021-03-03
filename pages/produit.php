<?php
include_once '../model/class/Manager.php';
include_once '../model/class/ManWatch.php';
include_once '../model/class/Watch.php';
include_once '../model/class/Promo.php';
include_once '../model/class/ManPromo.php';
require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/session.php';

if (isset($_POST['addbasket']) && is_int(intval($_POST['addbasket'])) && $_POST['addbasket']) {
    if (verify_product($_POST['addbasket']) == 'valid') {
        if (isset($_COOKIE['basket']) && $_COOKIE['basket']) {
            $basket = $_COOKIE['basket'];
            $basket .= '&id=' . $_POST['addbasket'];
        } else $basket = '&id=' . $_POST['addbasket'];
        setcookie('basket', $basket, time() + 36000);
    } else die("Une erreur s'est produite.");
}
//Instance Objet et variables utilitaire
$Promo = new Promo();
$ManPromo = new ManPromo();
$Product = new Watch();
$ManWatch = new ManWatch();
$arrayProduct = $ManWatch->getProduct(intval($_GET['collection']), intval($_GET['produit']));
$Product->hydrate($arrayProduct);
$Price = $Product->getPrix();
//Affiche promotion si existante
$ArrayPromo = $ManPromo->get_promo($Product);
isset($ArrayPromo) ? $newprice = ($Price * $ArrayPromo['pourcentage']) / 100 : $newprice = NULL;
isset($newprice) ? $Product->setPrixPromo($newprice) : $Product->setPrixPromo(NULL);
//Ajoute les caracteristiques au produit
$arraycaracProduct = $ManWatch->get_carac($Product->getId());
$Product->hydrate($arraycaracProduct);
$Similary = $ManWatch->getProductByCollection($Product->getMarque());
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
<?php require_once 'header.php'; ?>
<main>
    <!-- TITRE (PRODUCT) -->
    <div class="container_main_title">
        <h1 class="main_title"><?= strtoupper($_SESSION['marque']) ?></h1>
    </div>

    <section class="product_presentation">

        <div class="container_pic_prod">
            <img class="pic_prod" width="300px" src="<?= $_SESSION['path_pic'] . '/' . $Product->getNomImage() ?>"
                 alt="">
        </div>
        <article class="artticle_prod">
            <h2 class="title_prod"><?= $Product->getNom() ?></h2>
            <p class="describe_prod"><?= $Product->getDescription() ?></p>
        </article>
    </section>
    <section class="product_caracteristique">
        <h3 class="title_carac">Tarif et caracteristiques</h3>
        <article class="carac_price">
            <div class="container_list">
                <ul class="carac_cont">
                    <li class="carac_prod"><b>Diamètre:</b> <i><?= $Product->getDiametre() . 'mm' ?></i></li>
                    <li class="carac_prod"><b>Épaisseur:</b> <i><?= $Product->getEpaisseur() . 'mm' ?></i></li>
                    <li class="carac_prod"><b>Boitier:</b> <i><?= $Product->getBoitier() ?></i></li>
                    <li class="carac_prod"><b>Mouvement:</b> <i><?= $Product->getMouvement() ?></i></li>
                    <li class="carac_prod"><b>Reserve:</b> <i><?= $Product->getReserve() ?></i></li>
                    <li class="carac_prod"><b>Étanchéité:</b> <i><?= $Product->getEtancheite() ?></i></li>
                </ul>
            </div>
            <div class="container_price">
                <p class="price">Prix
                    TTC</p><?= $Product->getPrixPromo() != NULL ? '<span class="textPromo">' . 'Economisez' . ' ' . $ArrayPromo['pourcentage'] . '%' . '</span>' . ' ' . '<span class="promoPrice">' . $Product->getPrixPromo() . '€' . '</span>' . ' ' . '<span class="oldPrice">' . $Product->getPrix() . '€' . '</span>' : '<span class="normalPrice">' . $Product->getPrix() . '€' . '</span>' ?>
                <form method="post" action="">
                    <input type="hidden" name="addbasket" value="<?= $Product->getId(); ?>">
                    <input type="submit" value="Ajouter au panier">
                </form>
                <p class="stock">Nombre en stock: <?= $Product->getStock(); ?></p>
            </div>
        </article>

    </section>
    <hr class="sep_simil">
    <section class="container_simil">
        <h3 class="title_sim">Produits similaires</h3>
        <div class="container_prod_simil">
            <?php foreach ($Similary as $item): ?>
                <div>
                    <?php if (isset($_GET['collection']) && $_GET['collection'] > 0): ?>
                        <a href=""><img width="80px" src="<?= $_SESSION['path_pic'] . '/' . $item->image ?> " alt=""></a>
                    <?php else: ?>
                        <a href=""><img width="100px" src="<?= $_SESSION['path_pic'] . '/' . $item->image ?>" alt=""></a>
                    <?php endif; ?>
                    <h5 class="product_simi"><?= $item->nom ?></h5>
                </div>
            <?php endforeach; ?>
        </div>

    </section>
</main>
<?php require_once 'footer.php'; ?>
</body>
</html>