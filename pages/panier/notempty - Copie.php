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
    ?><section id="table_section">
        <table>
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Prix total</th>
                </tr>
            </thead>
                <tbody>
                <?php
                foreach($basket as $key=>$value){?>
                    <tr>
                        <?php 
                        $array=new ManWatch();
                        $watch=new Watch();
                        $watch->hydrate($array->getProductByID($value['id']));
                        $url='/boutique/assets/images/produits/'.$watch->getNomImage();
                        $subtotal=intval($subtotal)+intval($watch->getPrix()*$value['qty']);?>
                        <td id="tdname">
                            <img src="<?=$url;?>">
                            <div class="product">
                                <a href="/boutique/pages/produit.php?produit=<?=$watch->getId();?>&collection=<?=$watch->getMarque();?>"><?=ucfirst(strtolower($watch->getNom()));?></a>
                                <div class="mod_item">
                                    <form method="post" action="" id="delitem">
                                        <input type="hidden" name="del" value=1>
                                        <input type="hidden" name="mod_item" value="<?=$watch->getId();?>">
                                        <button type="submit"><i class="fas fa-times"></i></button>
                                    </form>
                                </div>
                            </div>
                        </td>
                        <td id="tdqty">
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
                        </td>
                        <td><?=number_format($watch->getPrix(),2,'.',',');?>€</td>
                        <td><?=number_format(($watch->getPrix()*$value['qty']),2,'.',',');?>€</td>
                    </tr>
                <?php } $total=$subtotal+$shipping?>
                <tr>
                    <td class="blanktotal" colspan="2" rowspan="3"></td>
                    <td class="totals">Sous-total :</td>
                    <td class="totals cost"><?=number_format($subtotal,2,'.',',');?>€</td>
                </tr>
                <tr>
                    <td class="totals">Frais de port :</td>
                    <td class="totals cost"><?=number_format($shipping,2,'.',',');?>€</td>
                </tr>
                <tr>
                    <td class="totals"><b>Total :</b></td>
                    <td class="totals cost"><b><?=number_format($total,2,'.',',');?>€</b></td>
                </tr>
            </tbody>
        </table>
        <form id="checkout" method="post" action="checkout.php">
            <input type="hidden" name="checkout" value="<?=$_COOKIE['basket'];?>">
            <input type="submit" value="Procéder au paiement">
        </form>
    </section>
    <div class="suggestions_text"><p>Suggestions</p><span class="line"></span></div>
    <section class="suggestions">
        <?php $sugg_qty=5; include realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/panier/suggestions.php';?>
    </section>