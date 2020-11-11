<?php

namespace AppBundle\Controller;

use AppBundle\Entity\PersonneMoral;
use AppBundle\Entity\personnePhysique;
use AppBundle\Form\personnePhysiqueType;
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


    /**
     * @Route("/nouveaup",name="newp")
     */
    public function newPersonneAction(Request $request){
        $data=json_decode($request->getContent());
        if($data->type=="physique"){
            $personnePhysique=new personnePhysique();
            $form=$this->createForm('AppBundle\Form\personnePhysiqueType',$personnePhysique);
            return $this->render('default/personnePhysique.html.twig',array(
                'form'=>$form->createView()
            ));
        }else{
            $personneMoral=new PersonneMoral();
            $form=$this->createForm('AppBundle\Form\PersonneMoralType',$personneMoral);
            return$this->render('default/personneMorale.html.twig',array(
                'form'=>$form->createView()
            ));
        }

    }
}
