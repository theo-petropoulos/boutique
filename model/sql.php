<?php

    //Create connection to the database
    function db_link(){
        $link= new PDO('mysql:host=localhost;', 'root', '');
        $link->query('CREATE DATABASE IF NOT EXISTS `boutique`');
        $db= new PDO('mysql:host=localhost;dbname=boutique', 'root', '');
        $sql= file_get_contents(realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/MCD/boutique.sql');
        $sql_cr= $db->exec($sql);
        return $db;
    }