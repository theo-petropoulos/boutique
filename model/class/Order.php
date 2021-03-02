<?php

    class Order{
        public $id;
        public $id_client;
        public $etat;
        public $suivi;
        public $total;
        public static $db;

        public function __construct(int $id){
            $this->id_client=$id;
            self::$db=db_link();
        }

        public function createOrder(array $items){
            $total=0;
            foreach($items as $key=>$value){
                $orderitem=new ManProduct();
                $watch = new Watch();
                $watch->hydrate($orderitem->get_one_product($key));
                $total=$total+($watch->getPrix()*$value);
            }
            $this->total=$total;
            $this->etat='Payé';
            self::insertOrder($items);
        }

        public function fetchOrders(){
            $stmt=self::$db->prepare("SELECT * FROM `factures` WHERE `id_client`=? ORDER BY `id`");
            $stmt->execute([$this->id_client]);
            $factures=$stmt->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($factures[0]['total'])){
                return $factures;
            }else return 'none';
        }

        private function insertOrder(array $items){
            $stmt=self::$db->prepare("INSERT INTO `factures`(`id_client`,`date`,`etat`,`total`) VALUES (?,CURRENT_DATE(),?,?)");
            $stmt->execute([$this->id_client, $this->etat, $this->total]);
            $facture=self::$db->query('SELECT max(`id`) as `id` FROM `factures`');
            $facture=$facture->fetch(PDO::FETCH_ASSOC);
            foreach($items as $key=>$value){
                $orderitem=new ManProduct();
                $watch = new Watch();
                $watch->hydrate($orderitem->get_one_product($key));
                $watch->bought($value,$facture['id'],self::$db);
            }
        }
    }