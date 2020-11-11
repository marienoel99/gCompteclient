<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CaissierController extends Controller
{
    /**
     * @Route("/caissier",name="caissier")
     */
    public function caissierAction(){
        return $this->render('default/caissier.html.twig');
    }

    /**
     * @Route("/operation",name="operation")
     */
    public function operationAction(){
        return $this->render('default/operation.html.twig');
    }
}
