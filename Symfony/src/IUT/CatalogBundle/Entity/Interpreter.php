<?php
namespace IUT\CatalogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Interpréter
 *
 * @ORM\Table(name="Interpréter", indexes={@ORM\Index(name="IDX_12B376CFE694D5AB", columns={"Code_Musicien"}), @ORM\Index(name="IDX_12B376CFA1866919", columns={"Code_Enregistrement"}), @ORM\Index(name="IDX_12B376CFD389A975", columns={"Code_Instrument"})})
 * @ORM\Entity
 */
class Interpreter
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Code_Interpréter", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeInterpréter;

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
     * @var \Enregistrement
     *
     * @ORM\ManyToOne(targetEntity="Enregistrement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Morceau", referencedColumnName="Code_Morceau")
     * })
     */
    private $codeEnregistrement;

    /**
     * @var \Instrument
     *
     * @ORM\ManyToOne(targetEntity="Instrument")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Instrument", referencedColumnName="Code_Instrument")
     * })
     */
    private $codeInstrument;


    /**
     * Get codeInterpréter
     *
     * @return integer
     */
    public function getCodeInterpréter()
    {
        return $this->codeInterpréter;
    }

    /**
     * Set codeMusicien
     *
     * @param \Musicien $codeMusicien
     *
     * @return Interpréter
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
     * Set codeEnregistrement
     *
     * @param \Enregistrement $codeEnregistrement
     *
     * @return Interpréter
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

    /**
     * Set codeInstrument
     *
     * @param \Instrument $codeInstrument
     *
     * @return Interpréter
     */
    public function setCodeInstrument(\Instrument $codeInstrument = null)
    {
        $this->codeInstrument = $codeInstrument;

        return $this;
    }

    /**
     * Get codeInstrument
     *
     * @return \Instrument
     */
    public function getCodeInstrument()
    {
        return $this->codeInstrument;
    }
}

