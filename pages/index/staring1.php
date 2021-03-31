<?php
    $query=$db->query('SELECT distinct m.id, m.nom FROM marques m inner join produits p on p.id_marque=m.id');
    $marques=$query->fetchAll(PDO::FETCH_ASSOC);
    $amount=count($marques)-1;
    $rand=rand(0,$amount);
    while(isset($memrand) && $memrand==$rand){
        $rand=rand(0,$amount);
    }
    $j=0;

    foreach($marques as $key=>$value){
        if($rand==$j){
            $marque=$value;
            break;
        }
        $j++;
    }

    $id=$marque['id'];
    $query2=$db->query("SELECT * FROM `produits` WHERE `id_marque`=$id AND `stock`>0");
    $items=$query2->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($items)){
        for($i=0;$i<4;$i++){
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
            $url='/boutique/assets/images/produits/'.$sugg['image'];?>

            <figure class="watch_min">
                <a href="/boutique/pages/produit.php?produit=<?=$sugg['id'];?>&collection=<?=$id;?>">
                    <img src='<?=$url;?>' alt="Image Montre">
                </a>
                <figcaption>
                    <div class="title">
                        <h3 class="strtxt"><?=strtoupper($marque['nom']);?></h3>
                        <span class="line"></span>
                    </div>
                    <div class="name">
                        <h4><?=ucfirst(strtolower($sugg['nom']));?></h4>
                        <p><?=number_format(intval($sugg['prix']),2,'.',',');?> €</p>
                    </div>
                    <?php if($sugg['stock']>0){
                        if($sugg['stock']<3){ ?>
                        <div class="alert_text">Plus que quelques exemplaires disponibles.</div>
                        <?php } ?>
                        <form method="post" action="">
                            <input type="hidden" name="addquantity" value=1 required>
                            <input type="hidden" name="addbasket" value="<?=$sugg['id'];?>">
                            <input type="submit" value="Ajouter au panier">
                        </form>
                    <?php } 
                    else{ ?>
                        <div class="outofstock_text">Rupture de stock.</div>
                    <?php } ?>
                </figcaption>
            </figure>
        <?php }
    }
