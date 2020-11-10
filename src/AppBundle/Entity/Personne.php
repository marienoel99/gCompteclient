<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\InheritanceType;

/**
 * Personne
 *
 * @ORM\Table(name="personne")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PersonneRepository")
 * @Entity
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"physique" = "personnePhysique", "moral" = "PersonneMoral"})
 */
abstract class Personne
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    private $id;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Utilisateur")
     */
    private $createdBy;
    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=255)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=8)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=128)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="typePersonne", type="string", length=255)
     */
    private $typePersonne;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="string", length=255)
     */
    private $createdAt;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updateAt", type="string", length=255)
     */
    private $updateAt;

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
     * Set tel
     *
     * @param string $tel
     *
     * @return Personne
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }
    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Personne
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }


    /**
     * Set status
     *
     * @param string $status
     *
     * @return Personne
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set typePersonne
     *
     * @param string $typePersonne
     *
     * @return Personne
     */
    public function setTypePersonne($typePersonne)
    {
        $this->typePersonne = $typePersonne;

        return $this;
    }

    /**
     * Get typePersonne
     *
     * @return string
     */
    public function getTypePersonne()
    {
        return $this->typePersonne;
    }

    /**
     * Set CreatedAt
     *
     * @param \DateTime $createdAt
     *
     * @return Personne
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }
    /**
     * Get createdAt
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }




    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     *
     * @return Personne
     */
    public function setUpdateAt($updateAt)
    {
        $this->createdAt = $updateAt;

        return $this;
    }
    /**
     * Get updateAt
     *
     * @return string
     */
    public function getUpateAt()
    {
        return $this->updateAt;
    }

}

