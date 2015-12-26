<?php

namespace IUT\CatalogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Musicien
 *
 * @ORM\Table(name="Musicien")
 * @ORM\Entity(repositoryClass="IUT\CatalogBundle\Entity\MusicienRepository")
 */
class Musicien
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Code_Musicien", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeMusicien;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_Musicien", type="string", length=200, nullable=false)
     */
    private $nomMusicien;

    /**
     * @var string
     *
     * @ORM\Column(name="Prénom_Musicien", type="string", length=50, nullable=true)
     */
    private $prénomMusicien;

    /**
     * @var integer
     *
     * @ORM\Column(name="Année_Naissance", type="integer", nullable=true)
     */
    private $annéeNaissance;

    /**
     * @var integer
     *
     * @ORM\Column(name="Année_Mort", type="integer", nullable=true)
     */
    private $annéeMort;

    /**
     * @var blob
     *
     * @ORM\Column(name="Photo", type="blob", nullable=true)
     */
    private $Image;

    /**
     * @var \Pays
     *
     * @ORM\ManyToOne(targetEntity="Pays")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="Code_Pays", referencedColumnName="Code_Pays")
     * })
     */
    private $codePays;


    /**
     * Get codeMusicien
     *
     * @return integer
     */
    public function getCodeMusicien()
    {
        return $this->codeMusicien;
    }

    /**
     * Set nomMusicien
     *
     * @param string $nomMusicien
     *
     * @return Musicien
     */
    public function setNomMusicien($nomMusicien)
    {
        $this->nomMusicien = $nomMusicien;

        return $this;
    }

    /**
     * Get nomMusicien
     *
     * @return string
     */
    public function getNomMusicien()
    {
        return $this->nomMusicien;
    }

    /**
     * Set prénomMusicien
     *
     * @param string $prénomMusicien
     *
     * @return Musicien
     */
    public function setPrénomMusicien($prénomMusicien)
    {
        $this->prénomMusicien = $prénomMusicien;

        return $this;
    }

    /**
     * Get prénomMusicien
     *
     * @return string
     */
    public function getPrénomMusicien()
    {
        return $this->prénomMusicien;
    }

    /**
     * Set annéeNaissance
     *
     * @param integer $annéeNaissance
     *
     * @return Musicien
     */
    public function setAnnéeNaissance($annéeNaissance)
    {
        $this->annéeNaissance = $annéeNaissance;

        return $this;
    }

    /**
     * Get annéeNaissance
     *
     * @return integer
     */
    public function getAnnéeNaissance()
    {
        return $this->annéeNaissance;
    }

    /**
     * Set annéeMort
     *
     * @param integer $annéeMort
     *
     * @return Musicien
     */
    public function setAnnéeMort($annéeMort)
    {
        $this->annéeMort = $annéeMort;

        return $this;
    }

    /**
     * Get annéeMort
     *
     * @return integer
     */
    public function getAnnéeMort()
    {
        return $this->annéeMort;
    }

    /**
     * Set Image
     *
     * @param binary $Image
     *
     * @return Musicien
     */
    public function setImage($Image)
    {
        $this->Image = $Image;

        return $this;
    }

    /**
     * Get Image
     *
     * @return binary
     */
    public function getImage()
    {
        return $this->Image;
    }

  
    /**
     * Set codePays
     *
     * @param \IUT\MusicBundle\Entity\Pays $codePays
     *
     * @return Musicien
     */
    public function setCodePays(\IUT\MusicBundle\Entity\Pays $codePays = null)
    {
        $this->codePays = $codePays;

        return $this;
    }

    /**
     * Get codePays
     *
     * @return \Pays
     */
    public function getCodePays()
    {
        return $this->codePays;
    }



    //*************************************************************************
    //                              ADDED
    //*************************************************************************





}
