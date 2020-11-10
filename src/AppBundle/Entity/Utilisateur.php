<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UtilisateurRepository")
 */

class Utilisateur
{
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Agence")
     */
    private $agence;
    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Utilisateur")
     */
    private  $personne;

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
     * @ORM\Column(name="codeUtilisateur", type="string", length=255)
     */
    private $codeUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="motPass", type="string", length=255)
     */
    private $motPass;

    /**
     * @var string
     *
     * @ORM\Column(name="mailPro", type="string", length=255)
     */
    private $mailPro;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=255)
     */
    private $role;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;


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
     * Set codeUtilisateur
     *
     * @param string $codeUtilisateur
     *
     * @return Utilisateur
     */
    public function setCodeUtilisateur($codeUtilisateur)
    {
        $this->codeUtilisateur = $codeUtilisateur;

        return $this;
    }

    /**
     * Get codeUtilisateur
     *
     * @return string
     */
    public function getCodeUtilisateur()
    {
        return $this->codeUtilisateur;
    }

    /**
     * Set motPass
     *
     * @param string $motPass
     *
     * @return Utilisateur
     */
    public function setMotPass($motPass)
    {
        $this->motPass = $motPass;

        return $this;
    }

    /**
     * Get motPass
     *
     * @return string
     */
    public function getMotPass()
    {
        return $this->motPass;
    }

    /**
     * Set mailPro
     *
     * @param string $mailPro
     *
     * @return Utilisateur
     */
    public function setMailPro($mailPro)
    {
        $this->mailPro = $mailPro;

        return $this;
    }

    /**
     * Get mailPro
     *
     * @return string
     */
    public function getMailPro()
    {
        return $this->mailPro;
    }

    /**
     * Set role
     *
     * @param string $role
     *
     * @return Utilisateur
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Utilisateur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Utilisateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }
}

