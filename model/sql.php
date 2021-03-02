<?php

    //Create connection to the database
    function db_link(){
        $link= new PDO('mysql:host=localhost;', 'root', '');
        $link->query('CREATE DATABASE IF NOT EXISTS `boutique` CHARACTER SET utf8mb4');
        $db= new PDO('mysql:host=localhost;dbname=boutique;charset=UTF8', 'root', '');
        $query=("SELECT COUNT(DISTINCT `table_name`) as `tables` FROM `information_schema`.`columns` WHERE `table_schema` = 'boutique'");
        $exist=$db->query($query);
        $exist=$exist->fetch(PDO::FETCH_ASSOC);
        if($exist['tables']<1){
            $sql= file_get_contents(realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/MCD/boutique.sql');
            $sql_cr= $db->exec($sql);
        }
        return $db;
    }

    $db=db_link();