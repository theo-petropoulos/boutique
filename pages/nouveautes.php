<?php 
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/session.php';
    //Get last 3 watches inserted into the db
    $query=$db->query('SELECT * FROM `produits` ORDER BY `id` DESC LIMIT 3');
    $results=$query->fetchAll(PDO::FETCH_ASSOC);
    foreach($results as $key=>$value){
        $query=$db->query("SELECT `nom` FROM `marques` WHERE `id`=$value[id_marque]");
        $marque=$query->fetch(PDO::FETCH_ASSOC);
        $results[$key]['marque']=$marque['nom'];
    }
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

    <?php $title= 'Nouveautés'; require $root . 'pages/globals/head.php';?>

    <body id="body_nouveautes">
    <?php include $root . 'pages/globals/header.php'; ?>
        <div id="banner_standard">
            <h2>Nos nouveautés</h2>
        </div>
        <main id="main_nouveautes">
        <?php for($i=0;$i<3;$i++){
            
            ?>
            <article class="article_nouveautes">
                <div class="image_nouveautes">
                    <a class="link_new" href="/boutique/pages/produit.php?produit=<?=$results[$i]['id'];?>&collection=<?=$results[$i]['id_marque'];?>">
                        <img src="/boutique/assets/images/produits/nouveautes/<?=$results[$i]['image'];?>" alt="Montre Omega">
                    </a>
                </div>
                <div class="text_nouveautes">
                    <a class="link_new" href="/boutique/pages/produit.php?produit=<?=$results[$i]['id'];?>&collection=<?=$results[$i]['id_marque'];?>">Voir le produit</a>
                    <details>
                        <summary><i class="fas fa-plus"></i> Description produit</summary>
                        <span class="content"><?=$results[$i]['description'];?></span>
                    </details>
                    <h2><span><?=ucfirst(strtolower($results[$i]['marque']));?></span><?=' - ' . ucfirst(strtolower($results[$i]['nom']));?></h2>
                </div>
            </article>
            <div class="separator_white"></div>
        <?php } ?>
        </main>
    <?php include $root . 'pages/globals/footer.php'; ?>
    </body>
</html>