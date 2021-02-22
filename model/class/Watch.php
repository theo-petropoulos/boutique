<?php

//namespace App;
class Watch
{
    private $_nom;
    private $_marque;
    private $_stock;
    private $_prix;
    private $_NomImage;
    private $diametre;
    private $epaisseur;
    private $boitier;
    private $mouvement;
    private $reserve;
    private $etancheite;

    public function hydrate(array $array)
    {
        foreach ($array as $index => $item) {
            $method = 'set' . ucfirst($index);
            if (method_exists($this, $method)) {
                $this->$method($item);
            }
        }
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
     * @return string
     */
    public function getNomImage(): string
    {
        return $this->_NomImage;
    }

    /**
     * @return mixed
     */
    public function getBoitier()
    {
        return $this->boitier;
    }

    /**
     * @return mixed
     */
    public function getDiametre()
    {
        return $this->diametre;
    }

    /**
     * @return mixed
     */
    public function getEpaisseur()
    {
        return $this->epaisseur;
    }

    /**
     * @return mixed
     */
    public function getEtancheite()
    {
        return $this->etancheite;
    }

    /**
     * @return mixed
     */
    public function getMouvement()
    {
        return $this->mouvement;
    }

    /**
     * @return mixed
     */
    public function getReserve()
    {
        return $this->reserve;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->_nom = $nom;
    }

    /**
     * @param string $marque
     */
    public function setMarque(string $marque): void
    {
        $this->_marque = $marque;
    }

    /**
     * @param string $prix
     */
    public function setPrix(string $prix): void
    {
        $prix = floatval($prix);
        $this->_prix = $prix;
    }

    /**
     * @param string $stock
     */
    public function setStock(string $stock): void
    {
        $stock = intval($stock);
        $this->_stock = $stock;
    }

    /**
     * @param string $image
     */
    public function setNomImage(string $image): void
    {
        $this->_NomImage = $image;
    }

    /**
     * @param mixed $boitier
     */
    public function setBoitier($boitier): void
    {
        $this->boitier = $boitier;
    }

    /**
     * @param mixed $diametre
     */
    public function setDiametre($diametre): void
    {
        $this->diametre = $diametre;
    }

    /**
     * @param mixed $epaisseur
     */
    public function setEpaisseur($epaisseur): void
    {
        $this->epaisseur = $epaisseur;
    }

    /**
     * @param mixed $etancheite
     */
    public function setEtancheite($etancheite): void
    {
        $this->etancheite = $etancheite;
    }

    /**
     * @param mixed $mouvement
     */
    public function setMouvement($mouvement): void
    {
        $this->mouvement = $mouvement;
    }

    /**
     * @param mixed $reserve
     */
    public function setReserve($reserve): void
    {
        $this->reserve = $reserve;
    }
}