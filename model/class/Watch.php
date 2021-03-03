<?php

class Watch
{
    private int $_id;
    private string $_nom;
    private string $_marque;
    private int $_stock;
    private float $_prix;
    private $_prixPromo;
    private string $_NomImage;

    private string $description;
    private float $diametre;
    private float $epaisseur;
    private string $boitier;
    private string $mouvement;
    private string $reserve;
    private string $etancheite;

    public function hydrate(array $array)
    {
        foreach ($array as $index => $item) {
            $method = 'set' . ucfirst($index);
            if (method_exists($this, $method)) {
                $securitem = strip_tags($item);
                $this->$method(htmlspecialchars($securitem));
            }
        }
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->_id;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->_nom;
    }

    /**
     * @return string
     */
    public function getMarque(): string
    {
        return $this->_marque;
    }

    /**
     * @return int
     */
    public function getStock(): int
    {
        return $this->_stock;
    }

    /**
     * @return float
     */
    public function getPrix(): float
    {
        return $this->_prix;
    }

    /**
     * @return float|NULL
     */
    public function getPrixPromo()
    {
        return $this->_prixPromo;
    }

    /**
     * @return string
     */
    public function getNomImage(): string
    {
        return $this->_NomImage;
    }

    /**
     * @return string
     */
    public function getReserve(): string
    {
        return $this->reserve;
    }

    /**
     * @return string
     */
    public function getMouvement(): string
    {
        return $this->mouvement;
    }

    /**
     * @return string
     */
    public function getEtancheite(): string
    {
        return $this->etancheite;
    }

    /**
     * @return float
     */
    public function getEpaisseur(): float
    {
        return $this->epaisseur;
    }

    /**
     * @return float
     */
    public function getDiametre(): float
    {
        return $this->diametre;
    }

    /**
     * @return string
     */
    public function getBoitier(): string
    {
        return $this->boitier;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $id = intval(htmlspecialchars($id));
        $this->_id = $id;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $nom = htmlspecialchars($nom);
        $this->_nom = $nom;
    }

    /**
     * @param string $marque
     */
    public function setMarque(string $marque): void
    {
        $marque = htmlspecialchars($marque);
        $this->_marque = $marque;
    }

    /**
     * @param float|int $prix
     */
    public function setPrix($prix): void
    {
        $prix = floatval($prix);
        $this->_prix = $prix;
    }

    /**
     * @param string $stock
     */
    public function setStock(string $stock): void
    {

        $stock = intval(htmlspecialchars($stock));
        $this->_stock = $stock;
    }

    /**
     * @param float|NULL $prixPromo
     */
    public function setPrixPromo($prixPromo): void
    {
        $this->_prixPromo = $prixPromo;
    }

    /**
     * @param string $image
     */
    public function setNomImage(string $image): void
    {
        $image = htmlspecialchars($image);
        $this->_NomImage = $image;
    }

    /**
     * @param string $reserve
     */
    public function setReserve(string $reserve): void
    {
        $reserve = htmlspecialchars($reserve);
        $this->reserve = $reserve;
    }

    /**
     * @param string $mouvement
     */
    public function setMouvement(string $mouvement): void
    {
        $mouvement = htmlspecialchars($mouvement);
        $this->mouvement = $mouvement;
    }

    /**
     * @param string $etancheite
     */
    public function setEtancheite(string $etancheite): void
    {
        $etancheite = htmlspecialchars($etancheite);
        $this->etancheite = $etancheite;
    }

    /**
     * @param float $epaisseur
     */
    public function setEpaisseur(float $epaisseur): void
    {
        $epaisseur = htmlspecialchars($epaisseur);
        $this->epaisseur = $epaisseur;
    }

    /**
     * @param float $diametre
     */
    public function setDiametre(float $diametre): void
    {
        $diametre = htmlspecialchars($diametre);
        $this->diametre = $diametre;
    }

    /**
     * @param string $boitier
     */
    public function setBoitier(string $boitier): void
    {
        $this->boitier = $boitier;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getSpecs($db)
    {
        $stmt = $db->prepare('SELECT * FROM `produits` WHERE `id`=?');
        $stmt->execute([$this->_id]);
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt2 = $db->prepare('SELECT `nom` FROM `marques` WHERE `id`=?');
        $stmt2->execute([$results['id_marque']]);
        $marque = $stmt2->fetch(PDO::FETCH_ASSOC);
        $results['marque'] = $marque['nom'];
        return $results;
    }
}