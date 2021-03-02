<?php

    //Sub to newsletter
    function sub_newsletter(array $post){
        if(filter_var($post['mail'], FILTER_VALIDATE_EMAIL)){
            $db=db_link();
            $newsletter= new User($post, $db);
            return $newsletter->subscribe();
        }
        else return 'suberr';
    }

    //Verify the user's registration
    function verify_sub(array $post){
        if( isset($post['firstname']) && $post['firstname'] && isset($post['lastname']) && $post['lastname'] &&
            isset($post['mail']) && $post['mail'] && isset($post['password']) && $post['password'] &&
            isset($post['cpassword']) && $post['cpassword'] && isset($post['numadress']) && $post['numadress'] &&
            isset($post['adress']) && $post['adress'] && isset($post['postal']) && $post['postal'] &&
            isset($post['city']) && $post['city'] && isset($post['phone']) && $post['phone']){
                //Verify possible sql injections to ban IP malicious users
                $inj_report=0;
                foreach($post as $key=>$value){
                    $array=explode(' ',$post[$key]);
                    foreach($array as $key2=>$value2){
                        if(preg_match_all('#\b(select|from|insert|into|remove|delete|sort by)\b#i',$array[$key2])){
                            $inj_report++;
                        }
                    }
                }
                if($inj_report>=2){
                    return 'errban';
                }
                //Verify if the passwords match
                else if($post['password']!=$post['cpassword']){
                    return 'errmatch';
                }
                //Verify if the password is strong
                else if(!verify_pwd($post['password'])){
                    return 'errpwd';
                }
                //Verify if there is unauthorized characters in mail, name, city and postal code
                else if (
                    (!filter_var($post['mail'], FILTER_VALIDATE_EMAIL)) ||
                    (!preg_match("/^[a-zA-Z-'âàéèêôîûÂÀÉÈÊ ]*$/",$post['lastname'])) || 
                    (!preg_match("/^[a-zA-Z-'âàéèêôîûÂÀÉÈÊ ]*$/",$post['firstname'])) ||
                    (!preg_match("/^[0-9]*$/",$post['postal'])) || 
                    (!preg_match("/^[0-9]*$/",$post['postal'])) ||
                    (preg_match("@[0-9]@", $post['city']) ||
                    $post['postal']<1 || $post['postal']>99999)
                ){
                    return 'errinput';
                }
                //Verify if there is already an user using this mail, else attempt to create user
                else{
                    $db=db_link();
                    $stmt=$db->prepare('SELECT `id` FROM `clients` WHERE `id_mail`=(SELECT `id` FROM `mails` WHERE `mail`=?)');
                    $stmt->execute([$post['mail']]);
                    $stmt=$stmt->fetchAll(PDO::FETCH_ASSOC);
                    if(!empty($stmt)){
                        return 'errexist';
                    }
                    else{
                        try{
                            $user= new User($post, $db);
                            return $user->register();
                        } catch(Exception $e){
                            echo $e->getMessage(), "\n";
                        }
                    }
                }
        }
        //If a data is missing
        else{
            return 'errpost';
        }
    }

    //Create an authtoken
    function create_token(){
        $date = (new DateTime())->getTimeStamp();
        $ip=$_SERVER['REMOTE_ADDR'];
        $start=random_int(1000,9999);
        $end=random_int(1000,9999);
        $token=$start . "-" . $date . ":" . $ip . "+" . $end;
        $iterations = random_int(30000,90000);
        $salt = openssl_random_pseudo_bytes(16);
        $hash = hash_pbkdf2("sha256", $token, $salt, $iterations, 32);
        return $hash;
    }

    //Verify a user's connection
    function verify_connect(array $post){
        if(isset($post['mail_connect']) && $post['mail_connect'] && isset($post['password_connect']) && $post['password_connect']){
            if(filter_var($post['mail_connect'], FILTER_VALIDATE_EMAIL)){
                $db=db_link();
                $array=['mail'=>$post['mail_connect'], 'password'=>$post['password_connect']];
                $user=new User($array, $db);
                return $user->connect();
            }
        }
        else return 'auth_gen_err';
    }

    //Set correct keys for update
    function update_keys(array $post){
        unset($post['modify_infos']);
        foreach($post as $key=>$value){
            $word='';
            for($j=7;$j<strlen($key);$j++){
                $word.=$key[$j];
            }
            $post[$word]=$value;
            unset($post[$key]);
        }
        return $post;
    }

    //Verify the user's update
    function verify_update(array $post){
        if (
            (!filter_var($post['mail'], FILTER_VALIDATE_EMAIL)) ||
            (!preg_match("/^[0-9]*$/",$post['postal'])) ||
            (!preg_match("/^[0-9]*$/",$post['phone'])) ||
            (preg_match("@[0-9]@", $post['city']) ||
            (intval($post['postal'])<1 || intval($post['postal'])>99999))
        ){
            return 0;
        }
        return 1;
    }

    //Verify if the password is strong
    function verify_pwd(string $password){
        if( !preg_match('@[A-Z]@', $password) || !preg_match('@[a-z]@', $password) ||
            !preg_match('@[0-9]@', $password) || !preg_match('@[^\w]@', $password) ||
            strlen($password)<8 ){
                return 0;
            }
        else{
            return 1;
        }
    }

    //Verify if value is a product
    function verify_product(int $a){
        $db=db_link();
        $search=$db->prepare('SELECT `nom` FROM `produits` WHERE `id`=?');
        $search->execute([$a]);
        $found=$search->fetch(PDO::FETCH_ASSOC);
        if(isset($found['nom']) && $found['nom']){
            return 'valid';
        }
        else return 0;
    }

    //Verify is a basket is valid
    function verify_checkout(string $string){
        $basket=array_filter(explode('&id=', $string));
        $basket=organize_array($basket);
        foreach($basket as $key=>$value){
            if(!verify_product($key)){
                return 0;
            }
        }
        return 1;
    }

    //Organize an array
    function organize_array(array $array){
        $ord=[];
        foreach($array as $key=>$value){
            if(isset($ord[$value]) && $ord[$value]){
                $ord[$value]++;
            }
            else $ord[$value]=1;
        }
        return $ord;
    }