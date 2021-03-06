<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Compte;
use AppBundle\Entity\Operation;
use AppBundle\Entity\personnePhysique;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
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
        $personnePhysique=new personnePhysique();
       $repository=$this->getDoctrine()->getRepository('AppBundle:personnePhysique');
        $result=$repository->findAll();
        
        return $this->render('default/operation.html.twig',array(
            'pers'=>$result,
            'tp'=>"personne physique"
        ));
    }

    /**
     * @Route("/caissep",name="caissep")
     */
    public function caisseAction(Request $request){
        
        $data=$request->getContent();
        $result=null;
       if($data=="personne physique"){
        $personnePhysique=new personnePhysique();
       $repository=$this->getDoctrine()->getRepository('AppBundle:personnePhysique');
        $result=$repository->findAll();
        return $this->render('default/l.html.twig',array(
            'pers'=>$result,
            'tp'=>$data
        ));
       }else{
        $personnePhysique=new personnePhysique();
        $repository=$this->getDoctrine()->getRepository('AppBundle:PersonneMoral');
         $result=$repository->findAll();
         return $this->render('default/l.html.twig',array(
            'pers'=>$result,
            'tp'=>$data
        ));
       }
        
    }

    /**
     * @Route("/opera",name="opera")
     */
    public function operaAction(Request $request){
        $operation=new Operation();
        $form=$this->createForm('AppBundle\Form\OperationType', $operation);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $manager=$this->getDoctrine()->getManager();

            $idCompte=$request->request->get('ic');
            $repo=$this->getDoctrine()->getRepository('AppBundle:Compte');
            $user=$this->getDoctrine()->getRepository('AppBundle:Utilisateur');
            $compte=$repo->findOneBy(array('numCompte'=>$idCompte));
            $utilisateur=$user->findOneBy(array('id'=>2));
            $solde=$compte->getSolde();

            $operation->setCodeAgence('');
            $operation->setCodeExercice('2020');
            $operation->setDateSaisi(new \DateTime());
            $operation->setTypeValeur('espèce');
            $operation->setCreatedAt(new \DateTime());
            $operation->setDateValeur(new \DateTime());
            $operation->setUtilisateur($utilisateur);
            $manager->persist($operation);

            if($operation->getLibOperation()->getLibOperation()=="dépot"){
                $montantae=$operation->getMontant() + $solde;
                $compte->setSolde($montantae);
                $compte->setSolde($montantae);
                $manager->persist($compte);

            }else{
                $montantae=$solde - $operation->getMontant();
                $compte->setSolde($montantae);
                $compte->setSolde($montantae);
                $manager->persist($compte);
            }


            $manager->flush();
            return $this->redirectToRoute('operation');
        }

       if($request->getContent()){

            $data=json_decode($request->getContent());
            if($data->i =="p"){
                $reposit=$this->getDoctrine()->getRepository('AppBundle:personnePhysique');
                $repos=$this->getDoctrine()->getRepository('AppBundle:Compte');
                $res=$reposit->findOneBy(array('tel'=>$data->id));
                $inf=$repos->findOneBy(array('personne'=>$res->getId()));
                return $this->render('default/newOpera.html.twig',array(
                    'form'=>$form->createView(),
                    'res'=>$res,
                    'inf'=>$inf,
                    'type'=>'physique'
                ));
            }else{
                $reposit=$this->getDoctrine()->getRepository('AppBundle:PersonneMoral');
                $repos=$this->getDoctrine()->getRepository('AppBundle:Compte');
                $res=$reposit->findOneBy(array('tel'=>$data->id));
                $inf=$repos->findOneBy(array('personne'=>$res->getId()));
                $res=$reposit->findOneBy(array('tel'=>$data->id));
                return $this->render('default/newOpera.html.twig',array(
                    'form'=>$form->createView(),
                    'res'=>$res,
                    'inf'=>$inf,
                    'type'=>'moral'
                ));
            }
        }

    }
}
