<?php
//namespace App;

class ManAdmin extends Manager
{
//    INSCRIPTION
//    PROFIL
//    CONNEXION
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
        $stmt->bindValue(5, $product->getNomImage());
        $stmt->execute();
    }

    public function insert_collection(string $collection)
    {

    }

    public function update_Stock(Product $product)
    {

    }

    public function update_price(Product $product)
    {

    }

    /** Retourne le prix promotionnel d'un produit a affiché si la promo éxiste
     * @param int Entier representant la remise en pourcentage
     * @return float
     */
    public function apply_promo(int $pourcent): float
    {

    }
    //Statut des commandes a voir necessite la refonte de la BDD
}
