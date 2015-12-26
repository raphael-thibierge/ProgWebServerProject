<?php

namespace IUT\CatalogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Composer
 *
 * @ORM\Table(name="Composer", indexes={@ORM\Index(name="IDX_6105648EE694D5AB", columns={"Code_Musicien"}), @ORM\Index(name="IDX_6105648ECB48FCBD", columns={"Code_Oeuvre"})})
 * @ORM\Entity
 */
class Composer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Code_Composer", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeComposer;


    /**
     * @var \Musicien
     *
     * @ORM\ManyToOne(targetEntity="Musicien")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Musicien", referencedColumnName="Code_Musicien")
     * })
     */
    private $codeMusicien;

    /**
     * @var \Oeuvre
     *
     * @ORM\ManyToOne(targetEntity="Oeuvre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Oeuvre", referencedColumnName="Code_Oeuvre")
     * })
     */
    private $codeOeuvre;


    /**
     * Get codeComposer
     *
     * @return integer
     */
    public function getCodeComposer()
    {
        return $this->codeComposer;
    }


    /**
     * Set codeMusicien
     *
     * @param \Musicien $codeMusicien
     *
     * @return Composer
     */
    public function setCodeMusicien(\Musicien $codeMusicien = null)
    {
        $this->codeMusicien = $codeMusicien;

        return $this;
    }

    /**
     * Get codeMusicien
     *
     * @return \Musicien
     */
    public function getCodeMusicien()
    {
        return $this->codeMusicien;
    }

    /**
     * Set codeOeuvre
     *
     * @param \Oeuvre $codeOeuvre
     *
     * @return Composer
     */
    public function setCodeOeuvre(\Oeuvre $codeOeuvre = null)
    {
        $this->codeOeuvre = $codeOeuvre;

        return $this;
    }

    /**
     * Get codeOeuvre
     *
     * @return \Oeuvre
     */
    public function getCodeOeuvre()
    {
        return $this->codeOeuvre;
    }
}
