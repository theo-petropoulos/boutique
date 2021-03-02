<?php
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/class/OrderItem.php';

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
                $orderitem=new OrderItem(intval($key), intval($value));
                $total=$total+$orderitem->prix;
            }
            $this->total=$total;
            $this->etat='Payé';
            self::insertOrder();
        }

        public function fetchOrders(){
            $stmt=self::$db->prepare("SELECT * FROM `factures` WHERE `id_client`=? ORDER BY `id`");
            $stmt->execute([$this->id_client]);
            $factures=$stmt->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($factures[0]['total'])){
                return $factures;
            }else return 'none';
        }

        private function insertOrder(){
            $stmt=self::$db->prepare("INSERT INTO `factures`(`id_client`,`date`,`etat`,`total`) VALUES (?,CURRENT_DATE(),?,?)");
            $stmt->execute([$this->id_client, $this->etat, $this->total]);
        }

    }