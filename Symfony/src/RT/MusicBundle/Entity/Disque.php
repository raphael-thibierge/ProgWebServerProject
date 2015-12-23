<?php

namespace RT\MusicBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Disque
 *
 * @ORM\Table(name="Disque", indexes={@ORM\Index(name="IDX_F200E9945B515BDB", columns={"Code_Album"})})
 * @ORM\Entity
 */
class Disque
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Code_Disque", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeDisque;

    /**
     * @var string
     *
     * @ORM\Column(name="Référence_Album", type="string", length=200, nullable=false)
     */
    private $référenceAlbum;

    /**
     * @var string
     *
     * @ORM\Column(name="Référence_Disque", type="string", length=10, nullable=true)
     */
    private $référenceDisque;

    /**
     * @var \Album
     *
     * @ORM\ManyToOne(targetEntity="Album")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Code_Album", referencedColumnName="Code_Album")
     * })
     */
    private $codeAlbum;


    /**
     * Get codeDisque
     *
     * @return integer
     */
    public function getCodeDisque()
    {
        return $this->codeDisque;
    }

    /**
     * Set référenceAlbum
     *
     * @param string $référenceAlbum
     *
     * @return Disque
     */
    public function setRéférenceAlbum($référenceAlbum)
    {
        $this->référenceAlbum = $référenceAlbum;

        return $this;
    }

    /**
     * Get référenceAlbum
     *
     * @return string
     */
    public function getRéférenceAlbum()
    {
        return $this->référenceAlbum;
    }

    /**
     * Set référenceDisque
     *
     * @param string $référenceDisque
     *
     * @return Disque
     */
    public function setRéférenceDisque($référenceDisque)
    {
        $this->référenceDisque = $référenceDisque;

        return $this;
    }

    /**
     * Get référenceDisque
     *
     * @return string
     */
    public function getRéférenceDisque()
    {
        return $this->référenceDisque;
    }

    /**
     * Set codeAlbum
     *
     * @param \Album $codeAlbum
     *
     * @return Disque
     */
    public function setCodeAlbum(\Album $codeAlbum = null)
    {
        $this->codeAlbum = $codeAlbum;

        return $this;
    }

    /**
     * Get codeAlbum
     *
     * @return \Album
     */
    public function getCodeAlbum()
    {
        return $this->codeAlbum;
    }
}
