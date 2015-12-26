<?php

namespace IUT\CatalogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Emprunter
 *
 * @ORM\Table(name="Emprunter", indexes={@ORM\Index(name="IDX_8CD23B9C5B515BDB", columns={"Code_Album"}), @ORM\Index(name="IDX_8CD23B9CD7B589C1", columns={"Code_Abonné"})})
 * @ORM\Entity
 */
class Emprunter
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Code_Emprunt", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeEmprunt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Emprunt", type="date", nullable=false)
     */
    private $dateEmprunt;

    /**
     * @var \Album
     *
     * @ORM\ManyToOne(targetEntity="Album")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Album", referencedColumnName="Code_Album")
     * })
     */
    private $codeAlbum;

    /**
     * @var \Abonné
     *
     * @ORM\ManyToOne(targetEntity="Abonne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Abonné", referencedColumnName="Code_Abonné")
     * })
     */
    private $codeAbonné;


    /**
     * Get codeEmprunt
     *
     * @return integer
     */
    public function getCodeEmprunt()
    {
        return $this->codeEmprunt;
    }

    /**
     * Set dateEmprunt
     *
     * @param \DateTime $dateEmprunt
     *
     * @return Emprunter
     */
    public function setDateEmprunt($dateEmprunt)
    {
        $this->dateEmprunt = $dateEmprunt;

        return $this;
    }

    /**
     * Get dateEmprunt
     *
     * @return \DateTime
     */
    public function getDateEmprunt()
    {
        return $this->dateEmprunt;
    }

    /**
     * Set codeAlbum
     *
     * @param \Album $codeAlbum
     *
     * @return Emprunter
     */
    public function setCodeAlbum(\Album $codeAlbum = null)
    {
        $this->codeAlbum = $codeAlbum;

        return $this;
    }

    /**
     * Get codeAlbum
     *
     * @return \Album
     */
    public function getCodeAlbum()
    {
        return $this->codeAlbum;
    }

    /**
     * Set codeAbonné
     *
     * @param \Abonné $codeAbonné
     *
     * @return Emprunter
     */
    public function setCodeAbonné(\Abonné $codeAbonné = null)
    {
        $this->codeAbonné = $codeAbonné;

        return $this;
    }

    /**
     * Get codeAbonné
     *
     * @return \Abonné
     */
    public function getCodeAbonné()
    {
        return $this->codeAbonné;
    }
}
