<section id="profil_connected">
    <div id="block_haut">
        <h3><?=$data->lastname . " " . $data->firstname;?></h3>
        <h4><?=$data->mail;?></h4>
        <p>Adresse :<br><?=$data->numadress . " " . $data->adress . "<br>" . $data->postal . " " . $data->city;?></p>
    </div>
    <div>
        <p><?php
            $order_list=new Orders($data->id, $db);
            $order_list->getOrders();
            var_dump($order_list->orders);
        ?></p>
    </div>
</section>