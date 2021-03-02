<?php
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/class/ManProduct.php';
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/class/Watch.php';
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/session.php';
    $db=db_link();
    $man=new ManProduct();
    $orderItem=$man->get_one_product(7);
    $watch= new Watch();
    $watch->hydrate($orderItem);
    var_dump($watch);
    if($watch->bought(1,$db)){
        echo "acheté";
    }else echo "out of stock";
    var_dump($watch);

    // $db->query('UPDATE `produits` SET `stock`=20');