<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ChargeController extends Controller
{
    /**
     * @Route("/charge",name="chargeDash")
     *
     */
    public function chargeDashbordAction(){
      return  $this->render('default/chargeDash.html.twig');
    }
    /**
     * @Route("/nouveau",name="new")
     */
    public function newClientAction(){
        return $this->render('default/newClient.html.twig');
    }
}
