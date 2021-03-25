<?php
//Voir pour redefinir les chemin + namespace  si Theo MVC
require_once '../model/class/Manager.php';
require_once '../model/class/ManWatch.php';
require_once '../model/class/Promo.php';
require_once '../model/class/ManPromo.php';
require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/session.php';
//Parametre passé par onglet collection du header 1 pour audemars 2 pour blancpain 3 pour Omega
//Nouvel object Manager produit
$ManWatch = new ManWatch;
$ManPromo = new ManPromo();
$PromoInfos = null;
$path_pics = null;
$PromoProd = [];
$marques = $ManWatch->getCollection();
$collection_id='';

//Condition permettant de définir la collection
if (isset($_GET['collection']) && in_array($_GET['collection'], range(1,count($marques)))) :
    $produits = $ManWatch->getProductByCollection($_GET['collection']);
    $path_pics = "../assets/images/produits";
    $_SESSION['path_pic'] = $path_pics;
    foreach ($marques as $marque):
        if ($marque->id == $_GET['collection']) {
            $collection = ucfirst($marque->nom);
            $collectiondesc=$marque->description;
            $collection_id = $marque->id;
            $_SESSION['marque']=$collection;
        } 
    endforeach;
else: header('location:../index.php');
endif;

?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <?php $title=$_SESSION['marque']; require $root . 'pages/globals/head.php';?>
    <body id="body_collection">
        <?php require_once $root . 'pages/globals/header.php';?>
        <main id="main_collection">
            <div id="banner_standard">
                <h2>Nos montres</h2>
            </div>
            <div id="collection_name">
                <h2><?=$collection;?></h2>
            </div>
            <div id="collection_desc">
                <p><?=$collectiondesc;?></p>
            </div>
            <div class="separator_white"></div>
            <h4>La collection</h4>
            <section id="collection_container">
                <?php foreach ($produits as $prod):
                    $Watch = new Watch();
                    $Watch->hydrate($prod);
                    $Watch->setNomImage($prod['image']);
                    $Price = $Watch->getPrix();
                    ?>
                    <div class="collection_product">
                        <a class="aimg" href="/boutique/pages/produit.php?produit=<?=$Watch->getId();?>&collection=<?=$collection_id;?>">
                            <img src="<?=$path_pics;?>/<?=$Watch->getNomImage();?>" alt="Montre">
                        </a>
                        <?php //Affiche promotion si existante Sinon affiche le prix normal
                            $ArrayPromo = $ManPromo->get_promo($Watch);
                            isset($ArrayPromo) ? $newprice = ($Price * $ArrayPromo['pourcentage']) / 100 : $newprice = NULL;
                            isset($newprice) ? $Watch->setPrixPromo($newprice) : $Watch->setPrixPromo(NULL);
                        ?>
                        <div class="collection_infos">
                            <h3><?=ucfirst(strtolower($Watch->getNom()));?></h3>
                            <?= $Watch->getPrixPromo() != NULL ? '<span class="textPromoColl">' . 'Economisez' . ' ' . $ArrayPromo['pourcentage'] . '%' . '</span>' . ' ' . '<span class="promoPriceColl">' . $Watch->getPrixPromo() . '€' . '</span>' . ' ' . '<span class="oldPriceColl">' . $Watch->getPrix() . '€' . '</span>' : '<span class="normalPriceColl">' . number_format(intval($Watch->getPrix()),2,'.',',') . '€' . '</span>' ?>
                            <a href="produit.php?produit=<?= $Watch->getId() ?>&collection=<?=$collection_id;?>"
                            class="buy">Voir le produit</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>
        </main>
        <?php require_once $root . 'pages/globals/footer.php';?>
    </body>
</html>