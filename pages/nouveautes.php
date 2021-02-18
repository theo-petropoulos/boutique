<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/nouveautes.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/boutique.css?v=<?php echo time(); ?>">
    <link rel="icon" href="../assets/icon.png"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Beth+Ellen&family=Bodoni+Moda&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9ddb75d515.js" crossorigin="anonymous"></script>
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
<!-- TITRE (NOVUEAUTÉS) -->
<main>
    <div class="container_main_title">
        <h1 class="main_title">NOUVEAUTÉS</h1>
    </div>
    <div id="bg_new">
        <!-- CONTENEUR DES 3 SECTIONS -->
        <div class="container_sections">
            <!-- SECTION NOUVEAUTE 1 -->
            <section class="section_new">
                <!-- Partie gauche section -->
                <div class="container_img_new">
                    <img class="img_new" src="../assets/images/Prestige.jpg" alt="Montre Audemars Piguet">
                </div>
                <!-- Partie droite section -->
                <div class="container_text_new">
                    <h3 class="minor_title">CODE 11.59 BY AUDEMART PIQUER</h3>
                    <hr class="sep_new">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum quaerat quidem,
                        culpa ratione eligendi dignissimos architecto, aliquam quae odio nisi
                        corporis! Eius eum placeat dolorum laboriosam expedita dolorem architecto
                        voluptatibus!</p>
                    <a class="link_new" href="#">Consulter la collection</a>

                </div>
            </section>
            <!-- SECTION NOUVEAUTE 1 -->
            <section class="section_new">
                <!-- Partie gauche section -->
                <div class="container_text_new">
                    <h3 class="minor_title">FIFTY FATHOMS DE BLANCPAIN</h3>
                    <hr class="sep_new">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum quaerat quidem,
                        culpa ratione eligendi dignissimos architecto, aliquam quae odio nisi
                        corporis! Eius eum placeat dolorum laboriosam expedita dolorem architecto
                        voluptatibus!</p>
                    <a class="link_new" href="#">Consulter la collection</a>
                </div>
                <!-- Partie droite section -->
                <div class="container_img_new">
                    <img class="img_new" src="../assets/images/Nouveautes2.jpg" alt="Montre Aquatique Blanc Pain" alt="">
                </div>
            </section>
            <!-- SECTION NOUVEAUTE 1 -->
            <section class="section_new">
                <!-- Partie gauche section -->
                <div class="container_img_new">
                    <img class="img_new" src="../assets/images/hublotTK.jpg" alt="Montre Aquatique Blanc Pain"
                         alt="Montre Hubot">
                </div>
                <!-- Partie droite section -->
                <div class="container_text_new">
                    <h3 class="minor_title">TAKASHI MURAKAMI ALL BLACK BY HUBLOT</h3>
                    <hr class="sep_new">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum quaerat quidem,
                        culpa ratione eligendi dignissimos architecto, aliquam quae odio nisi
                        corporis! Eius eum placeat dolorum laboriosam expedita dolorem architecto
                        voluptatibus!</p>
                    <a class="link_new" href="#">Consulter la collection</a>

                </div>
            </section>
        </div>
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