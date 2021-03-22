<?php 
    if(isset($_POST['mail']) && $_POST['mail']){
        if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
            $stmt=$db->prepare("SELECT * FROM `mails` WHERE `mail`=?");
            $stmt->execute([$_POST['mail']]);
            if($stmt->rowCount()>0){
                $message='resetpwd';
                $mail_adress=$_POST['mail'];
                require $root . 'model/mailer.php';
            }
            $return='sent';
        }else{
            $return='errinput';
        }
    }

    else if(isset($_POST['password']) && $_POST['password'] && isset($_POST['cpassword']) && $_POST['cpassword']){
        if($_POST['password']==$_POST['cpassword']){
            if(verify_pwd($_POST['password'])){
                $arr=[];
                $arr['password']=$_POST['password'];
                $cipher = "AES-128-CTR";
                $iv=7770326529905045;
                $key="Un de perdu, un de retrouvé, pas de quoi s'affoler.";
                $mail=urldecode(openssl_decrypt($_GET['m'], $cipher, $key, OPENSSL_ZERO_PADDING, $_GET['v']));
                $arr['mail']=$mail;
                $db=db_link();
                $user_pwd=new User($arr,$db);
                $user_pwd->setNewPassword();
                $confirmpwd='success';
            }else $confirmpwd='errstrenght';
        }else $confirmpwd='errmatch';
    }

    else if(isset($_GET['m']) && $_GET['m'] && isset($_GET['v']) && $_GET['v']){
        $cipher = "AES-128-CTR";
        $iv=7770326529905045;
        $key="Un de perdu, un de retrouvé, pas de quoi s'affoler.";
        $key2="L'horloge signe d'un Z du bout de son heure de pointe.";
        $mail=urldecode(openssl_decrypt($_GET['m'], $cipher, $key, OPENSSL_ZERO_PADDING, $_GET['v']));
        $time=urldecode(openssl_decrypt($_GET['t'], $cipher, $key2, OPENSSL_ZERO_PADDING, $_GET['v']));
        $exptime=time()-$time;
        if($exptime<300){
            $resetpwd='proceed';
        }
        else die("Le lien que vous avez utilisé a expiré.");
    }