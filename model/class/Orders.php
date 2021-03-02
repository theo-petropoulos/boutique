<?php

class Orders
{
    public $userID;
    public $orders;
    public static $db;

    public function __construct($userID, $db)
    {
        $this->userID = $userID;
        self::$db = $db;
        self::fetchOrders();
    }

    public function getOrders()
    {
        return $this->orders;
    }

    public function fetchOrders()
    {
        $stmt = self::$db->prepare('SELECT DISTINCT `date_commande` AS `date` FROM `commandes` WHERE `id_client`=?');
        $stmt->execute([$this->userID]);
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($res)) {
            for ($i = 0; isset($res[$i]) && $res[$i]; $i++) {
                $date = $res[$i]['date'];
                $stmt2 = self::$db->prepare(
                    'SELECT `id` AS `orderID`, `id_produit` AS `productID`, `quantite_produit` AS `quantity`, 
                        `prix` AS `price` FROM `commandes` WHERE `date_commande`=?');
                $stmt2->execute([$date]);
                $res2[$date] = $stmt2->fetchAll(PDO::FETCH_ASSOC);
            }
            $this->orders = $res2;
        } else {
            $this->orders = 'none';
        }
    }

    public function display_orders(): void
    {
        $array = [];
        $sql = "SELECT * FROM commandes";
        $res = self::$db->query($sql);
        $DBcommandes = $res->fetchAll(PDO::FETCH_NUM);
        for ($i = 0; isset($DBcommandes[$i]); $i++) {
            $date = new DateTime($DBcommandes[$i]['date']);
            $strDate = $date->format('Y-m-d H:i');
        }
    }
}