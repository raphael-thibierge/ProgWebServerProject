<?php

namespace IUT\CatalogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Abonné
 *
 * @ORM\Table(name="Abonné", indexes={@ORM\Index(name="IDX_F72316A520B77BF2", columns={"Code_Pays"})})
 * @ORM\Entity
 */
class Abonne
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Code_Abonné", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeAbonne;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_Abonné", type="string", length=50, nullable=false)
     */
    private $nomAbonné;

    /**
     * @var string
     *
     * @ORM\Column(name="Prénom_Abonné", type="string", length=20, nullable=true)
     */
    private $prénomAbonné;

    /**
     * @var string
     *
     * @ORM\Column(name="Login", type="string", length=10, nullable=true)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="Password", type="string", length=10, nullable=true)
     */
    private $password;

    /**
     * @var \Pays
     *
     * @ORM\ManyToOne(targetEntity="Pays")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="Code_Pays", referencedColumnName="Code_Pays")
     * })
     */
    private $codePays;


    /**
     * Get codeAbonné
     *
     * @return integer
     */
    public function getCodeAbonné()
    {
        return $this->codeAbonne;
    }

    /**
     * Set nomAbonné
     *
     * @param string $nomAbonné
     *
     * @return Abonné
     */
    public function setNomAbonné($nomAbonné)
    {
        $this->nomAbonné = $nomAbonné;

        return $this;
    }

    /**
     * Get nomAbonné
     *
     * @return string
     */
    public function getNomAbonné()
    {
        return $this->nomAbonné;
    }

    /**
     * Set prénomAbonné
     *
     * @param string $prénomAbonné
     *
     * @return Abonné
     */
    public function setPrénomAbonné($prénomAbonné)
    {
        $this->prénomAbonné = $prénomAbonné;

        return $this;
    }

    /**
     * Get prénomAbonné
     *
     * @return string
     */
    public function getPrénomAbonné()
    {
        return $this->prénomAbonné;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return Abonné
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Abonné
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set codePays
     *
     * @param \Pays $codePays
     *
     * @return Abonné
     */
    public function setCodePays(\Acme\DemoBundle\Entity\Pays $codePays = null)
    {
        $this->codePays = $codePays;

        return $this;
    }

    /**
     * Get codePays
     *
     * @return int
     */
    public function getCodePays()
    {
        return $this->codePays;
    }
}

