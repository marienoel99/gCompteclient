<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AutentificationController extends Controller
{
    /**
     * @Route("/login",name="loginpage")
     */
    public function loginAction(Request $request){
        if($request->request->count() >0){
         return $this->redirect('/charge');
        }
        return $this->render('default/login.html.twig');
    }

}
