<?php

//namespace App;
class Product
{
    private string $_nom;
    private string $_marque;
    private int $_stock;
    private float $_prix;
    private string $_image;

    protected function hydrate(array $array)
    {
        foreach ($array as $index => $item) {
            $method = 'set' . ucfirst($index);
            if (method_exists($this, $method)) {
                $this->$method($index);
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
    public function getImage(): string
    {
        return $this->_image;
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
     * @param float $prix
     */
    public function setPrix(float $prix): void
    {
        $this->_prix = $prix;
    }

    /**
     * @param int $stock
     */
    public function setStock(int $stock): void
    {
        $this->_stock = $stock;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->_image = $image;
    }
}