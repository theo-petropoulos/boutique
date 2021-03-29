<?php
include_once '../model/class/Admin.php';
include_once '../model/class/Manager.php';
include_once '../model/class/ManAdmin.php';
include_once '../model/class/ManWatch.php';
include_once '../model/class/ManPromo.php';
include_once '../model/class/Watch.php';
session_start();
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
<?php require_once __DIR__ . '/globals/header.php'; ?>
<main class=="container_page">
    <?php
    //    Si admin connecté display link différentes page de l'UI admin
    if (isset($_SESSION['Admin-KEY']) && password_verify('vonharper6559571991', $_SESSION['Admin-KEY'])): ?>
        <div class="box_link_admin">
            <style>#btn_conn_admin{display: none}</style>
            <a href="?path=admin-clients" class="link_admin">Gestion clients</a>
            <a href="?path=admin-shop" class="link_admin">Gestion du magasin</a>
            <a href="?path=create-admin" class="link_admin">Crée un nouvel Admin</a>
        </div>
    <?php endif; ?>
    <!--    Si pas de chemin en get affiche la home page d'administration-->
    <?php
    if (!isset($_GET['path'])) {
        require_once '../UI-admin/home-admin.php';
    } ?>
    <?php
    //    Routeur manuel des differentes page de l'UI Admin'
    if (isset($_GET['path']) && $_GET['path'] === 'admin-clients') {
        require_once '../UI-admin/administration_clients.php';
    } elseif (isset($_GET['path']) && $_GET['path'] === 'admin-shop') {
        require_once '../UI-admin/administration_shop.php';
    } elseif (isset($_GET['path']) && $_GET['path'] === 'create-admin') {
        require_once '../UI-admin/create_admin.php';
    } elseif (isset($_GET['path']) && $_GET['path'] === 'connect-admin') {
        require_once '../UI-admin/connect_admin.php';
    } else {
        require_once '404.php';
    }
    ?>
</main>
<?php require_once __DIR__ . '/globals/footer.php'; ?>
