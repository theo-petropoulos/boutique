<?php
include_once 'Manager.php';

/**
 * Class ManAdmin Regroupe toute les fonctionnalité de gestion de L'UI d'administration du site.
 */
class ManAdmin extends Manager
{
    /**Creation d'un compte administrateur
     * @param string $mail
     * @param string $password
     * @return bool
     */
    public function createAdmin(string $mail, string $password): bool
    {
        $mail = htmlspecialchars($mail);
        $mailCheck = filter_has_var($mail, FILTER_VALIDATE_EMAIL);
        $password = htmlspecialchars($password);
        $sql = "INSERT INTO admin(login, password) VALUES (?,?)";
        if ($mailCheck == true) {
            $stmt = $this->getPdo()->prepare($sql);
            $password = password_hash($password, CRYPT_BLOWFISH);
            $stmt->bindValue(1, $mail);
            $stmt->bindValue(2, $password);
            return $stmt->execute();
        }
    }

    /**
     * Modification des données de connexion d'un administrateur
     * @param $id
     * @param Admin $admin
     * @return bool
     */
    public function updateAdmin(int $id, Admin $admin): bool
    {
        $sql = 'UPDATE admin SET 
                login = ?, password= ? ,
                WHERE id=' . $id;
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->bindValue(1, $admin->getMail());
        $stmt->bindValue(2, $admin->getPassword());
        return $stmt->execute();
    }

    /**
     * Suppression d'un compte administrateur ppar son id passé en param
     * @param $id
     */
    public function deleteAdmin(int $id)
    {
        $id = htmlspecialchars($id);
        $sql = 'DELETE FROM admin WHERE id=' . $id;
        $stmt = $this->getPdo()->query($sql);
    }

    /** Verification du status d'administrateur
     * @return bool
     */
    public function isAdmin(Admin $admin): bool
    {
        return ($admin->getRole() == "administrateur") ? true : false;
    }

    /**Affiche les comtpes admin sur la page d'administration
     * @return array
     */
    public function display_Admin(): array
    {
        $sql = "SELECT * FROM admin";
        return $result = $this->getPdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    /**Affiche les Infos clients sur la page d'administration
     * @return array
     */
    public function display_clients(): array
    {
        $sql = "SELECT * FROM clients";
        return $result = $this->getPdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

//    DISPLAY COMMANDE VOIR METHODE OU FONCTION THEO POUR L ENTREE DES COMMANDES


    /** Prends en paramètre un Objet produit et l'insert en base de donnée
     * @param Watch $watch
     */
    public function insert_product(Watch $watch): void
    {
        $sql = 'INSERT INTO produits (nom, prix, stock, id_marque, image, description) VALUES (?,?,?,?,?,?)';
        $sql2 = "INSERT INTO caracteristiques (Diamètre, Épaisseur, Boitier, Mouvement, Reserve, Étanchéité, produit) VALUES (?,?,?,?,?,?,?)";

        $stmt = $this->getPdo()->prepare($sql);
        $stmt2 = $this->getPdo()->prepare($sql2);

        $stmt->bindValue(1, $watch->getNom());
        $stmt->bindValue(2, $watch->getPrix());
        $stmt->bindValue(3, $watch->getStock());
        $stmt->bindValue(4, $watch->getMarque());
        $stmt->bindValue(5, $watch->getNomImage());
        $stmt->bindValue(6, $watch->getDescription());
        $stmt->execute();

        $stmt2->bindValue(1, $watch->getDiametre());
        $stmt2->bindValue(2, $watch->getEpaisseur());
        $stmt2->bindValue(3, $watch->getBoitier());
        $stmt2->bindValue(4, $watch->getMouvement());
        $stmt2->bindValue(5, $watch->getReserve());
        $stmt2->bindValue(6, $watch->getEtancheite());
        $stmt2->bindValue(7, $watch->getId());
        $stmt2->execute();
    }


    /** Modifie le prix du produit passé en param
     * @param Watch $watch
     */
    public function update_price(Watch $watch)
    {
        $sql = 'UPDATE produits SET
                prix = ?
                WHERE  id= ?';
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->bindValue(1, $watch->getPrix());
        $stmt->bindValue(2, $watch->getId());
        $stmt->execute();
    }

    /** Modifie le stock  du  produit passé en parametre
     * @param Watch $watch
     */
    public function update_stock(Watch $watch)
    {
        $sql = 'UPDATE produits SET
                stock = ?
                WHERE  id= ?';
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->bindValue(1, $watch->getStock());
        $stmt->bindValue(2, $watch->getId());
        $stmt->execute();
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
        $collection = htmlspecialchars($collection);
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
        return ($remise * $product->getPrix()) / 100;
    }

}
