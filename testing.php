<?php
    // $ip='gblfrpz@gmail.com';
    // echo $_SERVER['REMOTE_ADDR']. PHP_EOL;
    // $cipher = "AES-128-CTR"; 
    // $ivlength = openssl_cipher_iv_length($cipher);
    // echo $ivlength . PHP_EOL;
    // $iv=openssl_random_pseudo_bytes($ivlength);
    // echo $iv . PHP_EOL;
    // $key='Là c\'est l\'adresse mail qu\'on crypte.';
    // $crypt=openssl_encrypt($ip, $cipher, $key, 0, $iv);
    // echo $crypt . PHP_EOL;

    // echo "<br> iv = " . $iv . "<br>";
    // $test=openssl_decrypt($crypt, $cipher, $key, 0, $iv);
    // echo $test;

    // echo "<br>" . time()-1616192009;

    // $ip='127.0.0.1';
    $cipher="AES-128-CTR";
    // $ivlength=openssl_cipher_iv_length($cipher);
     $iv=1590302205571235;
     $key="L'ipée et le bouclier, l'adresse et la dextérité.";
    // $crypt=openssl_encrypt($ip, $cipher, $key, 0, $iv);
    // echo $crypt;
    //VRYLw/Sf2O3a
    $link='/boutique/pages/profil?id=EAELZzap)"1+é)à&"/&test=039)"=:.!';
    echo $link;
    $decrypt=openssl_decrypt('VRYLw/Sf2O3a', $cipher, $key, 0, $iv);
    echo $decrypt;
    // $a='3';
    // $b=3;

    // $test = $a ?? 'nope';
    // $test2 = $c ?? 'test';

    // echo $test . '<br>' . $test2;