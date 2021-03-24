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
    //TEST
    if (isset($_SESSION['Admin-KEY']) && password_verify($_SESSION['Admin-KEY'], 'vonharper6559571991')): ?>
        <a href="<?= __DIR__ . 'UI-admin?path=admin-clients' ?>">Adminsitration Clients</a>
        <a href="<?= __DIR__ . 'UI-admin?path=admin-shop' ?>">Administration Shop</a>
        <a href="<?= __DIR__ . 'UI-admin?path=admin-shop' ?>">Crée un nouvel Administrateur</a>
    <?php endif;
    ?>
    -->
    <?php
    #MAPPING ROUTE Admin form and manage pages
    if (isset($_GET['path']) && $_GET['path'] === 'create-admin') {
        require 'UI-admin/create_admin.php';
    } elseif (isset($_GET['path']) && $_GET['path'] === 'admin-clients') {
        require 'UI-admin/administration_clients.php';
    } elseif (isset($_GET['path']) && $_GET['path'] === 'admin-shop') {
        require 'UI-admin/administration_shop.php';
    } elseif (isset($_GET['path']) && $_GET['path'] === 'connect-admin') {
        require 'UI-admin/connect_admin.php';
    } else {
        echo "Page inexistante";
    }
    ?>
</main>
<?php require_once __DIR__ . '/globals/footer.php'; ?>
