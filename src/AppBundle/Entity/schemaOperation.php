<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * schemaOperation
 *
 * @ORM\Table(name="schema_operation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\schemaOperationRepository")
 */
class schemaOperation
{
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\typeOperation")
     */
    private $typeOperation;
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
     * @ORM\Column(name="codeSchema", type="string", length=255)
     */
    private $codeSchema;

    /**
     * @var string
     *
     * @ORM\Column(name="libeleSchema", type="string", length=255)
     */
    private $libeleSchema;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateSchema", type="datetime")
     */
    private $dateSchema;


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
     * Set codeSchema
     *
     * @param string $codeSchema
     *
     * @return schemaOperation
     */
    public function setCodeSchema($codeSchema)
    {
        $this->codeSchema = $codeSchema;

        return $this;
    }

    /**
     * Get codeSchema
     *
     * @return string
     */
    public function getCodeSchema()
    {
        return $this->codeSchema;
    }

    /**
     * Set libeleSchema
     *
     * @param string $libeleSchema
     *
     * @return schemaOperation
     */
    public function setLibeleSchema($libeleSchema)
    {
        $this->libeleSchema = $libeleSchema;

        return $this;
    }

    /**
     * Get libeleSchema
     *
     * @return string
     */
    public function getLibeleSchema()
    {
        return $this->libeleSchema;
    }

    /**
     * Set dateSchema
     *
     * @param \DateTime $dateSchema
     *
     * @return schemaOperation
     */
    public function setDateSchema($dateSchema)
    {
        $this->dateSchema = $dateSchema;

        return $this;
    }

    /**
     * Get dateSchema
     *
     * @return \DateTime
     */
    public function getDateSchema()
    {
        return $this->dateSchema;
    }


    public function __toString(): ?string
    {
        return $this->getLibeleSchema();
    }
}

