<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/produits.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/boutique.css?v=<?php echo time(); ?>">
    <link rel="icon" href="assets/icon.png"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Beth+Ellen&family=Bodoni+Moda&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<header>
    <h1><span class="h1font">V</span>on <span class="h1font">H</span>arper</h1>
    <div id="nav_bar">
        <div id="nav_bar1">
            <ul id="nav_ul1">
                <li id="nav_nouveautes"><a href="">Nouveautés</a></li>
                <li id="nav_montres"><a href="">Montres</a></li>
                <li id="nav_adresses"><a href="">Points de vente</a></li>
                <li id="nav_apropos"><a href="">À propos</a></li>
                <li id=""
            </ul>
        </div>
        <div id="nav_bar2">
            <ul id="nav_ul2">
                <li id="nav_profil"><a href=""><i class="fas fa-user-tie"></i></a></li>
                <li id="nav_panier"><a href=""><i class="fas fa-shopping-cart"></i></a></li>
                <li id="search_bar">
                    <form method="post" action="">
                        <input type="text" id="search" name="search">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>
<main>
    <!-- TITRE (PRODUCT) -->
    <div class="container_main_title">
        <h1 class="main_title">NOS MONTRES</h1>
    </div>
    <div class="container_page_product">
        <!--Section produits-->
        <section class="container_products">
            <div class="container_product">
                <img class="product_pic" src="assets/images/product_audemars/AP1.jpg" alt="Montre Audemars Piguet">
                <h4 class="product_title">Product name</h4>
                <p class="p_product">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti, sit!
                </p>
                <span><?= "PRIX" ?></span>

                <button class="buy">Ajouter</button>
            </div>
            <div class="container_product">
                <img class="product_pic" src="assets/images/product_audemars/AP2.jpg" alt="Montre Audemars Piguet">
                <h4 class="product_title">Product name</h4>
                <p class="p_product">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, quidem?
                </p>
                <span><?= "PRIX" ?></span>

                <button class="buy">Ajouter</button>
            </div>
            <div class="container_product">
                <img class="product_pic" src="assets/images/product_audemars/AP3.jpg" alt="Montre Audemars Piguet">
                <h4 class="product_title">Product name</h4>
                <p class="p_product">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, nostrum?
                </p>
                <span><?= "PRIX" ?></span>
                <button class="buy">Ajouter</button>
            </div>
            <div class="container_product">
                <img class="product_pic" src="assets/images/product_audemars/AP4.jpg" alt="Montre Audemars Piguet">
                <h4 class="product_title">Product name</h4>
                <p class="p_product">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, numquam!

                </p>
                <span><?= "PRIX" ?></span>

                <button class="buy">Ajouter</button>
            </div>
            <div class="container_product">
                <img class="product_pic" src="assets/images/product_audemars/AP5.jpg" alt="Montre Audemars Piguet">
                <h4 class="product_title">Product name</h4>
                <p class="p_product">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum, quia.

                </p>
                <span><?= "PRIX" ?></span>

                <button class="buy">Ajouter</button>
            </div>
            <div class="container_product">
                <img class="product_pic" src="assets/images/product_audemars/AP1.jpg" alt="Montre Audemars Piguet">
                <h4 class="product_title">Product name</h4>
                <p class="p_product">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, nisi.

                </p>
                <span><?= "PRIX" ?></span>

                <button class="buy">Ajouter</button>
            </div>
        </section>
        <!--Section description de la gamme -->
        <section class="container_describe_product">
            <h2 class="main_title">Collection Audemars Piguet</h2>
            <p class="p_describe_product">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A dolorum eaque
                earum
                maiores minima molestias, nihil? Assumenda aut eligendi hic laborum magnam porro quisquam quod! Eum
                inventore molestiae quidem quos!</p>

            <p class="p_describe_product">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A dolorum eaque
                earum
                maiores minima molestias, nihil? Assumenda aut eligendi hic laborum magnam porro quisquam quod! Eum
                inventore molestiae quidem quos!</p>
            <div class="container_image_describe_product">
                <img src="" alt="">
            </div>
        </section>
    </div>
</main>
<footer>
    <div id="footer_logo"><h1><span class="h1font">V</span>on <span class="h1font">H</span>arper</h1></div>
    <div id="footer_nav">
        <div id="footer_links">
            <ul id="footer_ul">
                <li><a href="">Newsletter</a></li>
                <li><a href="">Nous contacter</a></li>
                <li><a href="">Mentions légales</a></li>
                <li><a href="">Suivi de commande</a></li>
            </ul>
        </div>
        <div id="footer_social">
            <ul id="social_icons">
                <li><a href=""><i class="fab fa-facebook-square"></i></a></li>
                <li><a href=""><i class="fab fa-instagram-square"></i></a></li>
                <li><a href=""><i class="fab fa-twitter-square"></i></a></li>
                <li><a href=""><i class="fab fa-youtube-square"></i></a></li>
            </ul>
        </div>
    </div>
</footer>
</body>
</html>