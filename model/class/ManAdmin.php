<?php
include_once 'Manager.php';
//namespace App;

/**
 * Class ManAdmin Regroupe toute les fonctionnalité de gestion de L'UI d'administration du site.
 */
class ManAdmin extends Manager
{
    /**Creation d'un compte administrateur
     * @param string $login
     * @param string $password
     */
    public function createAdmin(string $login, string $password)
    {
        $login = htmlspecialchars($login);
        $password = htmlspecialchars($password);
        $sql = "INSERT INTO admin(login, password) VALUES (?,?)";
        $stmt = $this->getPdo()->prepare($sql);
        $password = password_hash($password, CRYPT_BLOWFISH);
        $stmt->bindValue(1, $login);
        $stmt->bindValue(2, $password);
        $stmt->execute();
    }

    /**
     * Modification des données de connexion d'un administrateur
     */
    public function updateAdmin()
    {

    }

    /**
     * Suppression d'un compte administrateur
     */
    public function deleteAdmin()
    {

    }

    /** Verification du status d'administrateur
     * @return bool
     */
    public function isAdmin(): bool
    {

    }

    /**Affiche les comtpes admin sur la page d'administration
     * @return array
     */
    public function display_Admin()
    {
        $sql = "SELECT * FROM admin";
        $result = $this->getPdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        var_dump($result);
    }

    /** Prends en paramètre un Objet produit et l'insert en base de donnée
     * @param Watch $product
     */
    public function insert_product(Watch $product): void
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

    /**
     * Fonction d'insertion des caracteristique d'un produit Prendra en param un tableau en production
     * @param float $diametre
     * @param float $epaisseur
     * @param string $boitier
     * @param string $mouvement
     * @param string $reserve
     * @param string $etancheite
     * @param $idProduit
     */
    public function insert_caractertistique_product(float $diametre, float $epaisseur, string $boitier, string $mouvement, string $reserve, string $etancheite, int $idProduit): void
    {
        $sql = "INSERT INTO caracteristiques (Diamètre, Épaisseur, Boitier, Mouvement, Reserve, Étanchéité, produit) VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->bindValue(1, $diametre);
        $stmt->bindValue(2, $epaisseur);
        $stmt->bindValue(3, $boitier);
        $stmt->bindValue(4, $mouvement);
        $stmt->bindValue(5, $reserve);
        $stmt->bindValue(6, $etancheite);
        $stmt->bindValue(7, $idProduit);
        $stmt->execute();
    }

    /** Insertion d'une nouvelle collection
     * @param string $collection
     */
    public function insert_collection(string $collection)
    {

    }

    /** Modifier le nombre d'un produit specifique en stock
     * @param Watch $product
     */
    public function update_Stock(Watch $product)
    {

    }

    /**Affiche la liste des produits commercialisé sur le site et leur disponibilité ainsi que leur stock
     * @return array
     */
    public function display_product(): array
    {

    }

    /**Modifie le prix d'un produit
     * @param Watch $product
     */
    public function update_price(Watch $product)
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

