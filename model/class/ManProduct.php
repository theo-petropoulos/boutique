<?php

//namespace App;

class ManProduct extends Manager
{

    /**
     * @param int $id Prend en paramètre un entier representant la marque "1" = Audemars Piguet, "2" = Blancpin, "3" = Omega
     * @return array Retourne un tableau de produit de la marque correspondant à l'id passé en parametre
     */
    public function getProductByCollection(int $id): array
    {
        $sql = 'SELECT * FROM produits WHERE id_marque=' . $id;
        return $this->getPdo()->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @return array Retourne un tableaucontenant le nom de chaque marque/
     */
    public function getCollection(): array
    {
        $sql = "SELECT * FROM marques";
        $result = $this->getPdo()->query($sql);
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    /** Prends en paramètre un Objet produit et l'insert en base de donnée
     * @param Product $product
     */
    public function insert_product(Product $product): void
    {
        $sql = 'INSERT INTO produits (nom, prix, stock, id_marque, image) VALUES (?,?,?,?,?)';
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->bindValue(1, $product->getNom());
        $stmt->bindValue(2, $product->getPrix());
        $stmt->bindValue(3, $product->getStock());
        $stmt->bindValue(4, $product->getMarque());
        $stmt->bindValue(5, $product->getImage());
        $stmt->execute();
    }

}