<?php

    class Newsletter{

        public $mail;
        static $db;

        public function __construct($post, $db){
            $this->mail=$post['mail'];
            self::$db=$db;
        }

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
    }