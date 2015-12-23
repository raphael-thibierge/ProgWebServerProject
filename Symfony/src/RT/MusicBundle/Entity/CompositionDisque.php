<?php

namespace RT\MusicBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompositionDisque
 *
 * @ORM\Table(name="Composition_Disque", indexes={@ORM\Index(name="IDX_6F414DB4B1A3EE1", columns={"Code_Disque"}), @ORM\Index(name="IDX_6F414DB4A1866919", columns={"Code_Enregistrement"})})
 * @ORM\Entity
 */
class CompositionDisque
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Code_Contenir", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeContenir;

    /**
     * @var integer
     *
     * @ORM\Column(name="Position", type="integer", nullable=true)
     */
    private $position;

    /**
     * @var \Disque
     *
     * @ORM\ManyToOne(targetEntity="Disque")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Disque", referencedColumnName="Code_Disque")
     * })
     */
    private $codeDisque;

    /**
     * @var \Enregistrement
     *
     * @ORM\ManyToOne(targetEntity="Enregistrement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Enregistrement", referencedColumnName="Code_Enregistrement")
     * })
     */
    private $codeEnregistrement;


    /**
     * Get codeContenir
     *
     * @return integer
     */
    public function getCodeContenir()
    {
        return $this->codeContenir;
    }

    /**
     * Set position
     *
     * @param integer $position
     *
     * @return CompositionDisque
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set codeDisque
     *
     * @param \Disque $codeDisque
     *
     * @return CompositionDisque
     */
    public function setCodeDisque(\Disque $codeDisque = null)
    {
        $this->codeDisque = $codeDisque;

        return $this;
    }

    /**
     * Get codeDisque
     *
     * @return \Disque
     */
    public function getCodeDisque()
    {
        return $this->codeDisque;
    }

    /**
     * Set codeEnregistrement
     *
     * @param \Enregistrement $codeEnregistrement
     *
     * @return CompositionDisque
     */
    public function setCodeEnregistrement(\Enregistrement $codeEnregistrement = null)
    {
        $this->codeEnregistrement = $codeEnregistrement;

        return $this;
    }

    /**
     * Get codeEnregistrement
     *
     * @return \Enregistrement
     */
    public function getCodeEnregistrement()
    {
        return $this->codeEnregistrement;
    }
}
