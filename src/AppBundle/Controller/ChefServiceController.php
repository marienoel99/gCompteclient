<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ChefServiceController extends Controller
{
    /**
     * @Route("/chefagence",name="chefagence")
     */
    public  function chefserviceAction(){
        $repository=$this->getDoctrine()->getRepository('AppBundle:personnePhysique');
        $res=$repository->findAll();

       return $this->render('default/chefservice.html.twig',array(
           'per'=>$res,
       ));
    }

}
