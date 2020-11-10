<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * modificationClient
 *
 * @ORM\Table(name="modification_client")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\modificationClientRepository")
 */
class modificationClient
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
     * @ORM\Column(name="motifDemande", type="string", length=255)
     */
    private $motifDemande;


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
     * Set motifDemande
     *
     * @param string $motifDemande
     *
     * @return modificationClient
     */
    public function setMotifDemande($motifDemande)
    {
        $this->motifDemande = $motifDemande;

        return $this;
    }

    /**
     * Get motifDemande
     *
     * @return string
     */
    public function getMotifDemande()
    {
        return $this->motifDemande;
    }
}

