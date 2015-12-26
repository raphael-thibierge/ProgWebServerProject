<?php

namespace IUT\CatalogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Album
 *
 * @ORM\Table(name="Album", indexes={@ORM\Index(name="IDX_F8594147E1990660", columns={"Code_Genre"}), @ORM\Index(name="IDX_F8594147EA8CE117", columns={"Code_Editeur"})})
 * @ORM\Entity
 */
class Album
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Code_Album", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeAlbum;

    /**
     * @var string
     *
     * @ORM\Column(name="Titre_Album", type="string", length=400, nullable=false)
     */
    private $titreAlbum;

    /**
     * @var integer
     *
     * @ORM\Column(name="Année_Album", type="integer", nullable=true)
     */
    private $annéeAlbum;

    /**
     * @var binary
     *
     * @ORM\Column(name="Pochette", type="blob", nullable=true)
     */
    private $pochette;

    /**
     * @var \Genre
     *
     * @ORM\ManyToOne(targetEntity="Genre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Genre", referencedColumnName="Code_Genre")
     * })
     */
    private $codeGenre;

    /**
     * @var \Editeur
     *
     * @ORM\ManyToOne(targetEntity="Editeur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Editeur", referencedColumnName="Code_Editeur")
     * })
     */
    private $codeEditeur;

    /**
     * @var string
     *
     * @ORM\Column(name="ASIN", type="string", length=400, nullable=false)
     */
    private $ASIN;

    /**
     * Get codeAlbum
     *
     * @return integer
     */
    public function getCodeAlbum()
    {
        return $this->codeAlbum;
    }

    /**
     * Set titreAlbum
     *
     * @param string $titreAlbum
     *
     * @return Album
     */
    public function setTitreAlbum($titreAlbum)
    {
        $this->titreAlbum = $titreAlbum;

        return $this;
    }

    /**
     * Get titreAlbum
     *
     * @return string
     */
    public function getTitreAlbum()
    {
        return $this->titreAlbum;
    }

    /**
     * Set annéeAlbum
     *
     * @param integer $annéeAlbum
     *
     * @return Album
     */
    public function setAnnéeAlbum($annéeAlbum)
    {
        $this->annéeAlbum = $annéeAlbum;

        return $this;
    }

    /**
     * Get annéeAlbum
     *
     * @return integer
     */
    public function getAnnéeAlbum()
    {
        return $this->annéeAlbum;
    }

    /**
     * Set pochette
     *
     * @param binary $pochette
     *
     * @return Album
     */
    public function setPochette($pochette)
    {
        $this->pochette = $pochette;

        return $this;
    }

    /**
     * Get pochette
     *
     * @return binary
     */
    public function getPochette()
    {
        return $this->pochette;
    }

    /**
     * Set codeGenre
     *
     * @param \Genre $codeGenre
     *
     * @return Album
     */
    public function setCodeGenre(\Genre $codeGenre = null)
    {
        $this->codeGenre = $codeGenre;

        return $this;
    }

    /**
     * Get codeGenre
     *
     * @return \Genre
     */
    public function getCodeGenre()
    {
        return $this->codeGenre;
    }

    /**
     * Set codeEditeur
     *
     * @param \Editeur $codeEditeur
     *
     * @return Album
     */
    public function setCodeEditeur(\Editeur $codeEditeur = null)
    {
        $this->codeEditeur = $codeEditeur;

        return $this;
    }

    /**
     * Get codeEditeur
     *
     * @return \Editeur
     */
    public function getCodeEditeur()
    {
        return $this->codeEditeur;
    }

    /**
     * @return string
     */
    public function getASIN()
    {
        return $this->ASIN;
    }

    /**
     * @param string $ASIN
     *
     * @return Album
     */
    public function setASIN($ASIN)
    {
        $this->ASIN = $ASIN;

        return $this;
    }

}
