<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PersonneMoral
 *
 * @ORM\Table(name="personne_moral")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PersonneMoralRepository")
 */
class PersonneMoral extends Personne
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
     * @ORM\Column(name="mail", type="string", length=255)
     */
    private $mail;
    /**
     * @var string
     *
     * @ORM\Column(name="raisonSocial", type="string", length=255)
     */

    private $raisonSocial;

    /**
     * @var string
     *
     * @ORM\Column(name="representant", type="string", length=255)
     */
    private $representant;
    /**
     * @var string
     *
     * @ORM\Column(name="registre", type="string", length=255)
     */
    private $registre;
    /**
     * @var string
     *
     * @ORM\Column(name="ifu", type="string", length=255)
     */
    private $ifu;




    /**
     * Set raisonSocial
     *
     * @param string $raisonSocial
     *
     * @return PersonneMoral
     */
    public function setRaisonSocial($raisonSocial)
    {
        $this->raisonSocial = $raisonSocial;

        return $this;
    }

    /**
     * Get raisonSocial
     *
     * @return string
     */
    public function getRaisonSocial()
    {
        return $this->raisonSocial;
    }

    /**
     * Set representant
     *
     * @param string $representant
     *
     * @return PersonneMoral
     */
    public function setRepresentant($representant)
    {
        $this->representant = $representant;

        return $this;
    }

    /**
     * Get representant
     *
     * @return string
     */
    public function getRepresentant()
    {
        return $this->representant;
    }

    /**
     * Set registre
     *
     * @param string $registre
     *
     * @return PersonneMoral
     */
    public function setRegistre($registre)
    {
        $this->registre = $registre;

        return $this;
    }

    /**
     * Get registre
     *
     * @return string
     */
    public function getRegistre()
    {
        return $this->registre;
    }

    /**
     * Set ifu
     *
     * @param string $ifu
     *
     * @return PersonneMoral
     */
    public function setIfu($ifu)
    {
        $this->ifu = $ifu;

        return $this;
    }

    /**
     * Get ifu
     *
     * @return string
     */
    public function getIfu()
    {
        return $this->ifu;
    }
}
