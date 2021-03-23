<?php
    require_once realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/session.php';

    $query=$db->query('SELECT * FROM `produits` WHERE `stock`>0');
    $items=$query->fetchAll(PDO::FETCH_ASSOC);

    for($i=0;$i<$sugg_qty;$i++){
        $amount=count($items)-1;
        $rand=rand(0,$amount);
        $j=0;
        
        foreach($items as $key=>$value){
            if($rand==$j){
                $sugg=$value;
                unset($items[$key]);
                break;
            }
            else $j++;
        }

        $stmt=$db->prepare('SELECT * FROM `marques` WHERE `id`=?');
        $stmt->execute([$sugg['id_marque']]);
        $marque=$stmt->fetch(PDO::FETCH_ASSOC);

        $url='/boutique/assets/images/produits/'.$sugg['image'];?>

        <div class="sugg_product">
            <a href="/boutique/pages/produit.php?produit=<?=$sugg['id'];?>&collection=<?=$sugg['id_marque'];?>">
                <img src='<?=$url;?>' alt="Image Montre">
            </a>
            <p class="strtxt"><?=strtoupper($marque['nom']);?></p>
            <p><?=ucfirst(strtolower($sugg['nom']));?></p>
            <p><?=$sugg['prix'];?> €</p>
            <form method="post" action="">
                <input type="hidden" name="addquantity" value=1 required>
                <input type="hidden" name="addbasket" value="<?=$sugg['id'];?>">
                <input type="submit" value="Ajouter au panier">
            </form>
        </div>
    <?php } ?>