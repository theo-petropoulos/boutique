<?php
include_once 'Manager.php';

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
     * @param $id
     */
    public function updateAdmin($id)
    {
        $sql = 'UPDATE admin SET 
                login = ?, password= ? ,
                WHERE id=' . $id;
    }

    /**
     * Suppression d'un compte administrateur ppar son id passé en param
     * @param $id
     */
    public function deleteAdmin($id)
    {
        $sql = 'DELETE FROM admin WHERE id=' . $id;

    }

    /** Verification du status d'administrateur
     * @return bool
     */
    public function isAdmin(): bool
    {
        //VOIR USER THEO
    }

    /**Affiche les comtpes admin sur la page d'administration
     * @return array
     */
    public function display_Admin(): array
    {
        $sql = "SELECT * FROM admin";
        return $result = $this->getPdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

//    DISPLAY COMMANDE VOIR METHODE OU FONCTION THEO POUR L ENTREE DES COMMANDES


    /** Prends en paramètre un Objet produit et l'insert en base de donnée
     * @param Watch $product
     */
    public function insert_product(Watch $product): void
    {
        $sql = 'INSERT INTO produits (nom, prix, stock, id_marque, image, description) VALUES (?,?,?,?,?,?)';
        $sql2 = "INSERT INTO caracteristiques (Diamètre, Épaisseur, Boitier, Mouvement, Reserve, Étanchéité, produit) VALUES (?,?,?,?,?,?,?)";

        $stmt = $this->getPdo()->prepare($sql);
        $stmt2 = $this->getPdo()->prepare($sql2);

        $stmt->bindValue(1, $product->getNom());
        $stmt->bindValue(2, $product->getPrix());
        $stmt->bindValue(3, $product->getStock());
        $stmt->bindValue(4, $product->getMarque());
        $stmt->bindValue(5, $product->getNomImage());
        $stmt->bindValue(6, $product->getDescription());
        $stmt->execute();

        $stmt2->bindValue(1, $product->getDiametre());
        $stmt2->bindValue(2, $product->getEpaisseur());
        $stmt2->bindValue(3, $product->getBoitier());
        $stmt2->bindValue(4, $product->getMouvement());
        $stmt2->bindValue(5, $product->getReserve());
        $stmt2->bindValue(6, $product->getEtancheite());
        $stmt2->bindValue(7, $product->getId());
        $stmt2->execute();
    }


    /** Modifie le stock et le prix du produit instancié (coché sur la page administration
     * @param Watch $product
     */
    public function update_Product(Watch $product)
    {
        $sql = 'UPDATE produits SET
                prix = ?, stock= ? ,
                WHERE id=' . $product->getId();
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->bindValue(1, $product->getPrix());
        $stmt->bindValue(2, $product->getStock());
    }


    /**
     * Supprime un produit de la BDD
     * @param int $id id du produit a supprimer
     */
    public function delete_product(int $id)
    {
        $sql = 'DELETE FROM produits WHERE id=' . $id;
        $this->getPdo()->query($sql);
    }

    /** Insertion d'une nouvelle collection
     * @param string $collection
     */
    public function insert_collection(string $collection)
    {
        $sql = 'INSERT INTO marques (nom) VALUES (?)';
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->bindValue(1, $collection);
        $stmt->execute();
    }

    /**
     * Supprime une ollection
     * @param int $id id de la collection à retirer
     */
    public function delete_collection(int $id)
    {
        $sql = 'DELETE FROM produits WHERE id=' . $id;
        $this->getPdo()->query($sql);
    }

    /** Retourne le prix promotionnel d'un produit a affiché si la promo éxiste
     * @param Watch $product le produit concerné par la remise
     * @param int Entier representant la remise en pourcentage
     * @return float
     */
    public
    function apply_promo(Watch $product, int $remise): float
    {
        return ($remise * $product->getPrix()) % 100;
    }
    //Statut des commandes a voir necessite la refonte de la BDD
}
