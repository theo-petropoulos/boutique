<?php
include_once '../model/class/Manager.php';
include_once '../model/class/ManWatch.php';
include_once '../model/class/Watch.php';
include_once '../model/class/Promo.php';
include_once '../model/class/ManPromo.php';
require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/session.php';
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
<?php $title=$Product->getNom(); require $root . 'pages/globals/head.php';?>
<head>
    <link rel="stylesheet" href="/boutique/css/produit.css?v=<?php echo time(); ?>">
</head>
<body>
<?php require_once $root . 'pages/globals/header.php'; ?>
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
                <p class="price">Prix TTC</p><?= $Product->getPrixPromo() != NULL ? '<span class="textPromo">' . 'Economisez' . ' ' . $ArrayPromo['pourcentage'] . '%' . '</span>' . ' ' . '<span class="promoPrice">' . $Product->getPrixPromo() . '€' . '</span>' . ' ' . '<span class="oldPrice">' . $Product->getPrix() . '€' . '</span>' : '<span class="normalPrice">' . $Product->getPrix() . '€' . '</span>' ?>
                <form method="post" action="">
                    <input type="number" name="addquantity" value=1 required>
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
                        <a href="produit.php?produit=<?= $item['id'] ?>&collection=<?= $item['id_marque'] ?>"><img width="80px" src="<?= $_SESSION['path_pic'] . '/' . $item['image'] ?> " alt=""></a>
                    <?php else: ?>
                        <a href=""><img width="100px" src="<?= $_SESSION['path_pic'] . '/' . $item['image'] ?>" alt=""></a>
                    <?php endif; ?>
                    <h5 class="product_simi"><?= $item['nom'] ?></h5>
                </div>
            <?php endforeach; ?>
        </div>

    </section>
</main>
<?php require_once $root . 'pages/globals/footer.php'; ?>
</body>
</html>