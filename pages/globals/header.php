<?php   
    ob_start();
?> 
<header>
    <a href="/boutique/index.php"><h1><span class="h1font">V</span>on <span class="h1font">H</span>arper</h1></a>
    <nav id="nav_bar">
        <div id="nav_bar1">
            <ul id="nav_ul1">
                <li id="nav_nouveautes"><a class="link" href="/boutique/pages/nouveautes.php">Nouveautés</a></li>
                <li id="nav_montres"><span class="a">Les collections</span>
                    <ul class="sous-menu">
                        <li><a class="link" href="/boutique/pages/collection.php?collection=1">Audemars Piguet</a></li>
                        <li><a class="link" href="/boutique/pages/collection.php?collection=2">Blancpain</a></li>
                        <li><a class="link" href="/boutique/pages/collection.php?collection=3">Omega</a></li>
                    </ul>
                </li>
                <li id="nav_adresses"><a class="link" href="">Points de vente</a></li>
                <li id="nav_apropos"><a class="link" href="/boutique/pages/about.php">À propos</a></li>
            </ul>
        </div>
        <div id="nav_bar2">
            <ul id="nav_ul2">
                <li id="nav_profil">
                    <a href="/boutique/pages/profil.php"><i class="fas fa-user-tie"></i></a>
                </li>
                <li id="nav_panier"><a href="/boutique/pages/panier.php"><i class="fas fa-shopping-cart"></i></a></li>
                <li id="search_bar">
                    <form method="get" action="/boutique/pages/search.php">
                        <input type="text" minlength="3" maxlength="30" id="search" name="search">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    <nav id="nav_bar_mobile">
        <input type="checkbox" id="menu_mb" name="menu_mb">
        <label id="menu_mb_l" for="menu_mb"><i class="fas fa-align-justify"></i></label>
        <ul>
            <li>
                <form method="get" action="/boutique/pages/search.php">
                    <input type="text" minlength="3" maxlength="30" id="search" name="search">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </li>
            <hr>
            <li><a href="/boutique/index.php">Accueil</a></li>
            <hr>
            <li><a href="/boutique/pages/profil.php">Mon compte</a></li>
            <li><a href="/boutique/pages/panier.php">Mon panier</a></li>
            <hr>
            <li><a href="/boutique/pages/nouveautes.php">Nouveautés</a></li>
            <li>Nos collections
                <ol>
                    <li><a href="/boutique/pages/collection.php?collection=1">Audemars Piguet</a></li>
                    <li><a href="/boutique/pages/collection.php?collection=2">Blancpain</a></li>
                    <li><a href="/boutique/pages/collection.php?collection=3">Omega</a></li>
                </ol>
            </li>
            <li><a href="">Nous trouver</a></li>
            <li><a href="/boutique/pages/about.php">À propos</a></li>
        </ul>
    </nav>
</header>