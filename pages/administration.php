<?php
include_once '../model/class/Manager.php';
include_once '../model/class/ManAdmin.php';
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/boutique.css?v=<?php echo time(); ?>">
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

        </div>
        <div class="manage_box box_admin">
            interface DE GESTION DES COMPTES COMPRENNANT LES FORMULAIRE
        </div>
    </section>
</main>
<?php include_once 'footer.php'; ?>

</body>
</html>