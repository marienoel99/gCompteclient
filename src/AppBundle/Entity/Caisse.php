<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Caisse
 *
 * @ORM\Table(name="caisse")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CaisseRepository")
 */
class Caisse
{


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Agence")
     */
    private $agence;
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * 
     *
     * @var [type]
     */
    /**
     * @var string
     *
     * @ORM\Column(name="codeCaisse", type="string", length=255)
     */
    private $codeCaisse;
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
     * Set codeCaisse
     *
     * @param string $codeCaisse
     *
     * @return Caisse
     */
    public function setCodeCaisse($codeCaisse)
    {
        $this->codeCaisse = $codeCaisse;

        return $this;
    }

    /**
     * Get codeCaisse
     *
     * @return string
     */
    public function getCodeCaisse()
    {
        return $this->codeCaisse;
    }
}

