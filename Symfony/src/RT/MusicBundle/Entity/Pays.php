<?php

namespace RT\MusicBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paysset
 *
 * @ORM\Table(name="Pays", uniqueConstraints={@ORM\UniqueConstraint(name="IX_Pays", columns={"Nom_Pays"})})

 * @ORM\Entity
 */
class Pays
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Code_Pays", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codePays;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_Pays", type="string", length=100, nullable=false)
     */
    private $nomPays;



    /**
     * Get codePays
     *
     * @return integer 
     */
    public function getCodePays()
    {
        return $this->codePays;
    }

    /**
     * Set nomPays
     *
     * @param string $nomPays
     * @return Paysset
     */
    public function setNomPays($nomPays)
    {
        $this->nomPays = $nomPays;

        return $this;
    }

    /**
     * Get nomPays
     *
     * @return string 
     */
    public function getNomPays()
    {
        return $this->nomPays;
    }
    public function __toString() {
        return $this->nomPays;
    }
}
