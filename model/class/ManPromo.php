<?php
require_once 'Watch.php';
require_once 'Manager.php';

class ManPromo extends Manager
{
    /** Insert une promotion en base de donné
     * @param Promo $Promo
     * @return bool
     */
    public function insert_promo(Promo $Promo): bool
    {
        $sql = "INSERT INTO promotion (nom, pourcentage, debut, fin, id_produit) VALUES (?,?,?,?,?)";
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->bindValue(1, $Promo->getNom());
        $stmt->bindValue(2, $Promo->getPourcentage());
        $stmt->bindValue(3, $Promo->getDateDebut());
        $stmt->bindValue(4, $Promo->getDateFin());
        $stmt->bindValue(5, $Promo->getIdProduit());
        return $stmt->execute();
    }

    /**Verifie si une promo existe retourne la promotion en question sous forme de tableau (Method version objet pour page produit)
     * @param Watch $watch
     * @return array|NULL
     */
    public function get_promo(Watch $watch): array|null
    {
        $array = null;
        $dateTime = new DateTime('now');
        $date = $dateTime->format('Y-m-d');
        $sql = 'SELECT * FROM promotion WHERE id =' . $watch->getId();
        $result = $this->getPdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $index => $item) {
            $date >= $item['debut'] && $date <= $item['fin'] ? $array = $item : $array = NULL;
        }
        return $array;
    }

    /** Verifie si une promo existe retourne la promotion en question sous forme de tableau (Method version normal pour page collection)
     * @param object $Obj
     * @return null
     */
    public function get_promo_objects(object $Obj)
    {
        $array [] = null;
        $dateTime = new DateTime('now');
        $date = $dateTime->format('Y-m-d');
        $sql = 'SELECT * FROM promotion WHERE id =' . $Obj->id;
        $result = $this->getPdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $index => $item) {
            $date >= $item['debut'] && $date <= $item['fin'] ? array_push($array, $Obj->prix, $item['pourcentage']) : $array = NULL;
        }
        return $array;
    }

    public function del_promo(int $id)
    {

    }

}
