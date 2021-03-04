<?php

    $query=$db->query('SELECT * FROM `marques`');
    $marques=$query->fetchAll(PDO::FETCH_ASSOC);
    $amount=count($marques)-1;
    $rand=rand(0,$amount);

    foreach($marques as $key=>$value){
        if($rand==$j){
            $marque=$value;
            break;
        }
        $j++;
    }

    $id=$marque['id'];
    $query2=$db->query("SELECT * FROM `produits` WHERE `id_marque`=$id");
    $items=$query2->fetchAll(PDO::FETCH_ASSOC);

    $amount2=count($items)-1;
    $rand2=rand(0,$amount);
    $j=0;
    foreach($items as $key=>$value){
        if($rand==$j){
            $sugg=$value;
            unset($items[$key]);
            break;
        }
        else $j++;
    }
    $url='/boutique/pages/collection.php?collection=' . $marque['id'];
    ?>
    <div id="banner_desc">
        <div id="banner_left">
            <h2><?=$marque['nom'];?></h2>
            <h3><?=$sugg['nom'];?></h3>
            <p><?=$sugg['description'];?></p>
        </div>
        <div id="banner_right">
            <a href="<?=$url;?>"><i class="fas fa-chevron-circle-right"></i>Découvrir la collection</a>
        </div>
    </div>