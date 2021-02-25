<?php
include_once '../model/class/Manager.php';
include_once '../model/class/ManAdmin.php';
session_start();
$man = new ManAdmin();
$display_watches = $man->display_products();
$display_admins = $man->display_Admin();
var_dump($display_watches);
//$displayClient = $man ->display_clients
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/boutique.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/administration.css">
    <link rel="icon" href="../assets/images/icon.png"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Beth+Ellen&family=Bodoni+Moda&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9ddb75d515.js" crossorigin="anonymous"></script>
    <title>Von Harper</title>
</head>

<body>
<?php include_once 'header.php'; ?>
<main class="container_page">
    <section class="administration">
        <h2>Gestion des comptes Administrateurs</h2>
        <div class="display_box box_admin">
            AFFICHAGE
        </div>
        <div class="manage_box box_admin">
            FORMULAIRE
        </div>
    </section>
    <section class="administration">
        <h2>Gestion des commandes clients</h2>
        <div class="display_box box_admin">
            AFFICHAGE
        </div>
        <div class="manage_box box_admin">
            FORMULAIRE
        </div>
    </section>
    <section class="administration">
        <h2>Gestion du Magasin </h2>
        <div class="display_box box_admin">
            AFFICHAGE
            <form action="">
                <table>
                    <tr>
                        <th></th>
                        <th>Identifiant produit</th>
                        <th>Produit</th>
                        <th>Numero de Collection</th>
                        <th>Prix</th>
                        <th>Nombre en Stock</th>
                    </tr>
                    <?php foreach ($display_watches as $index => $display_watch): ?>
                        <tr>
                            <td>
                                <label for="check_product"></label>
                                <input id="check_product" type="radio">
                            </td>
                            <td><?= $display_watch->id ?></td>
                            <td><?= $display_watch->nom ?></td>
                            <td><?= $display_watch->id_marque ?></td>
                            <td><?= $display_watch->prix ?></td>
                            <td><?= $display_watch->stock ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <button type="submit">Valider</button>
            </form>
        </div>
        <div class="manage_box box_admin">
            FORMULAIRES
        </div>
    </section>
</main>
<?php include_once 'footer.php'; ?>

</body>
</html>