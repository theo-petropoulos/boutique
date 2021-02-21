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

    /** Retourne un tableau destiné à hydrater un objet produit
     * @param int $idCollection numero de la collection Voir pour traduire numero en fonction du nom de la collection pour L UI
     * @param int $idProduct numero du produit Voir pour traduire numero en fonction du nom produit pour l'UI Admin
     * @return array Retourne un tableau contenant les infos d'un produit spécifique
     */
    public function getProduct(int $idCollection, int $idProduct): array
    {
        $sql = 'SELECT * FROM produits WHERE id_marque=' . $idCollection . ' AND id=' . $idProduct;
        $result = $this->getPdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $array = [
            'nom' => $result[0]['nom'],
            'marque' => $result[0]['id_marque'],
            'stock' => $result[0]['stock'],
            'prix' => $result[0]['prix'],
            'nomImage' => $result[0]['image'],
        ];
    }
}