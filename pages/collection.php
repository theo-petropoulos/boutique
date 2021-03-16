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
$test='';

//Condition permettant de définir la collection
if (isset($_GET['collection']) && in_array($_GET['collection'], range(1,count($marques)))) :
    $produits = $ManWatch->getProductByCollection($_GET['collection']);
    $path_pics = "../assets/images/produits";
    $_SESSION['path_pic'] = $path_pics;
    foreach ($marques as $marque):
        if ($marque->id == $_GET['collection']) {
            $collection = ucfirst($marque->nom);
            $test = $marque->id;
            $_SESSION['marque']=$collection;
        } 
    endforeach;
else: header('location:../index.php');
endif;

?>
<!DOCTYPE html>
<html lang="en">
<?php $title=$_SESSION['marque']; require $root . 'pages/globals/head.php';?>
<head>
    <link rel="stylesheet" href="/boutique/css/global.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/boutique/css/collection.css?v=<?php echo time(); ?>">
</head>
<body>
<?php require_once $root . 'pages/globals/header.php';?>
<main>
    <!-- TITRE (PRODUCT) -->
    <div class="container_main_title">
        <h1 class="main_title">NOS MONTRES</h1>
    </div>
    <div class="bg_products">
        <div class="container_page_product">
            <!--Section produits-->
            <section class="container_products">
                <?php foreach ($produits as $prod): ?>
                    <?php
                    $Watch = new Watch();
                    $Watch->hydrate($prod);
                    $Watch->setNomImage($prod['image']);
                    $Price = $Watch->getPrix();
                    ?>
                    <div class="container_product">
                        <img class="product_pic" src="<?= $path_pics ?>/<?= $Watch->getNomImage() ?>"
                             alt="Montre">
                        <h4 class="product_title"><?= $Watch->getNom() ?></h4>
                        <!--- Check promo-->
                        <?php //Affiche promotion si existante Sinon affiche le prix normal
                        $ArrayPromo = $ManPromo->get_promo($Watch);
                        isset($ArrayPromo) ? $newprice = ($Price * $ArrayPromo['pourcentage']) / 100 : $newprice = NULL;
                        isset($newprice) ? $Watch->setPrixPromo($newprice) : $Watch->setPrixPromo(NULL); ?>
                        <div class="container_price">
                            <?= $Watch->getPrixPromo() != NULL ? '<span class="textPromoColl">' . 'Economisez' . ' ' . $ArrayPromo['pourcentage'] . '%' . '</span>' . ' ' . '<span class="promoPriceColl">' . $Watch->getPrixPromo() . '€' . '</span>' . ' ' . '<span class="oldPriceColl">' . $Watch->getPrix() . '€' . '</span>' : '<span class="normalPriceColl">' . $Watch->getPrix() . '€' . '</span>' ?>
                            <a href="produit.php?produit=<?= $Watch->getId() ?>&collection=<?= $test ?>"
                               class="buy">En savoir plus</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>
            <!--Section description de la gamme -->
            <section class="container_describe_product">
                <h2 class="main_title"><?= "Collection" . ' ' . $collection ?></h2>
                <hr class="sep_prod">
                <div class="container_text_describe">
                    <p class="p_describe_product">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A dolorum
                        eaque
                        earum
                        maiores minima molestias, nihil? Assumenda aut eligendi hic laborum magnam porro quisquam quod!
                        Eum
                        inventore molestiae quidem quos!</p>

                    <p class="p_describe_product">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A dolorum
                        eaque
                        earum
                        maiores minima molestias, nihil? Assumenda aut eligendi hic laborum magnam porro quisquam quod!
                        Eum
                        inventore molestiae quidem quos!</p>
                </div>
                <div class="container_image_describe_product">
                    <h3 class="image_describe_title">Un travail d'orfèvre</h3>
                </div>
            </section>
        </div>
    </div>
</main>
<?php require_once $root . 'pages/globals/footer.php';?>
</body>
</html>