<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SignataireCompte
 *
 * @ORM\Table(name="signataire_compte")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SignataireCompteRepository")
 */
class SignataireCompte
{
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Personne")
     */
    private $personne;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Compte")
     */
    private $compte;
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var bool
     *
     * @ORM\Column(name="deleted", type="boolean")
     */
    private $deleted;

    /**
     * @var bool
     *
     * @ORM\Column(name="isPrincipal", type="boolean")
     */
    private $isPrincipal;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return SignataireCompte
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set deleted
     *
     * @param boolean $deleted
     *
     * @return SignataireCompte
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Get deleted
     *
     * @return bool
     */
    public function getDeleted()
    {
        return $this->deleted;
    }


    /**
     * Set isPrincipal
     *
     * @param boolean $isPrincipal
     *
     * @return SignataireCompte
     */
    public function setIsPrincipal($isPrincipal)
    {
        $this->isPrincipal = $isPrincipal;

        return $this;
    }

    /**
     * Get isPrincipal
     *
     * @return bool
     */
    public function getIsPrincipal()
    {
        return $this->isPrincipal;
    }
}

