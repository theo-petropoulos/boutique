<?php
    $basket=array_filter(explode('&id=', $_COOKIE['basket']));
    $basket=organize_array($basket);
    $subtotal=0;
    $shipping=number_format((7.95+(50/100*count($basket)*7.95)),2,'.',',');
    ?><section id="table_section">
        <table>
            <thead>
                <tr>
                    <th> </th>
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
                        $watch->hydrate($array->getProductByID($key));
                        $url='/boutique/assets/images/produits/'.$watch->getNomImage();
                        $subtotal=intval($subtotal)+intval($watch->getPrix()*$value);?>
                        <td class="tdimg"><img src="<?=$url;?>"></td>
                        <td class="tdname"><a href="/boutique/pages/produit.php?produit=<?=$watch->getId();?>&collection=<?=$watch->getMarque();?>"><?=ucfirst(strtolower($watch->getNom()));?></a></td>
                        <td><?=$value;?></td>
                        <td><?=number_format($watch->getPrix(),2,'.',',');?></td>
                        <td><?=number_format(($watch->getPrix()*$value),2,'.',',');?></td>
                    </tr>
                <?php } $total=$subtotal+$shipping?>
                <tr>
                    <td class="blanktotal" colspan="3" rowspan="3"></td>
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
        <form method="post" action="checkout.php">
            <input type="hidden" name="checkout" value="<?=$_COOKIE['basket'];?>">
            <input type="submit" value="Procéder au paiement">
        </form>
    </section>
    <div class="suggestions_text"><p>Suggestions</p><span class="line"></span></div>
    <section class="suggestions">
        <?php $sugg_qty=5; include realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/panier/suggestions.php';?>
    </section>