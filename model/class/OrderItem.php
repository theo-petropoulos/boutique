<?php

    class OrderItem extends Order{
        public $id;
        public $marque;
        public $quantity;
        public $nom;
        public $prix;

        public function __construct(int $id, int $quantity){
            $this->id=$id;
            $this->quantity=$quantity;
            self::fetchInfos();
        }

        private function fetchInfos(){
            $stmt=self::$db->prepare('SELECT `id_marque`, `nom`, `prix` FROM `produits` WHERE `id`=?');
            $stmt->execute([$this->id]);
            $results=$stmt->fetch(PDO::FETCH_ASSOC);
            $stmt2=self::$db->prepare('SELECT `nom` FROM `marques` WHERE `id`=?');
            $stmt2->execute([$results['id_marque']]);
            $marque=$stmt2->fetch(PDO::FETCH_ASSOC);
            unset($results['id_marque']);
            $results['marque']=$marque['nom'];
            foreach($results as $key=>$value){
                $this->$key=$value;
            }
        }
    }