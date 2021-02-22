<?php

//namespace App;

abstract class Manager
{
    protected $_pdo;

    /**
     * Demarre une instance de PDO
     */
    public function __construct()
    {
        unset($this->_pdo);

        try {
            $PDO = new \PDO('mysql:dbname=boutique;host=localhost', 'root', '');
            $this->_pdo = $PDO;
        } catch (\PDOException $e) {
            echo 'Connexion Error:' . $e->getMessage();
        }
    }


    /**
     * @return object
     */
    public function getPdo(): object
    {
        return $this->_pdo;
    }
}