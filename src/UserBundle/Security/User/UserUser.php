<?php

namespace UserBundle\Security\User;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;


class UserUser implements UserInterface, EquatableInterface

{
    private $id;
    private $username;
    private $password;
    private $salt;
    private $roles;
    private $nom;
    private $prenom;
    private $fullname;
    private $email;
    private $currentToken;
    private $userPublicId;

    public function __construct($id,$username, $password, $salt,$nom,$prenom,$fullname,$email,$userPublicId,$currentToken, array $roles)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->salt = $salt;
        $this->roles = $roles;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->currentToken = $currentToken;
        $this->userPublicId = $userPublicId;

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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

    public function getUsername()
    {
        return $this->username;
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

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * @param mixed $fullname
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getCurrentToken()
    {
        return $this->currentToken;
    }

    /**
     * @param mixed $currentToken
     */
    public function setCurrentToken($currentToken)
    {
        $this->currentToken = $currentToken;
    }

    /**
     * @return mixed
     */
    public function getUserPublicId()
    {
        return $this->userPublicId;
    }

    /**
     * @param mixed $userPublicId
     */
    public function setUserPublicId($userPublicId)
    {
        $this->userPublicId = $userPublicId;
    }





}
