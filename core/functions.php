<?php

    function verify_sub(array $post){
        if( isset($post['firstname']) && $post['firstname'] && isset($post['lastname']) && $post['lastname'] &&
            isset($post['mail']) && $post['mail'] && isset($post['password']) && $post['password'] &&
            isset($post['cpassword']) && $post['cpassword'] && isset($post['numadress']) && $post['numadress'] &&
            isset($post['adress']) && $post['adress'] && isset($post['postal']) && $post['postal'] &&
            isset($post['city']) && $post['city'] && isset($post['phone']) && $post['phone']){
                if($post['password']!=$post['cpassword']){
                    return 'errmatch';
                }
                else if(
                    !preg_match('@[A-Z]@', $post['password']) || !preg_match('@[a-z]@', $post['password']) ||
                    !preg_match('@[0-9]@', $post['password']) || !preg_match('@[^\w]@', $post['password']) ||
                    strlen($post['password'])<8
                ){
                    return 'errpwd';
                }
                else if (
                    (!filter_var($post['mail'], FILTER_VALIDATE_EMAIL)) ||
                    (!preg_match("/^[a-zA-Z-'âàéèêôîûÂÀÉÈÊ ]*$/",$post['lastname'])) || 
                    (!preg_match("/^[a-zA-Z-'âàéèêôîûÂÀÉÈÊ ]*$/",$post['firstname'])) ||
                    (!preg_match("/^[0-9]*$/",$post['postal'])) ||
                    (preg_match("@[0-9]@", $post['city']))
                ){
                    return 'errinput';
                }
                else{
                    try{
                        $user= new User($post);
                        var_dump($user);
                    } catch(Exception $e){
                        echo $e->getMessage(), "\n";
                    }
                }
        }
        else{
            return 'errpost';
        }
    }