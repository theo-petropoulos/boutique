<section id="profil_connected">
    <div id="block_haut">
        <h3><?=$data->lastname . " " . $data->firstname;?></h3>
        <h4><?=$data->mail;?></h4>
        <p>Adresse :<br><?=$data->numadress . " " . $data->adress . "<br>" . $data->postal . " " . $data->city;?></p>
    </div>
    <div id="block_orders">
        <p><?php
            $order_list=new Orders($data->id, $db);
            $orders=$order_list->getOrders();
            if($orders!=='none'){?>
                <table>
                    <thead>
                        <tr>
                            <th>Numéro de commande</th>
                            <th>Date</th>
                            <th>Produits commandés</th>
                            <th>Quantité</th>
                            <th>Prix</th>
                            <th>Facture</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($orders as $key=>$value){?>
                        <tr>
                            <td><p>ID COMMANDE ?</p></td>
                            <td><?=$key;?></td>
                            <td>
                                <table>
                                    <?php for($i=0;isset($orders[$key][$i]) && $orders[$key][$i];$i++){?>
                                    <tr>
                                        <td>
                                            <?=$orders[$key][$i]['productID'];?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </table>
                            </td>
                            <td>
                                <table>
                                    <?php for($i=0;isset($orders[$key][$i]) && $orders[$key][$i];$i++){?>
                                    <tr>
                                        <td>
                                            <?=$orders[$key][$i]['quantity'];?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </table>
                            </td>
                            <td>
                                <table>
                                    <?php for($i=0;isset($orders[$key][$i]) && $orders[$key][$i];$i++){?>
                                    <tr>
                                        <td>
                                            <?=$orders[$key][$i]['price'];?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </table>
                            </td>
                            <td>FACTURE</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php }
            else{
                echo "Vous n'avez pas encore effectué de commandes.";
            }
        ?></p>
    </div>
</section>