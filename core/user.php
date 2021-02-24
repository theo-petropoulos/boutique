<?php

    class User{
        public $firstname;
        public $lastname;
        public $mail;
        public $password;
        public $numadress;
        public $adress;
        public $compadress;
        public $phone;
        public $postal;
        public $city;
        public $ip;
        public static $db;

        public function __construct($post, $db){
            $this->firstname=ucfirst(strtolower($post['firstname']));
            $this->lastname=ucfirst(strtolower($post['lastname']));
            $this->mail=$post['mail'];
            $this->password=password_hash($post['password'], PASSWORD_DEFAULT);
            $this->numadress=$post['numadress'];
            $this->adress=$post['adress'];
            $this->compadress=$post['compadress'];
            $this->phone=$post['phone'];
            $this->postal=$post['postal'];
            $this->city=ucfirst(strtolower($post['city']));
            $this->ip=$_SERVER['REMOTE_ADDR'];
            self::$db=$db;
        }

        public function register(){
            //Look for mail and/or ip in the db
            $query=$db->prepare("SELECT 
                (SELECT `id` FROM `mail` WHERE `mail`=?) AS `id_mail`,
                SELECT `id` FROM `ip` WHERE `ip`=?) AS `id_ip`");
            $query->execute([$this->mail, $this->ip]);
            $exist=$query->fetch(PDO::FETCH_ASSOC);

            //Select max id from mail,adresses,clients
            $query=$db->query("SELECT
                (SELECT MAX(id) FROM `mail`) as `id_mail`,
                (SELECT MAX(id) FROM `adresses`) as `id_adresse`,
                (SELECT MAX(id) FROM `clients`) as `id_clients`");
            $res=$query->fetch(PDO::FETCH_ASSOC);

            //If there's a match in mail, the id_mail to insert in client is this match's id
            if(!is_bool($exist['id_mail'])){
                $res['id_mail']=$exist['id_mail'];
            }
            //If there's no match for mail in the db
            else {
                //If there's at least one entry in mail, the id_mail to insert is this entry's id++, else it's 1
                if(!is_bool($res['id_mail'])){
                    $res['id_mail']++;
                }else $res['id_mail']=1;
                $query=self::$db->prepare('INSERT INTO `mail` (mail,newsletter) VALUES (?,0)');
                $query->execute([$this->mail]);
            }
            //If there's at least one entry in adresse...
            if(!is_bool($res['id_adresse'])){
                $res['id_adresse']++;
            }else $res['id_adresse']=1;
            //If there's at least one entry in clients...
            if(!is_bool($res['id_clients'])){
                $res['id_clients']++;
            }else $res['id_clients']=1;

            //If there is a match for ip in the db, the id_client from ip is updated to the new user's id
            if(!is_bool($exist['id_ip'])){
                $query=self::$db->prepare("UPDATE `ip` SET `id_client`=?");
                $query->execute([$res['id_client']]);
            }else{
                $query=self::$db->prepare("INSERT INTO `ip` (ip, id_client) VALUES (?,'$id_client'");
                $query->execute([$this->ip]);
            }

            //Insert into table adresses the adress from the new user
            $query=self::$db->prepare('INSERT INTO `adresses` (numero,rue,complement,code_postal,ville) VALUES(?,?,?,?,?)');
            $query->execute([$this->numadress, $this->adress, $this->$compadress, $this->postal, $this->city]);

            //Authtoken will be used to keep the user connected through a cookie when he will tick 'remember me' while logging in
            //It will be updated upon every login
            $query=self::$db->prepare('INSERT INTO `clients` (id_adresse,nom,prenom,id_mail,telephone,`password`,authkey) VALUES(?,?,?,?,?,?,?)');
            $query->execute([$res['id_adresse'], $this->nom, $this->prenom, $res['id_mail'], $this->phone, $this->password, $authkey]);
        }
    }