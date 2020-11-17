<?php
/**
 * Created by IntelliJ IDEA.
 * User: anianougbo
 * Date: 12/12/2017
 * Time: 19:35
 */

namespace UserBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;


class LoginController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {

        $user = $this->getUser();
        if ($user instanceof UserInterface) {
            return $this->redirectToRoute('dashboard_index');
        }

        /** @var AuthenticationException $exception */
        $exception = $this->get('security.authentication_utils')
            ->getLastAuthenticationError();

        return $this->render('login/login.html.twig', [
            'error' => $exception ? $exception->getMessage() : NULL,
        ]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction(Request $request)
    {

    }

}