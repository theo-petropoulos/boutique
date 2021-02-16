<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a95f1c7873.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/descriptionProd.css">
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
        <h1 class="main_title">NOM DE LA MARQUE</h1>
    </div>
    <section class="intro_product">
        <div class="banner_fix">
            <h1>PARALAX</h1>
        </div>
        <article class="container_article">
            <h2>Découvrez la <?= "nom du produit" ?></h2>
            <p>
                Quand la haute horlogerie s’allie à un design soigné
                Découvrez <?= "Nom de la marque" ?>, une collection de montres connectées à l’esthétique intemporelle,
                dédiées aux
                personnes qui veulent un mode de vie plus actif, plus conscient et plus sain.</p>
        </article>
    </section>
    <section class="product_self">
        <div class="container_pic_prod">
            <h3>Caracteristique principal</h3>
        </div>
        <div class="container_text_product">
            <h4>Voir titre</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aspernatur commodi, doloremque
                eligendi excepturi illo, iusto libero magni porro possimus praesentium quae quo rem sit tempore ullam
                vero, vitae voluptatem?</p>
            <button>Ajouter au panier</button>
        </div>
    </section>
    <hr class="sep_simil">
    <section class="container_simil">
        <h3>Produits similaires</h3>
        <div class="container_prod_simil">
            <div>PRODUIT</div>
            <div>PRODUIT</div>
            <div>PRODUIT</div>
            <div>PRODUIT</div>
        </div>
    </section>
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