<?php

//namespace App;
class Product
{
    private $_nom;
    private $_marque;
    private $_stock;
    private $_prix;
    private $_NomImage;

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
}