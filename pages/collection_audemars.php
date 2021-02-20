<?php ?>

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
                    <img class="product_pic" src="../assets/images/product_audemars/AP1.jpg" alt="Montre Audemars Piguet">
                    <h4 class="product_title">Product name</h4>
                    <p class="p_product">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti, sit!
                    </p>
                    <span><?= "PRIX" ?></span>

                    <button class="buy"><i class="far fa-plus-square"></i>Ajouter</button>
                </div>
                <div class="container_product">
                    <img class="product_pic" src="../assets/images/product_audemars/AP2.jpg" alt="Montre Audemars Piguet">
                    <h4 class="product_title">Product name</h4>
                    <p class="p_product">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, quidem?
                    </p>
                    <span><?= "PRIX" ?></span>

                    <button class="buy"><i class="far fa-plus-square"></i>Ajouter</button>
                </div>
                <div class="container_product">
                    <img class="product_pic" src="../assets/images/product_audemars/AP3.jpg" alt="Montre Audemars Piguet">
                    <h4 class="product_title">Product name</h4>
                    <p class="p_product">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, nostrum?
                    </p>
                    <span><?= "PRIX" ?></span>
                    <button class="buy"><i class="far fa-plus-square"></i>Ajouter</button>
                </div>
                <div class="container_product">
                    <img class="product_pic" src="../assets/images/product_audemars/AP5.jpg" alt="Montre Audemars Piguet">
                    <h4 class="product_title">Product name</h4>
                    <p class="p_product">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, numquam!

                    </p>
                    <span><?= "PRIX" ?></span>

                    <button class="buy"><i class="far fa-plus-square"></i>Ajouter</button>
                </div>
                <div class="container_product">
                    <img class="product_pic" src="../assets/images/product_audemars/AP4.jpg" alt="Montre Audemars Piguet">
                    <h4 class="product_title">Product name</h4>
                    <p class="p_product">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum, quia.

                    </p>
                    <span><?= "PRIX" ?></span>

                    <button class="buy"><i class="far fa-plus-square"></i>Ajouter</button>
                </div>
                <div class="container_product">

                    <img class="product_pic" src="../assets/images/product_audemars/AP6.jpg" alt="Montre Audemars Piguet">
                    <h4 class="product_title">Product name</h4>
                    <p class="p_product">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, nisi.

                    </p>
                    <span><?= "PRIX" ?></span>

                    <button class="buy"><i class="far fa-plus-square"></i>Ajouter</button>
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