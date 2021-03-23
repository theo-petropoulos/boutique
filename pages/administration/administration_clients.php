<?php
include_once '../../model/class/Manager.php';
include_once '../../model/class/ManAdmin.php';
include_once '../../model/class/ManWatch.php';
include_once '../../model/class/Watch.php';
session_start();
$factures = null;
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
        <?php if (isset($_POST['show_facture'])): ?>
        <?php $factures = $ManAdmin->displayOrderById($_POST['id_client']); ?>
        <div class="display_box box_admin">
            <h2>Liste des Factures</h2>
            <table>
                <tr>
                    <th class="th">iddentifiant facture/commande</th>
                    <th class="th">Identifiant client</th>
                    <th class="th">Status</th>
                    <th class="th">Suivi</th>
                    <th class="th">Date de paiement</th>
                    <th class="th">Prix TTC</th>
                </tr>
                <?php foreach ($factures as $key => $facture): ?>
                    <tr>
                        <?= '<td>' . $facture['id'] . '</td>' ?>
                        <?= '<td>' . $facture['id_client'] . '</td>' ?>
                        <?= '<td>' . $facture['etat'] . '</td>' ?>
                        <?= '<td>' . $facture['suivi'] . '</td>' ?>
                        <?= '<td>' . $facture['date'] . '</td>' ?>
                        <?= '<td>' . $facture['total'] . '€</td>' ?>
                    </tr>
                <?php endforeach; ?>
            </table>
            <?php endif; ?>
        </div>
        <div class="container_admin_client" style="width: 100%">
            <div class="manage_box box_admin" style="width: 100%">
                <fieldset class="form_manage">
                    <legend class="title_form">Consulter une commande</legend>
                    <form method="post">
                        <div class="col">
                            <label style="display: inline-block" style="color: white" for="id_client">Identifiant du
                                client</label>
                            <input style="display: inline-block" type="text" id="id_client" name="id_client"
                                   placeholder="Identifiant client">
                        </div>
                        <div class="error_box">
                            <?php if (isset($_POST['show_facture']) && $factures == false) {
                                echo "Aucune commande pour ce  client";
                            } ?>
                        </div>
                        <div>
                            <button class="btn" type="submit" name="show_facture" value="submit">Valider</button>
                        </div>
                    </form>
                </fieldset>
            </div>
            <div class="manage_box box_admin " style="width: 100%">
                <fieldset class="form_manage">
                    <legend class="title_form">Modifier l'état de suivi d'une commande</legend>
                    <form method="post">
                        <div class="col">
                            <label style="display: inline-block" for="id_facture">Identifiant de la commande</label>
                            <input style="display: inline-block" type="text" id="id_facture" name="id_facture"
                                   placeholder="Id de la commande">
                        </div>
                        <div class="form_radio">
                            <div>
                                <input type="radio" id="instance" name="status" value="instance">
                                <label for="instance">En cours</label>
                            </div>
                            <div>
                                <input type="radio" id="done" name="status" value="done">
                                <label for="done">Livré</label>
                            </div>
                            <div>
                                <input type="radio" id="cancel" name="status" value="canceled">
                                <label for="cancel">Annuler</label>
                            </div>
                        </div>
                        <!--Modifier status d'une facture/commande-->
                        <?php if (isset($_POST['edit_facture']) && isset($_POST['id_facture'])) {
                            $edited = $ManAdmin->editOrderStatus($_POST['id_facture'],$_POST['status']);
                            if ($edited === false || $edited === 0 || !isset($_POST['status'])) {
                                echo " <div class='error_box'>Identifiant de facture introuvable!</div>";
                            } else {
                                echo " <div class='success_box'>Le status de la commande comportant l'identifiant {$_POST['id_facture']} à bien été mis à jour!</div>";
                            }
                        }
                        ?>
                        <div>
                            <button class="btn" type="submit" name="edit_facture" value="submit">Valider</button>
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>
    </section>

</main>
<?php include_once '../../pages/globals/footer.php'; ?>
</body>
</html>