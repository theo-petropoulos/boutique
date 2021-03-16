<?php

    class User{
        public $id;
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

        public function getAllData(){
            return $this;
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
            //If there's a match in mail, the id_mail to insert in client is this match's id
            if($exist['id_mail']!==NULL){
                $res['id_mail']=$exist['id_mail'];
            }
            //If there's no match for mail in the db
            else{
                //If there's at least one entry in mail, the id_mail to insert is this entry's id++, else it's 1
                $query=self::$db->prepare('INSERT INTO `mails` (mail,newsletter) VALUES (?,0)');
                $query->execute([$this->mail]);
                $query2=self::$db->query('SELECT MAX(id) as `id_mail` FROM `mails`');
                $res=$query2->fetch(PDO::FETCH_ASSOC);
            }
            //Authtoken will be used to keep the user connected through a cookie when he will tick 'remember me' while logging in
            //It will be updated upon every login
            $authtoken=create_token();
            $this->password=password_hash($this->password, PASSWORD_DEFAULT);
            $query=self::$db->prepare('INSERT INTO `clients` (nom,prenom,id_mail,telephone,password,authkey) VALUES(?,?,?,?,?,?)');
            $query->execute([$this->lastname, $this->firstname, $res['id_mail'], $this->phone, $this->password, $authtoken]);
            $query2=self::$db->query('SELECT MAX(id) as `id_client` FROM `clients`');
            $res=$query2->fetch(PDO::FETCH_ASSOC);
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
                "SELECT clients.password,clients.id, ip.id_client, ip.ip FROM `clients` LEFT JOIN `ip` 
                ON clients.id=ip.id_client 
                WHERE `id_mail`=(SELECT `id` FROM `mails` WHERE `mail`=?)
                ");
            $stmt->execute([$this->mail]);
            $res=$stmt->fetch(PDO::FETCH_ASSOC);

            if(!is_bool($res['password'])){
                if(password_verify($this->password, $res['password'])){
                    if($this->ip==$res['ip']){
                        if($res['id']==$res['id_client']){
                            $authtoken=create_token();
                            setcookie('authtoken', $authtoken,time()+360000, '/');
                            $query=self::$db->prepare("UPDATE `clients` SET `authkey`=? WHERE `id`=?");
                            $query->execute([$authtoken, $res['id']]);
                            return 'auth_success';
                        }
                        else return 'auth_new_ip';
                    }
                    else return 'auth_new_ip';
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
                if($res['newsletter']==1){
                    return 'alreadysub';
                }
                else{
                    $stmt=self::$db->prepare('UPDATE `mails` SET `newsletter`=1 WHERE `mail`=?');
                    $stmt->execute([$this->mail]);
                    return 'subchanged';
                }
            }
            else{
                $stmt=self::$db->prepare('INSERT INTO `mails` (mail,newsletter) VALUES (?,?)');
                $stmt->execute([$this->mail,1]);
                return 'subsuccess';
            }
        }

        //Unsubscribe from it
        public function unsubscribe(){
            $stmt=self::$db->prepare('SELECT * FROM `mails` WHERE `mail`=?');
            $stmt->execute([$this->mail]);
            $res=$stmt->fetch(PDO::FETCH_ASSOC);
            if(isset($res['newsletter'])){
                $stmt=self::$db->prepare('UPDATE `mails` SET `newsletter`=0 WHERE `mail`=?');
                $stmt->execute([$this->mail]);
                return 'subchanged';
            }
            else{
                return 'suberr';
            }
        }

        //Authenticate the user
        public function authenticate(){
            $stmt=self::$db->prepare('SELECT `id` FROM `clients` WHERE `authkey`=?');
            $stmt->execute([$this->authtoken]);
            $res=$stmt->fetch(PDO::FETCH_ASSOC);
            if(!is_bool($res['id']) && $res['id']!==NULL){
                $stmt=self::$db->prepare('SELECT `ip` FROM `ip` WHERE `id_client`=?');
                $stmt->execute([$res['id']]);
                $res2=$stmt->fetch(PDO::FETCH_ASSOC);
                if($res2['ip']!==NULL && !is_bool($res2['ip'])){
                    if($res2['ip']==$this->ip){
                        self::updateFromID($res['id']);
                        $this->id=$res['id'];
                        return 'cookie_connected';
                    }
                }
                else return 'cookie_err';
            }
            else return 'cookie_err';
        }

        //Update class via ID
        public function updateFromID(int $i){
            $client_q=self::$db->prepare(
                'SELECT `nom` as `lastname`,`prenom` as `firstname`,`id_mail`,`telephone` as `phone`,
                `authkey` as `authtoken` FROM `clients` WHERE `id`=?');
            $client_q->execute([$i]);
            $client=$client_q->fetch(PDO::FETCH_ASSOC);
            $mail_q=self::$db->prepare('SELECT `mail`,`newsletter` FROM `mails` WHERE `id`=?');
            $mail_q->execute([$client['id_mail']]);
            $client=array_merge($client,$mail_q->fetch(PDO::FETCH_ASSOC));
            $adresse_q=self::$db->prepare(
                'SELECT `numero` as `numadress`, `rue` as `adress`, `complement` as `compadress`,
                `code_postal` as `postal`, `ville` as `city` FROM `adresses` WHERE `id_client`=?');
            $adresse_q->execute([$i]);
            $client=array_merge($client,$adresse_q->fetch(PDO::FETCH_ASSOC));
            unset($client['id_mail']);
            foreach($client as $a=>$b){
                $this->$a=$b;
            }
        }

        //Update user infos via ID
        public function setNewInfos(){
            $stmt=self::$db->prepare(
                'UPDATE `adresses` SET `numero`=?,`rue`=?,`complement`=?,`code_postal`=?,`ville`=?
                WHERE `id_client`=?');
            $stmt->execute([$this->numadress,$this->adress,$this->compadress,$this->postal,$this->city,$this->id]);
            $stmt2=self::$db->prepare('UPDATE `clients` SET `telephone`=? WHERE `id`=?');
            $stmt2->execute([$this->phone,$this->id]);
            $stmt3=self::$db->prepare('SELECT `id` FROM `mails` WHERE `mail`=?');
            $stmt3->execute([$this->mail]);
            $exist=$stmt3->fetch(PDO::FETCH_ASSOC);
            $mailid=self::$db->prepare('SELECT `id_mail` FROM `clients` WHERE `id`=?');
            $mailid->execute([$this->id]);
            $mailid=$mailid->fetch(PDO::FETCH_ASSOC);
            if(isset($exist['id'])){
                if($exist['id']==$mailid['id_mail']){}
                else return 'exist';
            }
            $stmt4=self::$db->prepare('UPDATE `mails` SET `mail`=? WHERE `id`=(SELECT `id_mail` FROM `clients` WHERE `id`=?)');
            $stmt4->execute([$this->mail, $this->id]);
            return 'success';
        }

        //Update user's password via ID
        public function setNewPassword(){
            $this->password=password_hash($this->password, PASSWORD_DEFAULT);
            $stmt=self::$db->prepare('UPDATE `clients` SET `password`=? WHERE `id`=?');
            $stmt->execute([$this->password,$this->id]);
        }
    }