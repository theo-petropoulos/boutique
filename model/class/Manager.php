<?php


abstract class Manager
{
    private $_pdo;

    /**
     * Demarre une instance de PDO
     */
    public function __construct()
    {
        try {
            $PDO = new PDO('mysql:dbname=boutique;host=localhost', 'root', '');
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Table caracteristiques = accent donc set utf8mb4
            $PDO->exec("SET CHARACTER SET utf8mb4");
            $this->setPdo($PDO);
        } catch (PDOException $e) {
            echo 'Error:' . $e->getMessage();
        }

    }

    /**
     * @return PDO
     */
    public function getPdo(): PDO
    {
        return $this->_pdo;
    }

    /**
     * @param PDO $pdo
     */
    public function setPdo(PDO $pdo): void
    {
        $this->_pdo = $pdo;
    }
}