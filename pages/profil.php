<?php
    session_start();
    //if(isset($_COOKIE['login']) && $_COOKIE['login'] && isset($_COOKIE['password']) && $_COOKIE['password']){
        $ip=$_SERVER['REMOTE_ADDR'];
        try{
            $db=new PDO('mysql:host=localhost;dbname=boutique', 'root' , '');
        }
        catch(Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
        $mail='test@test.com';
        $stmt=$db->prepare("SELECT * FROM `mails` WHERE `adresse`=?");
        $stmt->bindParam(1, $mail, PDO::PARAM_STR);
        $stmt->execute();
        $i=0;
        foreach($stmt as $key=>$value){
            $i++;
        }
        if($i){
            $id_adresse=$value['id'];
            $stmt=$db->prepare("SELECT * FROM `clients` WHERE id_mail=?");
            $stmt->bindParam(1, $id_adresse, PDO::PARAM_INT);
            $stmt->execute();
        }
        else{
            setcookie('login', '', -1, '/');
            die('Votre connexion a expiré, veuillez vous reconnecter.');
        }
    //}
?>