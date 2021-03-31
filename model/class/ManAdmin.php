<?php
include_once 'Manager.php';

/**
 * Class ManAdmin Regroupe toute les fonctionnalité de gestion de L'UI d'UI-admin du site.
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

    /**Affiche les comtpes admin sur la page d'UI-admin
     * @return array
     */
    public function display_Admin(): array
    {
        $sql = "SELECT * FROM admin";
        return $result = $this->getPdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    /**Affiche les Infos clients sur la page d'UI-admin
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
        $sql = "SELECT MAX(id) as id from produits";
        $res = $this->getPdo()->query($sql)->fetch(PDO::FETCH_ASSOC);
        var_dump($res);
        $stmt2->bindValue(1, $watch->getDiametre());
        $stmt2->bindValue(2, $watch->getEpaisseur());
        $stmt2->bindValue(3, $watch->getBoitier());
        $stmt2->bindValue(4, $watch->getMouvement());
        $stmt2->bindValue(5, $watch->getReserve());
        $stmt2->bindValue(6, $watch->getEtancheite());
        $stmt2->bindValue(7, $res['id']);
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
     * @return false|PDOStatement
     */
    public function delete_product(int $id)
    {
        $sql = 'DELETE FROM produits WHERE id=' . $id;
        return $this->getPdo()->query($sql);
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
     * @return false|PDOStatement
     */
    public function delete_collection(int $id)
    {
        $sql = 'DELETE FROM produits WHERE id=' . $id;
        return $this->getPdo()->query($sql);
    }

    /** Retourne le prix promotionnel d'un produit a affiché si la promo éxiste
     * @param Watch $product le produit concerné par la remise
     * @param int Entier representant la remise en pourcentage
     * @return float
     */
    public function apply_promo(Watch $product, int $remise): float
    {
        return ($remise * $product->getPrix()) / 100;
    }

    /** Supprime la promotion dont l'id est passé en paramètre
     * @param $id
     * @return false|PDOStatement
     */
    public function delete_promotion($id)
    {
        $sql = 'DELETE FROM promotion WHERE id=' . $id;
        return $this->getPdo()->query($sql);
    }

    /** Affiche les commande lié à un même client prends en paramètre l'identifiant client
     * @param $id_client //Identifiant du client dont vous souhaiter consulter les factures/commandes
     * @return array
     */
    public function displayOrderById($id_client): array
    {
        $id_client = htmlspecialchars($id_client);
        $id_client = strip_tags($id_client);
        $sql = "SELECT * FROM factures where id_client = $id_client";
        $query = $this->getPdo()->query($sql);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /** Edite le suivi d'une facture pour y ajouter le status passé en parametre
     * @param $id_order /Id de la facture à supprimer
     * @param $status /Status de la commande Done Pour "livré", instance pour "en cours" et "canceled" pour annulé
     * @return false|int
     */
    public function editOrderStatus($id_order, $status)
    {
        $id_order = htmlspecialchars($id_order);
        $id_order = strip_tags($id_order);
        $sql = "UPDATE factures SET suivi = ? WHERE id=$id_order";
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->bindValue(1, $status);
        return ($stmt->execute());
    }
}
