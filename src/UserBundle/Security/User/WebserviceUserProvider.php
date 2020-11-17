<?php
/**
 * Created by IntelliJ IDEA.
 * User: anianougbo
 * Date: 12/12/2017
 * Time: 17:18
 */

namespace UserBundle\Security\User;

use Symfony\Component\HttpFoundation\Session\Session;
use UserBundle\Entity\UserToken;
use UserBundle\Security\User\UserUser;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Requests as adolpherequest;

class WebserviceUserProvider implements UserProviderInterface
{
    private $em;
    private $oauthUrl;
    private $clientId;
    private $clientSecret;
    private $options;
    private $userinfoUrl;
    private $appCode;

    public function __construct($em, $kernel)
    {
        $this->em = $em;
        $this->oauthUrl = $kernel->getContainer()->getParameter("oauth_url");
        $this->userinfoUrl = $kernel->getContainer()->getParameter("user_info_url");
        $this->appCode = $kernel->getContainer()->getParameter("app_code");
        $this->clientId = $kernel->getContainer()->getParameter("api_publik_key");
        $this->clientSecret = $kernel->getContainer()->getParameter("api_private_key");
        $this->options = array('timeout' => 1000, 'connect_timeout' => 1000);
    }

    public function getuserCredentials($username, $password)
    {
        $data = array('client_id' => $this->clientId, 'client_secret' => $this->clientSecret, 'grant_type' => 'password', 'username' => $username, 'password' => $password);
        $response = adolpheRequest::post($this->oauthUrl, $this->options, $data);
        $credentialStatutCode = $response->status_code;
        $reponseBody = json_decode($response->body);

       //dump($response);die('ok');
        if ($credentialStatutCode == 400) {
            throw new UsernameNotFoundException(
                sprintf('Username "%s" does not exist.', $username)
            );
        }

//        die(dump($reponseBody));
        $userInfoUrl = $this->userinfoUrl . '?access_token=' . $reponseBody->access_token . '&app_code=' . $this->appCode;

        $userData = adolpheRequest::get($userInfoUrl, array(), $this->options);
        $userDataBody = json_decode($userData->body);


        //dump($userData, $userDataBody);die('ok');
        $userdataStatutCode = $userData->status_code;

        if ($userdataStatutCode == 401) {
            throw new UsernameNotFoundException(
                sprintf('User account is disabled', $username)
            );
        }


        $fullname = $userDataBody->nom.' '.$userDataBody->prenom;

        $user = $this->em->getRepository("UserBundle:UserUser")->findOneBy( array("userPublicId" => $userDataBody->userPublicId));
        //dump($user);die('ok');
        if($user == null)
        {
            $user = new \UserBundle\Entity\UserUser();
            $user->setCreated(new \DateTime())
                ->setFullname($fullname)
                ->setUsername($userDataBody->username)
                ->setNom($userDataBody->nom)
                ->setPrenom($userDataBody->prenom)
                ->setUserPublicId($userDataBody->userPublicId);
               // ->setCurrentToken($userDataBody-> )
            $this->em->persist($user);
            $this->em->flush();
        }
        else{
            $user->setFullname($fullname)
                ->setUsername($userDataBody->username)
                ->setNom($userDataBody->nom)
                ->setPrenom($userDataBody->prenom);
            $this->em->persist($user);
            $this->em->flush();
        }

        return new UserUser($userDataBody->userPublicId,$userDataBody->username, $password, $userDataBody->salt,$userDataBody->nom,$userDataBody->prenom,$fullname,$userDataBody->email,$userDataBody->userPublicId,$reponseBody->access_token, $userDataBody->roles);


    }

    public function loadUserByUsername($username)
    {
        $user = $this->em->getRepository("UserBundle:UserUser")->findOneByusername($username);
        if(!$user){
            throw new UsernameNotFoundException(
                sprintf('Username "%s" does not exist.', $username)
            );
        }
        return $user;

    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof UserUser) {
            throw new UnsupportedUserException(
                sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }
        return $user;
    }

    public function supportsClass($class)
    {
        return UserUser::class === $class;

    }
}