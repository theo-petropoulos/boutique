<?php
include_once '../../model/class/Manager.php';
include_once '../../model/class/ManAdmin.php';
include_once '../../model/class/ManWatch.php';
include_once '../../model/class/Watch.php';
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/boutique.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="icon" href="../../assets/images/icon.png"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Beth+Ellen&family=Bodoni+Moda&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9ddb75d515.js" crossorigin="anonymous"></script>
    <title>Von Harper</title>
</head>
<body>
<?php include_once '../../pages/header.php' ?>
<main class="container_page">
    <section class="administration administration_magasin">
        <h2>Gestion du Magasin </h2>
        <div class="display_box box_admin">
            <h3>Liste des produits</h3>
            <table>

            </table>
        </div>
        <div class="manage_box box_admin">
            <h3>Modifier ou supprimer un Produit</h3></h4>
            <form class="form_SP" method="post">
                <div>
                    <div>
                        <label for="id_prod">Entrez l'identifiant produit que vous souhaité modifier</label>
                        <input type="text" id="id_prod" name="id_prod" placeholder="Identifiant produit">
                    </div>
                </div>
                <div class="display">
                    <label for="stock"><b>Nouveau stock</b> pour le produit</label>
                    <input type="text" id="stock" name="newstock" placeholder="Nouveau Stock">
                </div>
                <div class="display">
                    <label for="price"><b>Nouveau prix</b> pour le produit</label>
                    <input type="text" id="price" name="newprice" placeholder="Nouveau Prix">
                </div>
                <div class="error_box">

                </div>
                <div>
                    <button type="submit" name="edit_product" value="submit">Valider</button>
                </div>
            </form>
        </div>


    </section>
</main>
<?php include_once '../../pages/footer.php'; ?>
</body>
</html>