<?php
include_once '../../model/class/Manager.php';
include_once '../../model/class/ManAdmin.php';
include_once '../../model/class/ManWatch.php';
include_once '../../model/class/Watch.php';
session_start();

$ManAdmin = new ManAdmin();
$displayClients = $ManAdmin->display_clients();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/boutique.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../../css/administration.css">
    <link rel="icon" href="../../assets/images/icon.png"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Beth+Ellen&family=Bodoni+Moda&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9ddb75d515.js" crossorigin="anonymous"></script>
    <title>Von Harper</title>
</head>
<body>
<?php include_once '../../pages/globals/header.php' ?>
<main class="container_page">
    <section class="administration administration_magasin">
        <div class="display_box box_admin">
            <h2>Liste des clients</h2>
            <table>
                <tr>
                    <th class="th">Identifiant</th>
                    <th class="th">Nom</th>
                    <th class="th">Prénom</th>
                    <th class="th">Téléphone</th>
                    <th class="th">E-mail</th>
                </tr>
                <?php foreach ($displayClients as $client): ?>
                    <tr>
                        <td><?= $client['id'] ?></td>
                        <td><?= $client['nom'] ?></td>
                        <td><?= $client['prenom'] ?></td>
                        <td><?= $client['telephone'] ?></td>
                        <td><?= 'EMAIL' ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="display_box box_admin">
            <h2>Liste des commandes</h2>
            <table>

            </table>
        </div>
        <div class="manage_box box_admin">
            <h3> Annuler une commande</h3>
            <form class="form_SP" method="post">
                <div>
                    <div>
                        <label for="id_prod">Entrez l'identifiant de la commande à annulé</label>
                        <input type="text" id="id_prod" name="id_prod" placeholder="Identifiant produit">
                    </div>
                </div>
                <div class="error_box">
                </div>
                <div>
                    <button type="submit" name="edit_product" value="submit">Valider</button>
                </div>
            </form>
        </div>
        <div class="manage_box box_admin">
            <h3> Modifier une commande</h3>
            <form class="form_SP" method="post">
                <div>
                    <div>
                        <label for="id_prod">Entrez l'identifiant de la commande à annulé</label>
                        <input type="text" id="id_prod" name="id_prod" placeholder="Identifiant produit">
                    </div>
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
<?php include_once '../../pages/globals/footer.php'; ?>
</body>
</html>