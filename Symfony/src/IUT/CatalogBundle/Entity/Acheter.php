<?php

namespace IUT\CatalogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acheter
 *
 * @ORM\Table(name="Achat", indexes={@ORM\Index(name="IDX_A1B3A884D7B589C1", columns={"Code_Abonné"})})
 * @ORM\Entity
 */
class Acheter
{
    /**
     * @var integer
     *
     * @ORM\OneToOne(targetEntity="Enregistrement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Enregistrement", referencedColumnName="Code_Morceau")
     * })
     *
     */
    private $codeEnregistrement;
     //* @ORM\Column(name="Code_Enregistrement", type="integer", nullable=false)

    /**
     * @var \Enregistrement
     *
     * @ORM\Column(name="Code_Achat", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeAchat;

    /**
     * @var \Abonné
     *
     * @ORM\ManyToOne(targetEntity="Abonne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Abonné", referencedColumnName="Code_Abonné")
     * })
     */
    private $codeAbonne;


    /**
     * Set codeEnregistrement
     *
     * @param integer $codeEnregistrement
     *
     * @return Acheter
     */
    public function setCodeEnregistrement($codeEnregistrement)
    {
        $this->codeEnregistrement = $codeEnregistrement;

        return $this;
    }

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
     * Set codeAchat
     *
     * @param integer $codeAchat
     *
     * @return Acheter
     */
    public function setCodeAchat( $codeAchat)
    {
        $this->codeAchat = $codeAchat;

        return $this;
    }

    /**
     * Get codeAchat
     *
     * @return \Enregistrement
     */
    public function getCodeAchat()
    {
        return $this->codeAchat;
    }

    /**
     * Set codeAbonné
     *
     * @param Abonne $codeAbonné
     *
     * @return Acheter
     */
    public function setCodeAbonne(Abonne $codeAbonne = null)
    {
        $this->codeAbonne = $codeAbonne;

        return $this;
    }

    /**
     * Get codeAbonné
     *
     * @return \Abonné
     */
    public function getCodeAbonne()
    {
        return $this->codeAbonne;
    }
}
