<?php

    function verify_sub($post){
        if(isset($post['mail']) && $post['mail'] && isset($post['password']) && $post['password'] &&
            isset($post['cpassword']) && $post['cpassword'] && isset($post['numrue']) && $post['numrue'] &&
            isset($post['adresse']) && $post['adresse'] && isset($post['codepostal']) && $post['codepostal'] &&
            isset($post['ville']) && $post['ville'] && isset($post['telephone']) && $post['telephone']){
               if($post['password']!=$post['cpassword']){
                   return 'mismatch';
               } 
        }
    }