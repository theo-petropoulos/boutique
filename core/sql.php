<?php

    function db_link(){
        $link= new PDO('mysql:host=localhost;', 'root', '');
        $link->query('CREATE DATABASE IF NOT EXISTS `boutique`');
        $db= new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
        $sql= file_get_contents('../MCD/boutique.sql');
        $sql_cr= $db->exec($sql);
        return $db;
    }

    $db=db_link();