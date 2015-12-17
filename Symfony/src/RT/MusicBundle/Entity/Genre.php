<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Genre
 *
 * @ORM\Table(name="Genre")
 * @ORM\Entity
 */
class Genre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Code_Genre", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeGenre;

    /**
     * @var string
     *
     * @ORM\Column(name="Libellé_Abrégé", type="string", length=30, nullable=false)
     */
    private $libelléAbrégé;


    /**
     * Get codeGenre
     *
     * @return integer
     */
    public function getCodeGenre()
    {
        return $this->codeGenre;
    }

    /**
     * Set libelléAbrégé
     *
     * @param string $libelléAbrégé
     *
     * @return Genre
     */
    public function setLibelléAbrégé($libelléAbrégé)
    {
        $this->libelléAbrégé = $libelléAbrégé;

        return $this;
    }

    /**
     * Get libelléAbrégé
     *
     * @return string
     */
    public function getLibelléAbrégé()
    {
        return $this->libelléAbrégé;
    }
}
