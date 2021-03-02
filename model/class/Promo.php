<?php

class Promo extends Watch
{
    private string $_nom;
    private int $_idProduit;
    private int $_pourcentage;
    private string $_dateDebut;
    private string $_dateFin;

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->_nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->_nom = $nom;
    }

    /**
     * @return int
     */
    public function getIdProduit(): int
    {
        return $this->_idProduit;
    }

    /**
     * @param int $produit
     */
    public function setIdProduit(int $produit): void
    {
        $this->_idProduit = $produit;
    }

    /**
     * @return int
     */
    public function getPourcentage(): int
    {
        return $this->_pourcentage;
    }

    /**
     * @param int $promotion
     */
    public function setPourcentage(int $promotion): void
    {
        $this->_pourcentage = $promotion;
    }

    /**
     * @return string
     */
    public function getDateDebut(): string
    {
        return $this->_dateDebut;
    }

    /**
     * @param string $dateDebut
     */
    public function setDateDebut(string $dateDebut): void
    {
        $this->_dateDebut = $dateDebut;
    }

    /**
     * @return string
     */
    public function getDateFin(): string
    {
        return $this->_dateFin;
    }

    /**
     * @param string $dateFin
     */
    public function setDateFin(string $dateFin): void
    {
        $this->_dateFin = $dateFin;
    }

}