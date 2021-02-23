<?php
include_once '../model/class/Manager.php';
include_once '../model/class/ManAdmin.php';
$man = new ManAdmin();
$adminAccounts = $man->display_Admin();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/boutique.css?v=<?php echo time(); ?>">
    <link rel="icon" href="../assets/images/icon.png" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Beth+Ellen&family=Bodoni+Moda&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9ddb75d515.js" crossorigin="anonymous"></script>
    <title>Von Harper</title>
</head>

<body>
<?php include_once 'header.php'; ?>
<main class="container_page">
    <section class="administration_compte">
        <h2>Gestion des comptes Administrateurs</h2>
        <div class="box_display box_admin">
        AFFICHE LES COMPTES ADMINISTRATEURS DANS UN TABLEAU
        </div>
        <div class="box_manage box_admin">
        INTERFACE DE GESTION DES COMPTES COMPRENNANT LES FORMULAIRE
        </div>
    </section>
    <section class="administration_produit">
        <h2>Gestion du Magasin</h2>
        <div class="box_magasin box_admin">
            AFFICHE UN TABLEAU DES PRODUIT LEUR STOCK INFOS ETC AINSI QU'A COTE DE CHAQUE INFOS UNE
            POSSIBILITE DE L'EDITER
        </div>
    </section>
    <section class="administration_client">
        <h2>Gestion des clients</h2>
        <div class="box_client box_admin">
            AFFICHE UN TABLEAU DES CLIENTS Ainsi que leurs informations
        </div>
    </section>
</main>
<?php include_once 'footer.php'; ?>

</body>
</html>