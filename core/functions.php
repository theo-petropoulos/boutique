<?php

    //Verify the user's input
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
                        if(preg_match_all('#\b(select|from|insert|into|remove|delete|sort by|)\b#i',$array[$key])){
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
                else if(
                    !preg_match('@[A-Z]@', $post['password']) || !preg_match('@[a-z]@', $post['password']) ||
                    !preg_match('@[0-9]@', $post['password']) || !preg_match('@[^\w]@', $post['password']) ||
                    strlen($post['password'])<8
                ){
                    return 'errpwd';
                }
                //Verify if there is unauthorized characters in mail, name, city and postal code
                else if (
                    (!filter_var($post['mail'], FILTER_VALIDATE_EMAIL)) ||
                    (!preg_match("/^[a-zA-Z-'âàéèêôîûÂÀÉÈÊ ]*$/",$post['lastname'])) || 
                    (!preg_match("/^[a-zA-Z-'âàéèêôîûÂÀÉÈÊ ]*$/",$post['firstname'])) ||
                    (!preg_match("/^[0-9]*$/",$post['postal'])) ||
                    (preg_match("@[0-9]@", $post['city']))
                ){
                    return 'errinput';
                }
                //Verify if there is already an user using this mail, else attempt to create user
                else{
                    $db=db_link();
                    $stmt=$db->prepare('SELECT `id` FROM `clients` WHERE `id_mail`=(SELECT `id` FROM `mail` WHERE `mail`=?)');
                    $stmt->execute([$post['mail']]);
                    $stmt=$stmt->fetchAll(PDO::FETCH_ASSOC);
                    if(!is_bool($stmt)){
                        return 'errexist';
                    }
                    else{
                        try{
                            $user= new User($post, $db);
                            $user->register();
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