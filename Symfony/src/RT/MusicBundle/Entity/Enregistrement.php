<?php
namespace RT\MusicBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enregistrement
 *
 * @ORM\Table(name="Enregistrement", indexes={@ORM\Index(name="IDX_CC3BD8F7D49D5E5D", columns={"Code_Composition"})})
 * @ORM\Entity
 */
class Enregistrement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Code_Morceau", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeEnregistrement;

    /**
     * @var string
     *
     * @ORM\Column(name="Titre", type="string", length=0, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_de_Fichier", type="string", length=0, nullable=false)
     */
    private $nomDeFichier;

    /**
     * @var string
     *
     * @ORM\Column(name="Durée", type="string", length=10, nullable=true)
     */
    private $durée;

    /**
     * @var integer
     *
     * @ORM\Column(name="Durée_Seconde", type="integer", nullable=true)
     */
    private $duréeSeconde;

    /**
     * @var integer
     *
     * @ORM\Column(name="Prix", type="integer", nullable=true)
     */
    private $prix;

    /**
     * @var \Composition
     *
     * @ORM\ManyToOne(targetEntity="Composition")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Composition", referencedColumnName="Code_Composition")
     * })
     */
    private $codeComposition;


    /**
     * Get codeEnregistrement
     *
     * @return integer
     */
    public function getCodeEnregistrement()
    {
        return $this->codeEnregistrement;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Enregistrement
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set nomDeFichier
     *
     * @param string $nomDeFichier
     *
     * @return Enregistrement
     */
    public function setNomDeFichier($nomDeFichier)
    {
        $this->nomDeFichier = $nomDeFichier;

        return $this;
    }

    /**
     * Get nomDeFichier
     *
     * @return string
     */
    public function getNomDeFichier()
    {
        return $this->nomDeFichier;
    }

    /**
     * Set durée
     *
     * @param string $durée
     *
     * @return Enregistrement
     */
    public function setDurée($durée)
    {
        $this->durée = $durée;

        return $this;
    }

    /**
     * Get durée
     *
     * @return string
     */
    public function getDurée()
    {
        return $this->durée;
    }

    /**
     * Set duréeSeconde
     *
     * @param integer $duréeSeconde
     *
     * @return Enregistrement
     */
    public function setDuréeSeconde($duréeSeconde)
    {
        $this->duréeSeconde = $duréeSeconde;

        return $this;
    }

    /**
     * Get duréeSeconde
     *
     * @return integer
     */
    public function getDuréeSeconde()
    {
        return $this->duréeSeconde;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     *
     * @return Enregistrement
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return integer
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set codeComposition
     *
     * @param \RT\MusicBundle\Entity\Composition $codeComposition
     *
     * @return Enregistrement
     */
    public function setCodeComposition(\RT\MusicBundle\Entity\Composition $codeComposition = null)
    {
        $this->codeComposition = $codeComposition;

        return $this;
    }

    /**
     * Get codeComposition
     *
     * @return \RT\MusicBundle\Entity\Composition
     */
    public function getCodeComposition()
    {
        return $this->codeComposition;
    }
}
