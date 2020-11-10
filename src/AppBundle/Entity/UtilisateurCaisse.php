<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UtilisateurCaisse
 *
 * @ORM\Table(name="utilisateur_caisse")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UtilisateurCaisseRepository")
 */
class UtilisateurCaisse
{
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Utilisateur")
     */
    private $utilisateur;
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Caisse")
     */
    private $caisse;
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

