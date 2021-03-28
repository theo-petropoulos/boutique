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
    /**********************************************************/
    $marquename=$Product->brandName(intval($_GET['collection']), $db);
    /**********************************************************/
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

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <?php $title=ucfirst(strtolower($Product->getNom())); require $root . 'pages/globals/head.php';?>
    <body id="body_produit">
    <?php require_once $root . 'pages/globals/header.php'; ?> 
        <main id="main_produit">
            <section id="container_produit">
                <div id="container_image">
                    <img src="/boutique/assets/images/produits/star/<?=$Product->getNomImage();?>" alt="">
                    <div class="fadeimg"></div>
                </div>
                <div id="container_titre">
                    <h2><?= $Product->getNom() ?></h2>
                    <h3>par <span id="brand"><?=ucfirst(strtolower($marquename));?></span></h3>
                </div>
            </section>

            <section id="container_specs">
                <div class="ghost_block"></div>
                <ul class="carac_cont">
                    <li class="carac_prod"><b>Diamètre:</b> <i><?= $Product->getDiametre() . 'mm' ?></i></li>
                    <li class="carac_prod"><b>Épaisseur:</b> <i><?= $Product->getEpaisseur() . 'mm' ?></i></li>
                    <li class="carac_prod"><b>Boitier:</b> <i><?= $Product->getBoitier() ?></i></li>
                    <li class="carac_prod"><b>Mouvement:</b> <i><?= $Product->getMouvement() ?></i></li>
                    <li class="carac_prod"><b>Reserve:</b> <i><?= $Product->getReserve() ?></i></li>
                    <li class="carac_prod"><b>Étanchéité:</b> <i><?= $Product->getEtancheite() ?></i></li>
                </ul>
            </section>

            <div id="container_price">
                <div class="ghost_block"></div>
                <div id="actual_container">
                    <p class="price">Prix TTC</p>
                    <p><?=$Product->getPrixPromo() != NULL ? '<span class="textPromo">' . 'Economisez' . ' ' . $ArrayPromo['pourcentage'] . '%' . '</span>' . ' ' . '<span class="promoPrice">' . $Product->getPrixPromo() . '€' . '</span>' . ' ' . '<span class="oldPrice">' . number_format(intval($Product->getPrix()),2,'.',',') . '€' . '</span>' : '<span class="normalPrice">' . number_format(intval($Product->getPrix()),2,'.',',') . '€' . '</span>' ?></p>
                    <form method="post" action="">
                        <input type="number" name="addquantity" value=1 required>
                        <input type="hidden" name="addbasket" value="<?= $Product->getId(); ?>">
                        <input type="submit" value="Ajouter au panier">
                    </form>
                    <?php if($Product->getStock()<5){?> <p>Plus que quelques exemplaires disponibles.</p> <?php } ?>
                </div>
            </div>

            <section id="container_desc">
                <p><?=$Product->getDescription();?></p>
            </section>

            <a id="toup" href="#home_link"><i class="fas fa-caret-square-up"></i></a>
        </main>
    <?php require_once $root . 'pages/globals/footer.php'; ?>
    </body>
</html>