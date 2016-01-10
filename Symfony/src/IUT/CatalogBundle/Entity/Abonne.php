<?php

namespace IUT\CatalogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * Abonné
 *
 * @ORM\Table(name="Abonné", indexes={@ORM\Index(name="IDX_F72316A520B77BF2", columns={"Code_Pays"})})
 * @ORM\Entity
 * @UniqueEntity("login")
 * @UniqueEntity(
 *     fields={"nomAbonne", "prenomAbonne"},
 *     errorPath="name",
 *     message="This first name is already in use with that name."
 * )
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
     * @Assert\Length(max=50)
     * @Assert\NotNull()
     */
    private $nomAbonne;

    /**
     * @var string
     *
     * @ORM\Column(name="Prénom_Abonné", type="string", length=20, nullable=true)
     * @Assert\Length(max=20)
     * @Assert\NotNull()
     */
    private $prenomAbonne;

    /**
     * @var string
     *
     * @ORM\Column(name="Login", type="string", length=10, nullable=true)
     * @Assert\Length(max=10)
     * @Assert\NotNull()
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="Password", type="string", length=10, nullable=true)
     * @Assert\Length(max=10)
     * @Assert\NotNull()
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
    public function getCodeAbonne()
    {
        return $this->codeAbonne;
    }

    /**
     * Set nomAbonne
     *
     * @param string $nomAbonne
     *
     * @return Abonne
     */
    public function setNomAbonne($nomAbonne)
    {
        $this->nomAbonne = $nomAbonne;

        return $this;
    }

    /**
     * Get nomAbonne
     *
     * @return string
     */
    public function getNomAbonne()
    {
        return $this->nomAbonne;
    }

    /**
     * Set prenomAbonne
     *
     * @param string $prenomAbonne
     *
     * @return Abonne
     */
    public function setPrenomAbonne($prenomAbonne)
    {
        $this->prenomAbonne = $prenomAbonne;

        return $this;
    }

    /**
     * Get prenomAbonne
     *
     * @return string
     */
    public function getPrenomAbonne()
    {
        return $this->prenomAbonne;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return Abonne
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
     * @return Abonne
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
     * @param Pays $codePays
     *
     * @return Abonne
     */
    public function setCodePays(\IUT\CatalogBundle\Entity\Pays $codePays = null)
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

