<?php require_once '../model/class/Manager.php' ?>

<?php
$_GET['collection'] = 3;

$man = new \App\Manager();
$marques = $man->getCollection();
if (isset($_GET['collection']) && $_GET['collection'] == 1) {
    $produits = $man->getProductByCollection(1);
} elseif (isset($_GET['collection']) && $_GET['collection'] == 2) {
    $produits = $man->getProductByCollection(2);
} elseif
(isset($_GET['collection']) && $_GET['collection'] == 3) {
    $produits = $man->getProductByCollection(3);
} else {
    $produits = $man->getProductByCollection(1);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a95f1c7873.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/collection_audemars.css">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/boutique.css?v=<?php echo time(); ?>">
    <link rel="icon" href="../assets/icon.png"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Beth+Ellen&family=Bodoni+Moda&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<?php include_once 'header.php' ?>
<main>
    <!-- TITRE (PRODUCT) -->
    <div class="container_main_title">
        <h1 class="main_title">NOS MONTRES</h1>
    </div>
    <div class="bg_products">
        <div class="container_page_product">
            <!--Section produits-->
            <section class="container_products">
                <div class="container_product">
                    <img class="product_pic" src="../assets/images/product_audemars/<?= $produits[0]['image'] ?>"
                         alt="Montre Audemars Piguet">
                    <h4 class="product_title"><?= $produits[0]['nom'] ?></h4>
                    <p class="p_product">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti, sit!
                    </p>
                    <span><?= $produits[0]['prix'] . '€' ?></span>

                    <a href="produit.php?produit=<?= $produits[0]['id'] ?>>&collection=<?= $marques[0]['id'] ?>"
                       class="buy"><i class="far fa-plus-square"></i>Ajouter</a>
                </div>
                <div class="container_product">
                    <img class="product_pic" src="../assets/images/product_audemars/<?= $produits[1]['image'] ?>"
                         alt="Montre Audemars Piguet">
                    <h4 class="product_title"><?= $produits[1]['nom'] ?></h4>
                    <p class="p_product">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, quidem?
                    </p>
                    <span><?= $produits[1]['prix'] . '€' ?></span>

                    <a href="produit.php?produit=<?= $produits[1]['id'] ?>>&collection=<?= $marques[0]['id'] ?>"
                       class="buy"><i class="far fa-plus-square"></i>Ajouter</a>
                </div>
                <div class="container_product">
                    <img class="product_pic" src="../assets/images/product_audemars/<?= $produits[2]['image'] ?>"
                         alt="Montre Audemars Piguet">
                    <h4 class="product_title"><?= $produits[2]['nom'] ?></h4>
                    <p class="p_product">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, nostrum?
                    </p>
                    <span><?= $produits[2]['prix'] . '€' ?></span>
                    <a href="produit.php?produit=<?= $produits[2]['id'] ?>>&collection=<?= $marques[0]['id'] ?>"
                       class="buy"><i class="far fa-plus-square"></i>Ajouter</a>
                </div>
                <div class="container_product">
                    <img class="product_pic" src="../assets/images/product_audemars/<?= $produits[3]['image'] ?>"
                         alt="Montre Audemars Piguet">
                    <h4 class="product_title"><?= $produits[3]['nom'] ?></h4>
                    <p class="p_product">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, numquam!

                    </p>
                    <span><?= $produits[3]['prix'] . '€' ?></span>

                    <a href="produit.php?produit=<?= $produits[3]['id'] ?>>&collection=<?= $marques[0]['id'] ?>"
                       class="buy"><i class="far fa-plus-square"></i>Ajouter</a>
                </div>
                <div class="container_product">
                    <img class="product_pic" src="../assets/images/product_audemars/<?= $produits[4]['image'] ?>"
                         alt="Montre Audemars Piguet">
                    <h4 class="product_title"><?= $produits[4]['nom'] ?></h4>
                    <p class="p_product">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum, quia.

                    </p>
                    <span><?= $produits[4]['prix'] . '€' ?></span>

                    <a href="produit.php?produit=<?= $produits[4]['id'] ?>>&collection=<?= $marques[0]['id'] ?>"
                       class="buy"><i class="far fa-plus-square"></i>Ajouter</a>
                </div>
                <div class="container_product">

                    <img class="product_pic" src="../assets/images/product_audemars/<?= $produits[5]['image'] ?>"
                         alt="Montre Audemars Piguet">
                    <h4 class="product_title"><?= $produits[5]['nom'] . '€' ?></h4>
                    <p class="p_product">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, nisi.

                    </p>
                    <span><?= $produits[5]['prix'] . '€' ?></span>

                    <a href="produit.php?produit=<?= $produits[5]['id'] ?>>&collection=<?= $marques[0]['id'] ?>"
                       class="buy"><i class="far fa-plus-square"></i>Ajouter</a>
                </div>
            </section>
            <!--Section description de la gamme -->
            <section class="container_describe_product">
                <h2 class="main_title">Collection Audemars Piguet</h2>
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
<?php include_once 'footer.php' ?>
</body>
</html>