<?php

namespace IUT\CatalogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Extraits
 *
 * @ORM\Table(name="Extraits")
 * @ORM\Entity
 */
class Extraits
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Code_Enregistrement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeEnregistrement;

    /**
     * @var binary
     *
     * @ORM\Column(name="Extrait", type="binary", nullable=true)
     */
    private $extrait;


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
     * Set extrait
     *
     * @param binary $extrait
     *
     * @return Extraits
     */
    public function setExtrait($extrait)
    {
        $this->extrait = $extrait;

        return $this;
    }

    /**
     * Get extrait
     *
     * @return binary
     */
    public function getExtrait()
    {
        return $this->extrait;
    }
}
