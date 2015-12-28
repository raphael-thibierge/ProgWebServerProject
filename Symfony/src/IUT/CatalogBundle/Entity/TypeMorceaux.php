<?php
namespace IUT\CatalogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeMorceaux
 *
 * @ORM\Table(name="Type_Morceaux")
 * @ORM\Entity
 */
class TypeMorceaux
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Code_Type", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeType;

    /**
     * @var string
     *
     * @ORM\Column(name="Libellé_Type", type="string", length=20, nullable=false)
     */
    private $libelléType;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=0, nullable=true)
     */
    private $description;


    /**
     * Get codeType
     *
     * @return integer
     */
    public function getCodeType()
    {
        return $this->codeType;
    }

    /**
     * Set libelléType
     *
     * @param string $libelléType
     *
     * @return TypeMorceaux
     */
    public function setLibelléType($libelléType)
    {
        $this->libelléType = $libelléType;

        return $this;
    }

    /**
     * Get libelléType
     *
     * @return string
     */
    public function getLibelléType()
    {
        return $this->libelléType;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return TypeMorceaux
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    public function __toString()
    {
        return $this->libelléType;
    }
}
