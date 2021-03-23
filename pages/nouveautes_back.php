<?php ?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

    <?php $title= 'Nouveautés'; require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/globals/head.php';?>

    <head>
        <link rel="stylesheet" href="/boutique/css/nouveautes.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="/boutique/css/global.css?v=<?php echo time(); ?>">
    </head>

    <body>
    <?php include realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/globals/header.php'; ?>
        <main>
            <div id="banner_standard">
                <h2>Nos Nouveautés</h2>
            </div>
            <div id="bg_new">
                <div class="container_sections">
                    <section class="section_new">
                        <div class="container_img_new">
                            <img class="img_new" src="../assets/images/Prestige.jpg" alt="Montre Audemars Piguet">
                        </div>
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
                    <section class="section_new">
                        <div class="container_text_new">
                            <h3 class="minor_title">FIFTY FATHOMS DE BLANCPAIN</h3>
                            <hr class="sep_new">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum quaerat quidem,
                                culpa ratione eligendi dignissimos architecto, aliquam quae odio nisi
                                corporis! Eius eum placeat dolorum laboriosam expedita dolorem architecto
                                voluptatibus!</p>
                            <a class="link_new" href="collection.php?collection=2">Consulter la collection</a>
                        </div>
                        <div class="container_img_new">
                            <img class="img_new" src="../assets/images/Nouveautes2.jpg" alt="Montre Aquatique Blanc Pain"
                                alt="">
                        </div>
                    </section>
                    <section class="section_new">
                        <div class="container_img_new">
                            <img class="img_new" src="../assets/images/hublotTK.jpg" alt="Montre Aquatique Blanc Pain"
                                alt="Montre Hubot">
                        </div>
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