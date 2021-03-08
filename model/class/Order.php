<?php

    class Order{
        public $id;
        public $id_client;
        public $etat;
        public $suivi;
        public $total;
        public static $db;

        public function __construct(){
            self::$db=db_link();
        }

        public function createOrder(int $id,array $items){
            $this->id_client=$id;
            $total=0;
            foreach($items as $entry=>$object){
                $orderitem=new ManWatch();
                $watch = new Watch();
                $watch->hydrate($orderitem->getProductByID($object['id']));
                $total=$total+($watch->getPrix()*$object['qty']);
                if($object['qty']>$watch->getStock()){
                    return 0;
                }
            }
            $this->total=$total;
            $this->etat='Payé';
            self::insertOrder($items);
            return 1;
        }

        public function fetchOneOrder(int $id){
            $this->id=$id;
            $stmt=self::$db->prepare("SELECT * FROM `commandes` WHERE `id_facture`=?");
            $stmt->execute([$this->id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function fetchOrders(int $id){
            $this->id_client=$id;
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
            foreach($items as $entry=>$object){
                $orderitem=new ManWatch();
                $watch = new Watch();
                $watch->hydrate($orderitem->getProductByID($object['id']));
                $instock=$watch->bought($object['qty'],$facture['id'],self::$db);
            }
        }
    }