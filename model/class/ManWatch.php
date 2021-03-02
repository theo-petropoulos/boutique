<?php
require_once 'Manager.php';


class ManWatch extends Manager
{
    /**Récupere le produit dont on a passé l'id en parametre et retourne un tableau destiné à hydraté partiellement l'objet Watch
     * @param int $id ID du produit
     * @return array retourne un tableau destiné à hydraté l'objet Watch
     */
    public function get_one_product(int $id): array
    {
//        $sql = 'SELECT * FROM produits WHERE id=' . $id;
        $sql = 'SELECT * FROM produits INNER JOIN caracteristiques on produits.id = caracteristiques.produit';
        $result = $this->getPdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return [
            'id' => $result[0]['id'],
            'nom' => $result[0]['nom'],
            'marque' => $result[0]['id_marque'],
            'stock' => $result[0]['stock'],
            'prix' => $result[0]['prix'],
            'nomImage' => $result[0]['image'],
            'description' => $result[0]['description'],
            'diametre' => $result[0]['Diamètre'],
            'epaisseur' => $result[0]['Épaisseur'],
            'boitier' => $result[0]['Boitier'],
            'mouvement' => $result[0]['Mouvement'],
            'reserve' => $result[0]['Reserve'],
            'etancheite' => $result[0]['Étanchéité']
        ];
    }

    /** Retourne tout les produits sous forme de tableau d'objet à mettre en forme sur la page d'administration
     * @return array
     */
    public function get_products(): array
    {
        $sql = 'SELECT * FROM produits';
        return $this->getPdo()->query($sql)->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param int $id Prend en paramètre un entier representant la marque "1" = Audemars Piguet, "2" = Blancpin, "3" = Omega
     * @return array Retourne un tableau de produit de la marque correspondant à l'id passé en parametre
     */
    public function getProductByCollection(int $id): array
    {
        $sql = 'SELECT * FROM produits WHERE id_marque=' . $id;
        return $this->getPdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return array Retourne un tableaucontenant le nom de chaque marque/
     */
    public function getCollection(): array
    {
        $sql = "SELECT * FROM marques";
        $result = $this->getPdo()->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /** Retourne les caracteristique d'un produit prend le produit en paramètre
     * @param int $productId
     * @return array
     */
    public function get_carac(int $productId): array
    {
        $sql = 'SELECT * FROM caracteristiques WHERE produit=' . $productId;
        $query = $this->getPdo()->query($sql);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $array = [
            'diametre' => $result[0]['Diamètre'],
            'epaisseur' => $result[0]['Épaisseur'],
            'boitier' => $result[0]['Boitier'],
            'mouvement' => $result[0]['Mouvement'],
            'reserve' => $result[0]['Reserve'],
            'etancheite' => $result[0]['Étanchéité']
        ];

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
            'id' => $result[0]['id'],
            'nom' => $result[0]['nom'],
            'marque' => $result[0]['id_marque'],
            'stock' => $result[0]['stock'],
            'prix' => $result[0]['prix'],
            'nomImage' => $result[0]['image'],
            'description' => $result[0]['description']
        ];
    }
}
