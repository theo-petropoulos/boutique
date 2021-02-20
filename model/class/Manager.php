<?php

namespace App;

class  Manager
{

    private $_pdo;

    /**
     * Demarre une instance de PDO
     */
    public function __construct()
    {
        try {
            $PDO = new \PDO('mysql:dbname=boutique;host=localhost', 'root', '');
            $this->_pdo = $PDO;
        } catch (\PDOException $e) {
            echo 'Connexion Error:' . $e->getMessage();
        }
    }

    /**
     * @param int $id Prend en paramètre un entier representant la marque "1" = Audemars Piguet, "2" = Blancpin, "3" = Omega
     * @return array Retourne un tableau de produit de la marque correspondant à l'id passé en parametre
     */
    public function getProductByCollection(int $id): array
    {
        $sql = 'SELECT * FROM produits WHERE id_marque=' . $id;
        return $this->_pdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @return array Retourne un tableaucontenant le nom de chaque marque/
     */
    public function getCollection(): array
    {
        $sql = "SELECT * FROM marques";
        $result = $this->_pdo->query($sql);
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    /** Prends en parametre les informations d'un produit et les insert en BDD dans la table produit
     * @param string $nom
     * @param float $prix
     * @param int $stock
     * @param int $id_marque
     * @param string $image
     */
    public function insert_product(string $nom, float $prix, int $stock, int $id_marque, string $image): void
    {
        $sql = 'INSERT INTO produits (nom, prix, stock, id_marque, image) VALUES (?,?,?,?,?)';
        $stmt = $this->_pdo->prepare($sql);
        $stmt->bindValue(1, $nom);
        $stmt->bindValue(2, $prix);
        $stmt->bindValue(3, $stock);
        $stmt->bindValue(4, $id_marque);
        $stmt->bindValue(5, $image);
        $stmt->execute();
    }

    /**
     * @return object
     */
    public function getPdo(): object
    {
        return $this->_pdo;
    }
}