<?php
    $ip='gblfrpz@gmail.com';
    echo $_SERVER['REMOTE_ADDR']. PHP_EOL;
    $cipher = "AES-128-CTR"; 
    $ivlength = openssl_cipher_iv_length($cipher);
    echo $ivlength . PHP_EOL;
    $iv=openssl_random_pseudo_bytes($ivlength);
    echo $iv . PHP_EOL;
    $key='Là c\'est l\'adresse mail qu\'on crypte.';
    $crypt=openssl_encrypt($ip, $cipher, $key, 0, $iv);
    echo $crypt . PHP_EOL;

    echo "<br> iv = " . $iv . "<br>";
    $test=openssl_decrypt($crypt, $cipher, $key, 0, $iv);
    echo $test;