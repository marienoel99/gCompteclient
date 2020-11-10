<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * typeOperation
 *
 * @ORM\Table(name="type_operation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\typeOperationRepository")
 */
class typeOperation
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
     * @ORM\Column(name="libOperation", type="string", length=255)
     */
    private $libOperation;


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
     * Set libOperation
     *
     * @param string $libOperation
     *
     * @return typeOperation
     */
    public function setLibOperation($libOperation)
    {
        $this->libOperation = $libOperation;

        return $this;
    }

    /**
     * Get libOperation
     *
     * @return string
     */
    public function getLibOperation()
    {
        return $this->libOperation;
    }
}

