<?php

    class User{
        public $firstname;
        public $lastname;
        public $mail;
        protected $password;
        public $numadress;
        public $adress;
        public $compadress;
        public $phone;
        public $postal;
        public $city;
        public $ip;
        protected $authtoken;
        public static $db;

        public function __construct($post, $db){
            foreach($post as $key=>$value){
                if($key=='firstname' || $key=='lastname' || $key=='city'){
                    $this->$key=ucfirst(strtolower($value));
                }
                else if($key=='cpassword'){}
                else{
                    $this->$key=$value;
                }
            }
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
            $this->password=password_hash($this->password, PASSWORD_DEFAULT);
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

        //Connect a user
        public function connect(){
            $stmt=self::$db->prepare(
                "SELECT `password`,`id` FROM `clients` WHERE `id_mail`=
                (SELECT `id` FROM `mails` WHERE `mail`=?)");
            $stmt->execute([$this->mail]);
            $res=$stmt->fetch(PDO::FETCH_ASSOC);
            if($res['password']!==NULL){
                if(password_verify($this->password, $res['password'])){
                    $stmt2=self::$db->prepare("SELECT `id_client` FROM `ip` WHERE `ip`=?");
                    $stmt2->execute([$this->ip]);
                    $res2=$stmt2->fetch(PDO::FETCH_ASSOC);
                    if(isset($res2['id_client'])){
                        if($res['id']==$res2['id_client']){
                            $authtoken=createToken();
                            setcookie('authtoken', $authtoken,time()+360000);
                            $query=self::$db->prepare("UPDATE `clients` SET `authkey`=? WHERE `id`=?");
                            $query->execute([$authtoken, $res['id']]);
                            return 'authsuccess';
                        }
                    }
                    else return 'auth_ip_err';
                }
                else return 'auth_pwd_err';
            }
            else return 'auth_gen_err';
        }

        //Subscribe a mail to the newsletter
        public function subscribe(){
            $stmt=self::$db->prepare('SELECT * FROM `mails` WHERE `mail`=?');
            $stmt->execute([$this->mail]);
            $res=$stmt->fetch(PDO::FETCH_ASSOC);
            if(isset($res['newsletter'])){
                $stmt=self::$db->prepare('UPDATE `mails` SET `newsletter`=1 WHERE `mail`=?');
                $stmt->execute([$this->mail]);
                return 'subchanged';
            }
            else{
                $stmt=self::$db->prepare('INSERT INTO `mails` (mail,newsletter) VALUES (?,?)');
                $stmt->execute([$this->mail,1]);
                return 'subsuccess';
            }
        }

        //Authenticate the user
        public function authenticate(){
            $stmt=self::$db->prepare(
                'SELECT `ip` FROM `ip` WHERE `id_client`=
                (SELECT `authtoken` FROM `clients` WHERE `authtoken`=?)
                ');
            $stmt->execute([$this->authtoken]);
            $res=$stmt->fetch(PDO::FETCH_ASSOC);
            if($res['ip']!==NULL){
                if($res['ip']==$this->ip){
                    return 'connected';
                }
            }
            else{
                
            }
        }
    }