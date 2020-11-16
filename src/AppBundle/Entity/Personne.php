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
 * @InheritanceType("JOINED")
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
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=255)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=128)
     */
    private $status;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", length=255)
     */
    private $createdAt;
    /**
     * @var string
     *
     * @ORM\Column(name="updateAt", type="datetime", length=255)
     */
    private $updateAt;

    /**
     * Get id
     *
     * @return int
     *
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
     * @return \DateTime
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
        $this->updateAt= $updateAt;

        return $this;
    }
    /**
     * Get updateAt
     *
     * @return \DateTime
     */
    public function getUpateAt()
    {
        return $this->updateAt;
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
     * Get updateAt
     *
     * @return string
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }
}
