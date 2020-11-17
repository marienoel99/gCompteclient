<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;


/**
 * UserUser
 *
 * @ORM\Table(name="user_user")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserUserRepository")
 */
class UserUser implements UserInterface, EquatableInterface

{

    const ROLE_DEFAULT = 'ROLE_USER';

    const ROLE_SUPER_ADMIN = 'ROLE_SUPER_ADMIN';

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
     * @var string
     *
     * @ORM\Column(name="fullname", type="string", length=255)
     */
    private $fullname;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     */
    private $username;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;


    /**
     * @var array
     * @ORM\Column(name="roles", type="array")
     */
    private $roles;

    /**
     * @var string
     * @ORM\Column(name="userPublicId", type="string", length=50)
     */
    private $userPublicId;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->created = New \DateTime();
        $this->roles = array();

    }


    /**
     * {@inheritdoc}
     */
    public function addRole($role)
    {
        $role = strtoupper($role);
        if ($role === static::ROLE_DEFAULT) {
            return $this;
        }

        if (!in_array($role, $this->roles, true)) {
            $this->roles[] = $role;
        }

        return $this;
    }

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
     * Set nom
     *
     * @param string $nom
     *
     * @return UserUser
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
     * @return UserUser
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

    /**
     * Set fullname
     *
     * @param string $fullname
     *
     * @return UserUser
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * Get fullname
     *
     * @return string
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return UserUser
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return UserUser
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }


    /**
     * Set currentToken
     *
     * @param string $currentToken
     *
     * @return UserUser
     */
    public function setCurrentToken($currentToken)
    {
        $this->currentToken = $currentToken;

        return $this;
    }

    /**
     * Get currentToken
     *
     * @return string
     */
    public function getCurrentToken()
    {
        return $this->currentToken;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return UserUser
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }



    public function eraseCredentials()
    {
    }

    public function isEqualTo(UserInterface $user)
    {
        if (!$user instanceof UserUser) {
            return false;
        }

        if ($this->password !== $user->getPassword()) {
            return false;
        }

        if ($this->salt !== $user->getSalt()) {
            return false;
        }

        if ($this->username !== $user->getUsername()) {
            return false;
        }

        return true;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getSalt()
    {
        return $this->salt;
    }



    /**
     * Set roles
     *
     * @param array $roles
     *
     * @return UserUser
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Set userPublicId
     *
     * @param string $userPublicId
     *
     * @return UserUser
     */
    public function setUserPublicId($userPublicId)
    {
        $this->userPublicId = $userPublicId;

        return $this;
    }

    /**
     * Get userPublicId
     *
     * @return string
     */
    public function getUserPublicId()
    {
        return $this->userPublicId;
    }
}
