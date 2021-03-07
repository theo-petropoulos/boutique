<?php ?>
<!DOCTYPE html>
<html lang="en">
<?php $title= 'Nouveautés'; require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/globals/head.php';?>
<head>
    <link rel="stylesheet" href="/boutique/css/nouveautes.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/boutique/css/global.css?v=<?php echo time(); ?>">
</head>
<body>
<?php include realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/globals/header.php'; ?>
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
                    <a class="link_new" href="collection.php?collection=1">Consulter la collection</a>
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
                    <a class="link_new" href="collection.php?collection=2">Consulter la collection</a>
                </div>
                <!-- Partie droite section -->
                <div class="container_img_new">
                    <img class="img_new" src="../assets/images/Nouveautes2.jpg" alt="Montre Aquatique Blanc Pain"
                         alt="">
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
                    <a class="link_new" href="collection.php?collection=3">Consulter la collection</a>
                </div>
            </section>
        </div>
    </div>
</main>
<?php include realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/globals/footer.php'; ?>
</body>
</html>