<?php
//Voir pour redefinir les chemin + namespace  si Theo MVC
require_once '../model/class/Manager.php';
require_once '../model/class/ManWatch.php';
require_once '../model/class/Promo.php';
require_once '../model/class/ManPromo.php';
session_start();
//Parametre passé par onglet collection du header 1 pour audemars 2 pour blancpain 3 pour Omega
//Nouvel object Manager produit
$ManWatch = new ManWatch;
$ManPromo = new ManPromo();
$PromoInfos = null;
$path_pics = null;
$PromoProd = [];
$marques = $ManWatch->getCollection();

//Condition permettant de définir la collection
if (isset($_GET['collection'])) :
    $produits = $ManWatch->getProductByCollection($_GET['collection']);
    $path_pics = "../assets/images/produits";
    $_SESSION['path_pic'] = $path_pics;
    foreach ($marques as $marque):
        if ($marque->id == $_GET['collection']) {
            $collection = ucfirst($marque->nom);
            $marque = $marque->id;
            $_SESSION['marque'] = $marque->nom;
        } else {
            $collection = ucfirst($marques[0]->nom);
            $marque = $marques[0]->id;
            $_SESSION['marque'] = $marques[0]->nom;
        }
    endforeach;
else: header('location:../index.php');
endif;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a95f1c7873.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/collection.css">
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
                        <?php //Affiche promotion si existante
                        $ArrayPromo = $ManPromo->get_promo($Watch);
                        isset($ArrayPromo) ? $newprice = ($Price * $ArrayPromo['pourcentage']) / 100 : $newprice = NULL;
                        isset($newprice) ? $Watch->setPrixPromo($newprice) : $Watch->setPrixPromo(NULL); ?>
                        <?= $Watch->getPrixPromo() != NULL ? '<span class="textPromoColl">' . 'Economisez' . ' ' . $ArrayPromo['pourcentage'] . '%' . '</span>' . ' ' . '<span class="promoPriceColl">' . $Watch->getPrixPromo() . '€' . '</span>' . ' ' . '<span class="oldPriceColl">' . $Watch->getPrix() . '€' . '</span>' : '<span class="normalPriceColl">' . $Watch->getPrix() . '€' . '</span>' ?>
                        <a href="produit.php?produit=<?= $Watch->getId() ?>&collection=<?= $marque ?>"
                           class="buy"><i class="far fa-plus-square"></i>Voir la fiche</a>
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
<?php require_once 'footer.php'; ?>
</body>
</html>