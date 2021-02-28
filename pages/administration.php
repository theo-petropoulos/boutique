<?php
include_once '../model/class/Manager.php';
include_once '../model/class/ManAdmin.php';
include_once '../model/class/ManProduct.php';
include_once '../model/class/Watch.php';
session_start();
$manAdmin = new ManAdmin();
$manProduct = new ManProduct();
$watch = new Watch();
$display_watches = $manProduct->get_products();
$display_admins = $manAdmin->display_Admin();
$display_clients=$manAdmin->display_clients();
var_dump($_POST);
var_dump($display_admins);

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
    <section class="administration administration_compte">
        <div>
        <h2>Gestions des comptes</h2>
        <div class="display_box box_admin">
            <table>
                <tr>
                    <th></th>
                    <th>Identifiant</th>
                    <th>Email/Login</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Adresse Postale</th>
                    <th>Adresse IP</th>
                </tr>
                <?php foreach ($display_admins as $index => $display_admin): ?>
                <tr class="tr_admin">
                    <td></td>
                    <td><?= $display_admin['id']?></td>
                    <td><?= $display_admin['login']?></td>
                </tr>
                <?php endforeach; ?>
                <?php foreach ($display_clients as $index => $display_client): ?>
                <tr class="tr_client">
                    <td></td>
                    <td><?= $display_client['id']?></td>
                    <td><?= $display_client['login']?></td>
                    <td><?= $display_client['id']?></td>
                    <td><?= $display_client['login']?></td>
                    <td><?= $display_client['id']?></td>
                    <td><?= $display_client['login']?></td>
                    <td><?= $display_client['id']?></td>
                    <td><?= $display_client['login']?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="manage_box box_admin">
            FORMULAIRE
        </div>
    </section>
    <section class="administration administration_magasin">
        <h2>Gestion du Magasin </h2>
        <div class="display_box box_admin">
            <h3>Liste des produits</h3></h4>
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
                        <td></td>
                        <td><?= $display_watch->id ?></td>
                        <td><?= $display_watch->nom ?></td>
                        <td><?= $display_watch->id_marque ?></td>
                        <td><?= $display_watch->prix ?></td>
                        <td><?= $display_watch->stock ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="manage_box box_admin">
            <h3>Modifier ou supprimer un Produit</h3></h4>

            <form class="form_SP" action="" method="post">
                <label for="id_prod">Id produit</label>
                <input type="text" id="id_prod" name="newstock" placeholder="Identifiant produit">
                <label for="stock">Modifier la quantitée en stock</label>
                <input type="text" id="stock" name="newstock" placeholder="Nouveau Stock">
                <label for="price">Modifier le prix</label>
                <input type="text" id="price" name="newprice" placeholder="Nouveau Prix">
                <button type="submit" name="submit">Valider</button>
            </form>
        </div>
        -
        <div class="manage_box box_admin">
            <div>
                <h3>Ajouter un Produit</h3>
                <form class="form_add_prod" action="" method="post">
                    <label for="id_prod">Nom</label>
                    <input type="text" id="id_prod" name="nom" placeholder="Identifiant produit">
                    <label for="id_prod">Marque</label>
                    <input type="text" id="id_prod" name="newstock" placeholder="Identifiant produit">
                    <label for="id_prod">Nombre en stock <label>
                            <input type="text" id="id_prod" name="newstock" placeholder="Identifiant produit">
                            <label for="id_prod">Nom exact de l'image du produit avec extension</label>
                            <input type="text" id="id_prod" name="newstock" placeholder="Identifiant produit">
                            <label for="id_prod">Description</label>
                            <input type="text" id="id_prod" name="newstock" placeholder="Identifiant produit">
                            <label for="id_prod">Diamètre</label>
                            <input type="text" id="id_prod" name="newstock" placeholder="Identifiant produit">
                            <label for="id_prod">Epaisseur</label>
                            <input type="text" id="id_prod" name="newstock" placeholder="Identifiant produit">
                            <label for="id_prod">Boitier</label>
                            <input type="text" id="id_prod" name="newstock" placeholder="Identifiant produit">
                            <label for="id_prod">Mouvement</label>
                            <input type="text" id="id_prod" name="newstock" placeholder="Identifiant produit">
                            <label for="id_prod">Reserve</label>
                            <input type="text" id="id_prod" name="newstock" placeholder="Identifiant produit">
                            <label for="id_prod">Étanchéité</label>
                            <input type="text" id="id_prod" name="newstock" placeholder="Identifiant produit">
                </form>
            </div>
            <div>
                <h3>Ajouter ou supprimer une Collection</h3>
                <form class="form_add_coll" action="" method="post">
                    <label for="id_prod">Nom de la collection</label>
                    <input type="text" id="id_prod" name="newstock" placeholder="Identifiant produit">
                </form>
            </div>
        </div>
        <div class="manage_box box_admin">
            <h3>Créer une promotion</h3>
            <form class="form_add_coll" action="" method="post">
                <label for="id_prod">Valeur en pourcentage de la promotion</label>
                <input type="text" id="id_prod" name="newstock" placeholder="Identifiant produit">
                <label for="id_prod">Identifiant du produit sur lequel appliquer la promotion</label>
                <input type="text" id="id_prod" name="newstock" placeholder="Identifiant produit">
            </form>
        </div>
    </section>
</main>
<?php include_once 'footer.php'; ?>

</body>
</html>