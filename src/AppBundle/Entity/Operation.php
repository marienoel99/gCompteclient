<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Operation
 *
 * @ORM\Table(name="operation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OperationRepository")
 */
class Operation
{
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Utilisateur")
     */
    private $utilisateur;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\schemaOperation")
     */
    private $shemaOperation;
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="montant", type="float")
     */
    private $montant;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateOp", type="datetime")
     */
    private $dateOp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateSaisi", type="datetime")
     */
    private $dateSaisi;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateValeur", type="datetime")
     */
    private $dateValeur;

    /**
     * @var string
     *
     * @ORM\Column(name="codeExercice", type="string", length=255)
     */
    private $codeExercice;

    /**
     * @var string
     *
     * @ORM\Column(name="codeAgence", type="string", length=255)
     */
    private $codeAgence;

    /**
     * @var string
     *
     * @ORM\Column(name="typeValeur", type="string", length=255)
     */
    private $typeValeur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="string", length=255)
     */
    private $createdAt;
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
     * Set montant
     *
     * @param float $montant
     *
     * @return Operation
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return float
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set dateOp
     *
     * @param \DateTime $dateOp
     *
     * @return Operation
     */
    public function setDateOp($dateOp)
    {
        $this->dateOp = $dateOp;

        return $this;
    }

    /**
     * Get dateOp
     *
     * @return \DateTime
     */
    public function getDateOp()
    {
        return $this->dateOp;
    }

    /**
     * Set dateSaisi
     *
     * @param \DateTime $dateSaisi
     *
     * @return Operation
     */
    public function setDateSaisi($dateSaisi)
    {
        $this->dateSaisi = $dateSaisi;

        return $this;
    }

    /**
     * Get dateSaisi
     *
     * @return \DateTime
     */
    public function getDateSaisi()
    {
        return $this->dateSaisi;
    }

    /**
     * Set dateValeur
     *
     * @param \DateTime $dateValeur
     *
     * @return Operation
     */
    public function setDateValeur($dateValeur)
    {
        $this->dateValeur = $dateValeur;

        return $this;
    }

    /**
     * Get dateValeur
     *
     * @return \DateTime
     */
    public function getDateValeur()
    {
        return $this->dateValeur;
    }

    /**
     * Set codeExercice
     *
     * @param string $codeExercice
     *
     * @return Operation
     */
    public function setCodeExercice($codeExercice)
    {
        $this->codeExercice = $codeExercice;

        return $this;
    }

    /**
     * Get codeExercice
     *
     * @return string
     */
    public function getCodeExercice()
    {
        return $this->codeExercice;
    }

    /**
     * Set codeAgence
     *
     * @param string $codeAgence
     *
     * @return Operation
     */
    public function setCodeAgence($codeAgence)
    {
        $this->codeAgence = $codeAgence;

        return $this;
    }

    /**
     * Get codeAgence
     *
     * @return string
     */
    public function getCodeAgence()
    {
        return $this->codeAgence;
    }

    /**
     * Set typeValeur
     *
     * @param string $typeValeur
     *
     * @return Operation
     */
    public function setTypeValeur($typeValeur)
    {
        $this->typeValeur = $typeValeur;

        return $this;
    }

    /**
     * Get typeValeur
     *
     * @return string
     */
    public function getTypeValeur()
    {
        return $this->typeValeur;
    }


    /**
     * Set CreatedAt
     *
     * @param \DateTime $createdAt
     *
     * @return Operation
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
}

