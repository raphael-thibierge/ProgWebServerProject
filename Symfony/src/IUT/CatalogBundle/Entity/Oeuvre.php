<?php


namespace IUT\CatalogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use IUT\CatalogBundle\Entity\TypeMorceaux;

/**
 * Oeuvre
 *
 * @ORM\Table(name="Oeuvre", indexes={@ORM\Index(name="IDX_32522BC898F61075", columns={"Code_Type"})})
 * @ORM\Entity
 */
class Oeuvre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Code_Oeuvre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeOeuvre;

    /**
     * @var string
     *
     * @ORM\Column(name="Titre_Oeuvre", type="string", length=0, nullable=false)
     */
    private $titreOeuvre;

    /**
     * @var string
     *
     * @ORM\Column(name="Sous_Titre", type="string", length=0, nullable=true)
     */
    private $sousTitre;

    /**
     * @var string
     *
     * @ORM\Column(name="Tonalité", type="string", length=20, nullable=true)
     */
    private $tonalité;

    /**
     * @var integer
     *
     * @ORM\Column(name="Année", type="integer", nullable=true)
     */
    private $année;

    /**
     * @var string
     *
     * @ORM\Column(name="Opus", type="string", length=20, nullable=true)
     */
    private $opus;

    /**
     * @var integer
     *
     * @ORM\Column(name="Numéro_Opus", type="integer", nullable=true)
     */
    private $numéroOpus = '0';

    /**
     * @var \TypeMorceaux
     *
     * @ORM\ManyToOne(targetEntity="TypeMorceaux")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Type", referencedColumnName="Code_Type")
     * })
     */
    private $codeType;


    /**
     * Get codeOeuvre
     *
     * @return integer
     */
    public function getCodeOeuvre()
    {
        return $this->codeOeuvre;
    }

    /**
     * Set titreOeuvre
     *
     * @param string $titreOeuvre
     *
     * @return Oeuvre
     */
    public function setTitreOeuvre($titreOeuvre)
    {
        $this->titreOeuvre = $titreOeuvre;

        return $this;
    }

    /**
     * Get titreOeuvre
     *
     * @return string
     */
    public function getTitreOeuvre()
    {
        return $this->titreOeuvre;
    }

    /**
     * Set sousTitre
     *
     * @param string $sousTitre
     *
     * @return Oeuvre
     */
    public function setSousTitre($sousTitre)
    {
        $this->sousTitre = $sousTitre;

        return $this;
    }

    /**
     * Get sousTitre
     *
     * @return string
     */
    public function getSousTitre()
    {
        return $this->sousTitre;
    }

    /**
     * Set tonalité
     *
     * @param string $tonalité
     *
     * @return Oeuvre
     */
    public function setTonalité($tonalité)
    {
        $this->tonalité = $tonalité;

        return $this;
    }

    /**
     * Get tonalité
     *
     * @return string
     */
    public function getTonalité()
    {
        return $this->tonalité;
    }

    /**
     * Set année
     *
     * @param integer $année
     *
     * @return Oeuvre
     */
    public function setAnnée($année)
    {
        $this->année = $année;

        return $this;
    }

    /**
     * Get année
     *
     * @return integer
     */
    public function getAnnée()
    {
        return $this->année;
    }

    /**
     * Set opus
     *
     * @param string $opus
     *
     * @return Oeuvre
     */
    public function setOpus($opus)
    {
        $this->opus = $opus;

        return $this;
    }

    /**
     * Get opus
     *
     * @return string
     */
    public function getOpus()
    {
        return $this->opus;
    }

    /**
     * Set numéroOpus
     *
     * @param integer $numéroOpus
     *
     * @return Oeuvre
     */
    public function setNuméroOpus($numéroOpus)
    {
        $this->numéroOpus = $numéroOpus;

        return $this;
    }

    /**
     * Get numéroOpus
     *
     * @return integer
     */
    public function getNuméroOpus()
    {
        return $this->numéroOpus;
    }

    /**
     * Set codeType
     *
     * @param TypeMorceaux $codeType
     *
     * @return Oeuvre
     */
    public function setCodeType(TypeMorceaux $codeType = null)
    {
        $this->codeType = $codeType;

        return $this;
    }

    /**
     * Get codeType
     *
     * @return \TypeMorceaux
     */
    public function getCodeType()
    {
        return $this->codeType;
    }
}
