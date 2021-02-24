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
            $query=self::$db->prepare("SELECT 
                (SELECT `id` FROM `mails` WHERE `mail`=?) AS `id_mail`,
                (SELECT `id` FROM `ip` WHERE `ip`=?) AS `id_ip`");
            $query->execute([$this->mail, $this->ip]);
            $exist=$query->fetch(PDO::FETCH_ASSOC);
            foreach($exist as $key=>$value){
                if($value!==NULL){
                    $exist[$key]=intval($value);
                }
            }

            //Select max id from mail,adresses,clients
            $query=self::$db->query("SELECT
                (SELECT MAX(id) FROM `mails`) as `id_mail`,
                (SELECT MAX(id) FROM `clients`) as `id_client`");
            $res=$query->fetch(PDO::FETCH_ASSOC);

            //If there's a match in mail, the id_mail to insert in client is this match's id
            if($exist['id_mail']!==NULL){
                $res['id_mail']=$exist['id_mail'];
            }
            //If there's no match for mail in the db
            else{
                //If there's at least one entry in mail, the id_mail to insert is this entry's id++, else it's 1
                if($res['id_mail']!==NULL){
                    $res['id_mail']++;
                }else $res['id_mail']=1;
                $query=self::$db->prepare('INSERT INTO `mails` (mail,newsletter) VALUES (?,0)');
                $query->execute([$this->mail]);
            }
            //If there's at least one entry in clients...
            if($res['id_client']!==NULL){
                $res['id_client']++;
            }else $res['id_client']=1;

            //Authtoken will be used to keep the user connected through a cookie when he will tick 'remember me' while logging in
            //It will be updated upon every login
            $authtoken=createToken();
            $query=self::$db->prepare('INSERT INTO `clients` (nom,prenom,id_mail,telephone,password,authkey) VALUES(?,?,?,?,?,?)');
            $query->execute([$this->lastname, $this->firstname, $res['id_mail'], $this->phone, $this->password, $authtoken]);

            //If there is a match for ip in the db, the id_client from ip is updated to the new user's id
            if($exist['id_ip']!==NULL){
                $query=self::$db->prepare("UPDATE `ip` SET `id_client`=?");
                $query->execute([$res['id_client']]);
            }else{
                echo $res['id_client'];
                $query=self::$db->prepare("INSERT INTO `ip` (ip, id_client, blacklist) VALUES (?,?,0)");
                $query->execute([$this->ip, $res['id_client']]);
            }

            //Insert into table adresses the adress from the new user
            $query=self::$db->prepare('INSERT INTO `adresses` (id_client,numero,rue,complement,code_postal,ville) VALUES(?,?,?,?,?,?)');
            $query->execute([$res['id_client'],$this->numadress, $this->adress, $this->compadress, $this->postal, $this->city]);
            return 'subsuccess';
        }
    }