<?php
    $basket=get_basket($_COOKIE['basket']);
    if(isset($_POST['mod_item']) && $_POST['mod_item']){
        foreach($basket as $entry=>&$object){
            if($object['id']==$_POST['mod_item']){
                if(isset($_POST['sub']) && $_POST['sub']==1){
                    $object['qty']--;
                    if($object['qty']==0){
                        unset($basket[$entry]);
                    }
                }
                else if(isset($_POST['add']) && $_POST['add']==1){
                    $object['qty']++;
                }
                else if(isset($_POST['del']) && $_POST['del']==1){
                    unset($basket[$entry]);
                }
                else die("Une erreur inattendue est survenue.");
            }
        }
        setcookie('basket', get_cookie($basket), time()+36000, '/');
        $basket=get_basket($_COOKIE['basket']);
        header("Location: panier.php");
    }
    
    $subtotal=0;
    $shipping=number_format((7.95+(50/100*count($basket)*7.95)),2,'.',',');
    ?><section id="order_section">
        <div id="left_order">
            <div id="orderdesc">
                <div id="orderp">
                    <p class="strtxt coloryellow">Produit</p>
                </div>
                <div id="ordern">
                    <p class="strtxt coloryellow">Quantité</p>
                    <p class="strtxt coloryellow">Prix U.</p>
                    <p class="strtxt coloryellow">Prix Total</p>
                </div>
            </div>
            <div id="order_block">
        <?php foreach($basket as $key=>$value){
            $array=new ManWatch();
            $watch=new Watch();
            $watch->hydrate($array->getProductByID($value['id']));
            $url='/boutique/assets/images/produits/'.$watch->getNomImage();
            $subtotal=intval($subtotal)+intval($watch->getPrix()*$value['qty']);?>

            <div class="orderitem_min">
                <div class="itemdesc">
                    <form method="post" action="" id="delitem">
                        <input type="hidden" name="del" value=1>
                        <input type="hidden" name="mod_item" value="<?=$watch->getId();?>">
                        <button type="submit"><i class="fas fa-times"></i></button>
                    </form>
                    <a id="aimg" href="/boutique/pages/produit.php?produit=<?=$watch->getId();?>&collection=<?=$watch->getMarque();?>"><img src="<?=$url;?>"></a>
                    <a class="strtxt coloryellow" href="/boutique/pages/collection.php?collection=<?=$watch->getMarque();?>"><?=$watch->brandName($watch->getMarque(), $db);?></a>
                    <span class="tiret"> - </span>
                    <a href="/boutique/pages/produit.php?produit=<?=$watch->getId();?>&collection=<?=$watch->getMarque();?>"><?=ucfirst(strtolower($watch->getNom()));?></a>
                </div>
                <div class="itemnumbers">
                    <div class="divqty">
                        <form method="post" action="">
                            <input type="hidden" name="sub" value=1>
                            <input type="hidden" name="mod_item" value="<?=$watch->getId();?>">
                            <input type="submit" value="-">
                        </form>
                        <?=$value['qty'];?>
                        <form method="post" action="">
                            <input type="hidden" name="add" value=1>
                            <input type="hidden" name="mod_item" value="<?=$watch->getId();?>">
                            <input type="submit" value="+">
                        </form>
                    </div>
                    <p><?=number_format($watch->getPrix(),2,'.',',');?>€</p>
                    <p class="strtxt coloryellow"><?=number_format(($watch->getPrix()*$value['qty']),2,'.',',');?>€</p>
                </div>
            </div>
            <div class="separator_white"></div>
        <?php } $total=$subtotal+$shipping?>
            </div>
        </div>
        <div id="right_order">
            <div id="right_span">
                <div id="subtotal" class="costs">
                    <p>Sous-total :</p>
                    <p><?=number_format($subtotal,2,'.',',');?>€<p>
                </div>
                <div id="shipping" class="costs">
                    <p>Frais de port :</p>
                    <p><?=number_format($shipping,2,'.',',');?>€</p>
                </div>
                <div id="total" class="costs">
                    <p>Total :</p>
                    <p><?=number_format($total,2,'.',',');?>€</p>
                </div>
                <div id="checkouts">
                    <form id="checkout" method="post" action="checkout.php">
                        <input type="hidden" name="checkout" value="<?=$_COOKIE['basket'];?>">
                        <input type="submit" value="Paiement">
                    </form>
                    <form id="paypal" method="post" action="checkout.php">
                        <input type="hidden" name="checkout" value="<?=$_COOKIE['basket'];?>">
                        <input type="submit" value="">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="suggestions_text"><p>Suggestions</p><span class="line"></span></div>
    <section class="suggestions">
        <?php $sugg_qty=5; include realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/panier/suggestions.php';?>
    </section>