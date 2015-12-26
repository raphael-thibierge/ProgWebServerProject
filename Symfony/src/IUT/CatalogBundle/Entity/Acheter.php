<?php

namespace IUT\CatalogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acheter
 *
 * @ORM\Table(name="Acheter", indexes={@ORM\Index(name="IDX_A1B3A884D7B589C1", columns={"Code_Abonné"})})
 * @ORM\Entity
 */
class Acheter
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Code_Enregistrement", type="integer", nullable=false)
     */
    private $codeEnregistrement;

    /**
     * @var \Enregistrement
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Enregistrement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Achat", referencedColumnName="Code_Enregistrement")
     * })
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
    private $codeAbonné;


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
     * @param \Enregistrement $codeAchat
     *
     * @return Acheter
     */
    public function setCodeAchat(\Enregistrement $codeAchat)
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
     * @param \Abonné $codeAbonné
     *
     * @return Acheter
     */
    public function setCodeAbonné(\Abonné $codeAbonné = null)
    {
        $this->codeAbonné = $codeAbonné;

        return $this;
    }

    /**
     * Get codeAbonné
     *
     * @return \Abonné
     */
    public function getCodeAbonné()
    {
        return $this->codeAbonné;
    }
}
