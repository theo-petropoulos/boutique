<?php
include_once '../../model/class/Manager.php';
include_once '../../model/class/ManAdmin.php';
include_once '../../model/class/ManWatch.php';
include_once '../../model/class/ManPromo.php';
include_once '../../model/class/Watch.php';
include_once '../../model/class/Promo.php';
session_start();
//Initialisation des variables et des objet utilitaires
$manAdmin = new ManAdmin();
$manProduct = new ManWatch();
$manPromotion = new  ManPromo();
$watch = new Watch();
$AllreadySet = null;
$SetProd = null;
//Objets d'affichages
$display_watches = $manProduct->get_products();
$display_admins = $manAdmin->display_Admin();
$display_collection = $manProduct->getCollection();
$display_promotions = $manPromotion->get_promotions();
//MODIFICATION PRODUIT
if (isset($_POST['edit_product']) === "submit" && isset($_POST['id_prod']) && !empty($_POST['id_prod'])):
    $Watch2 = new Watch();
    $ProdArray = $manProduct->get_one_product(intval($_POST['id_prod']));
    $Watch2->hydrate($ProdArray);
    $SetProd = true;
    if ($SetProd && isset($_POST['newprice']) && !empty($_POST['newprice']) && isset($_POST['newstock']) && !empty($_POST['newstock'])) {
        $Watch2->setPrix(floatval($_POST['newprice']));
        $Watch2->setStock(intval($_POST['newstock']));
        $manAdmin->update_price($Watch2);
        $manAdmin->update_stock($Watch2);
        $AllreadySet = true;
        unset($_POST);
        unset($Watch2);
    } elseif ($SetProd && $AllreadySet != true && isset($_POST['newstock']) && !empty($_POST['newstock'])) {
        $Watch2->setStock(intval($_POST['newstock']));
        $manAdmin->update_stock($Watch2);
        unset($_POST);
        unset($Watch2);
    } elseif ($SetProd && $AllreadySet != true && isset($_POST['newprice']) && !empty($_POST['newprice'])) {
        $Watch2->setPrix(floatval($_POST['newprice']));
        $manAdmin->update_price($Watch2);
        unset($_POST);
        unset($Watch2);
    } else {
        $AllreadySet = false;
    }
endif;
//AJOUT PRODUIT
if (isset($_POST['add_product']) && $_POST['add_product'] === "submit"):
    $_POST['stock'] = intval($_POST['stock']);
    $_POST['prix'] = floatval($_POST['prix']);
    $_POST['id_marque'] = intval($_POST['id_marque']);
    $Watch3 = new Watch();
    $Watch3->hydrate($_POST);
    if (!empty($Watch3->getNom()) && !empty($Watch3->getMarque()) && !empty($Watch3->getStock()) && !empty($Watch3->getPrix()) && !empty($Watch3->getNomImage()) && !empty($Watch3->getDescription()) && !empty($Watch3->getDiametre()) && !empty($Watch3->getEpaisseur()) && !empty($Watch3->getBoitier()) && !empty($Watch3->getMouvement()) && !empty($Watch3->getEtancheite())) {
        $manAdmin->insert_product($Watch3);
    }
endif;
//AJOUT COLLECTION/MARQUE
if (isset($_POST['add_collection']) && $_POST['add_collection'] === "submit"):
    if (!empty($_POST['collection'])) {
        $manAdmin->insert_collection($_POST['collection']);
    }
endif;
//AJOUT PROMOTION
if (isset($_POST['promotion']) && $_POST['promotion'] === 'submit'):
    if (!empty($_POST['idProduit']) && !empty($_POST['nom']) && !empty($_POST['pourcentage']) && !empty($_POST['dateDebut']) && !empty($_POST['dateFin'])) {
        $_POST['idProduit'] = intval($_POST['idProduit']);
        $_POST['pourcentage'] = intval($_POST['pourcentage']);
        $Promo = new Promo();
        $ManPromo = new  ManPromo();
        $Promo->hydrate($_POST);
        $ManPromo->insert_promo($Promo);
    }
endif; ?>
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
        <h1>Gestion du Magasin </h1>
        <div class="display_box box_admin">
            <!--            LISTE PRODUIT TABLEAU-->
            <h2>Liste des produits</h2>
            <table class="tab_prod">
                <tr>
                    <th>Identifiant produit</th>
                    <th>Produit</th>
                    <th>Numero de Collection</th>
                    <th>Prix</th>
                    <th>Nombre en Stock</th>
                </tr>
                <?php foreach ($display_watches as $index => $display_watch): ?>
                    <tr>
                        <td><?= $display_watch->id ?></td>
                        <td><?= $display_watch->nom ?></td>
                        <td><?= $display_watch->id_marque ?></td>
                        <td><?= $display_watch->prix . '€' ?></td>
                        <td>
                            <span class="<?= $display_watch->stock <= 3 ? 'stock_low' : 'stock_high' ?>"><?= $display_watch->stock ?></span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="manage_box box_admin">
            <div class="container_form">
                <!--                FORMULAIRE EDIT PRODUCT-->
                <form method="post">
                    <fieldset class="form_edit_prod form_manage">
                        <legend class="title_form">Modifier un produit</legend>
                        <div>
                            <label for="id_prod">Entrez l'identifiant produit que vous souhaité modifier</label>
                            <input type="text" id="id_prod" name="id_prod" placeholder="Identifiant produit">
                        </div>
                        <div class="display">
                            <label for="stock"><b>Nouveau stock</b> pour le produit</label>
                            <input type="text" id="stock" name="newstock" placeholder="Nouveau Stock">
                        </div>
                        <div class="display">
                            <label for="price"><b>Nouveau prix</b> pour le produit</label>
                            <input type="text" id="price" name="newprice" placeholder="Nouveau Prix">
                        </div>
                        <?= $AllreadySet === false ? "<div class='errors_box'>Les informations renseignés sont incorrect, Merci de renseigner toutes les informations!</div>" : "<div class='success_box'>Produit modifié avec succès!</div>" ?>
                        <div>
                            <button class="btn" type="submit" name="edit_product" value="submit">Valider</button>
                        </div>
                    </fieldset>
                </form>
                <!--                FORM DELETE PRODUCT-->
                <form action="" method="post">
                    <fieldset class="form_del_prod form_manage">
                        <legend class="title_form">Supprimer un produit</legend>
                        <div>
                            <label for="id_prod">Entrez l'identifiant produit que vous souhaitez supprimer</label>
                            <input type="text" id="id_prod" name="id_prod" placeholder="Identifiant produit">
                        </div>
                        <?php
                        //DEL PRODUCT
                        if (isset($_POST['del_product']) && $_POST['del_product'] === 'submit' && isset($_POST['id_prod'])) {
                            $delProd = $manAdmin->delete_product($_POST['id_prod']);
                            if ($delProd === false) {
                                echo "<div class='error_box'>Aucune produit ne correspond à cet identifiant</div>";
                            } else echo "<div class='success_box'>Le produit à bien été supprimé avec succès!</div>";
                        }
                        ?>
                        <div>
                            <button class="btn" type="submit" name="del_product" value="submit">Valider</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>

        <div class="manage_box box_admin">
            <div>
                <!--                FORM AJOUT PRODUIT-->
                <form method="post">
                    <fieldset class="form_add_prod">
                        <legend class="title_form">Ajouter un produit</legend>
                        <div>
                            <div>
                                <label for="id_nom">Nom</label>
                                <input type="text" id="id_nom" name="nom" placeholder="Nom">
                            </div>

                            <div>
                                <label for="id_marque">Marque</label>
                                <input type="text" id="id_marque" name="marque" placeholder="Marque">
                            </div>
                            <div>
                                <label for="nb_stock">Stock</label>
                                <input type="text" id="nb_stock" name="stock" placeholder="Quantité en stock">
                            </div>
                            <div>
                                <label for="prix">Prix</label>
                                <input type="text" id="prix" name="prix" placeholder="Prix">
                            </div>
                            <div>
                                <label for="pic">Nom de l'image</label>
                                <input type="text" id="pic" name="nomImage"
                                       placeholder="Nom execte de l'image">
                            </div>
                            <div>
                                <label for="describe">Description</label>
                                <input type="text" id="describe" name="description"
                                       placeholder="Description">
                            </div>
                        </div>
                        <div>
                            <div>
                                <label for="diametre">Diamètre</label>
                                <input type="text" id="diametre" name="diametre"
                                       placeholder="Diamètre">
                            </div>
                            <div>
                                <label for="epaisseur">Épaisseur</label>
                                <input type="text" id="epaisseur" name="epaisseur"
                                       placeholder="Épaisseur">
                            </div>
                            <div>
                                <label for="boitier">Boitier</label>
                                <input type="text" id="boitier" name="boitier" placeholder="Infos boitier">
                            </div>
                            <div>
                                <label for="mouv">Mouvement</label>
                                <input type="text" id="mouv" name="mouvement"
                                       placeholder="Type de mouvement">
                            </div>
                            <div>
                                <label for="res">Reserve</label>
                                <input type="text" id="res" name="reserve" placeholder="Reserve en heure">
                            </div>
                            <div>
                                <label for="etanche">Étanchéité</label>
                                <input type="text" id="etanche" name="etancheite"
                                       placeholder="Étanchéité en mètre">
                            </div>
                        </div>
                        <div>
                            <button class="btn" type="submit" name="add_product" value="submit">Valider</button>
                        </div>
                    </fieldset>

                </form>
            </div>
        </div>

        <div class="display_box box_admin">
            <!--            TABLEAU LISTE DES COLLECTIONS-->
            <h2>Liste des collections</h2>
            <table>
                <tr>
                    <th>Identifiant de la collection</th>
                    <th>Nom de la colection</th>
                </tr>
                <?php foreach ($display_collection as $index => $coll): ?>
                    <tr>
                        <td><?= $coll->id ?></td>
                        <td><?= $coll->nom ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <div class="manage_box box_admin">
            <div class="container_form">
                <!--                FORM AJOUT DE COLLECTION-->
                <form method="post">
                    <fieldset class="form_add_coll form_manage">
                        <legend class="title_form">Ajouter une collection</legend>
                        <div>
                            <label for="id_coll">Nom de la collection</label>
                            <input type="text" id="id_coll" name="collection" placeholder="Entrez la nouvelle Marque">
                        </div>
                        <div>
                            <button class="btn" type="submit" name="add_collection" value="submit">Valider</button>
                        </div>
                    </fieldset>
                </form>
                <!--        FORM DELETE COLLECTION-->
                <form action="" method="post">
                    <fieldset class="form_del_collection form_manage">
                        <legend class="title_form">Supprimer une collection</legend>
                        <div>
                            <label for="id_prod">Entrer l'identifiant de la collection que vous souhaitez
                                supprimer</label>
                            <input type="text" id="id_coll" name="id_coll" placeholder="Identifiant collection">
                        </div>
                        <?php
                        //DEL COLLECTION
                        if (isset($_POST['del_coll']) && $_POST['del_coll'] === 'submit' && isset($_POST['id_coll'])) {
                            $delColl = $manAdmin->delete_collection($_POST['id_coll']);
                            if ($delColl === false) {
                                echo "<div class='error_box'>Aucune collection ne correspond à cet identifiant</div>";
                            } else echo "<div class='success_box'>La collection à été supprimé avec succès!</div>";
                        } ?>
                        <div>
                            <button class="btn" type="submit" name="del_coll" value="submit">Valider</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>

        <div class="display_box box_admin">
            <!--            TABLEAU LISTE DES PROMOTIONS ACTIVES-->
            <h2>Liste des promotions </h2>
            <table>
                <tr>
                    <th>Identifiant de la promotion</th>
                    <th>Nom de la promotion</th>
                    <th>Remise en pourcentage</th>
                    <th>Produit concerné par la promotion</th>
                    <th>Durée de la promotion</th>
                </tr>
                <?php foreach ($display_promotions as $promo): ?>
                    <?php $Prod = $manProduct->getProductByID($promo['id_produit']); ?>
                    <tr>
                        <td><?= $promo['id'] ?></td>
                        <td><?= $promo['nom'] ?></td>
                        <td><?= $promo['pourcentage'] ?></td>
                        <td><?= $Prod['nom'] ?></td>
                        <td><?= 'Du' . ' ' . $promo['debut'] . ' ' . 'au' . ' ' . $promo['fin'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="manage_box box_admin">
            <div class="container_form">
                <!--                FORM CREATION PROMOTION-->
                <form method="post">
                    <fieldset class="form_add_promo form_manage">
                        <legend class="title_form">Créer une promotion</legend>
                        <div>
                            <label for="promo_name">Nom de l'évenement promotionnel</label>
                            <input type="text" id="promo_name" name="nom" placeholder="Identifiant produit a soldé">
                        </div>
                        <div>
                            <label for="id_prod">Identifiant du produit sur lequel vous souhaiter appliqué une
                                promotion</label>
                            <input type="text" id="id_prod" name="idProduit" placeholder="Identifiant produit a soldé">
                        </div>
                        <div>
                            <label for="promo">Valeur en pourcentage de la promotion</label>
                            <input type="text" id="promo" name="pourcentage" placeholder="Promotion à appliquer">
                        </div>

                        <div>
                            <label for="date_debut">Date de début </label>
                            <input type="date" id="date_debut" name="dateDebut" placeholder="Debut de la promotion">
                        </div>
                        <div>
                            <label for="date_fin">Date de Fin</label>
                            <input type="date" id="date_fin" name="dateFin" placeholder="Fin de la promotion"
                        </div>
                        <div>
                            <button class="btn" type="submit" name="promotion" value="submit">Valider</button>
                        </div>
                    </fieldset>
                </form>
                <!--                FORM DELETE PROMOTION-->
                <form action="" method="post">
                    <fieldset class="form_del_promo form_manage">
                        <legend class="title_form">Supprimer une promotion</legend>
                        <div>
                            <label for="id_promo">Entrez l'identifiant de la promotion que vous souhaitez
                                supprimer</label>
                            <input type="text" id="id_promo" name="id_promo" placeholder="Identifiant promotion">
                        </div>
                        <?php
                        //DEL PROMO
                        if (isset($_POST['del_promo']) && $_POST['del_promo'] === 'submit' && isset($_POST['id_promo'])) {
                            $delPromo = $manAdmin->delete_promotion($_POST['id_promo']);
                            if ($delPromo === false) {
                                echo "<div class='error_box'>Aucune promotion ne correspond à cet identifiant</div>";
                            } else echo "<div class='success_box'>La promotion à été supprimé avec succès!</div>";
                        }
                        ?>
                        <div>
                            <button class="btn" type="submit" name="del_promo" value="submit">Valider</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </section>
</main>
<?php include_once '../../pages/globals/footer.php'; ?>
</body>
</html>