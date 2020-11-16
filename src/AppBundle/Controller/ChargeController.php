<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Compte;
use AppBundle\Entity\PersonneMoral;
use AppBundle\Entity\personnePhysique;
use AppBundle\Entity\Temp;
use AppBundle\Form\personnePhysiqueType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use Symfony\Component\Validator\Constraints\DateTime;

class ChargeController extends Controller
{

    /**
     * @Route("/charge",name="chargeDash")
     *
     */
    public function chargeDashbordAction()
    {
        return $this->render('default/chargeDash.html.twig');
    }


    /**
     * @Route("/nouveau",name="new")
     */
    public function newClientAction()
    {
        return $this->render('default/newClient.html.twig');
    }


    /**
     * @Route("/nouveaup",name="newp")
     */
    public function newPersonneAction(Request $request)
    {

        $data = json_decode($request->getContent());
        $personneMoral = new PersonneMoral();
        $compte=new Compte();
        $personnePhysique = new personnePhysique();
        $form2 = $this->createForm('AppBundle\Form\PersonneMoralType', $personneMoral);
        $form = $this->createForm('AppBundle\Form\personnePhysiqueType', $personnePhysique);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


            $carteFile = $form->get('urlCarte')->getData();
            if ($carteFile) {
                $originalFilename = pathinfo($carteFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $carteFile->guessExtension();
                try {
                    $carteFile->move(
                        $this->getParameter('carte_directory'),
                        $newFilename
                    );
                } catch (fileException $e) {

                }
                $repository = $this->getDoctrine()->getRepository('AppBundle:Temp');
                $resu = $repository->findBy(array(), array('id' => 'desc'), 1, 0);
                $personnePhysique->setMail($resu[0]->getMail());
                $personnePhysique->setTel($resu[0]->getTel());
                $personnePhysique->setUrlCarte($newFilename);
                $personnePhysique->setStatus('actif');
                $personnePhysique->setCreatedAt(new \DateTime());
                $personnePhysique->setUpdateAt(new \DateTime());
                $manager = $this->getDoctrine()->getManager();
                $manager->persist($personnePhysique);


                $compte->setDateCreation(new \DateTime());

                $compte->setNumCompte(uniqid());
                $compte->setIntituleCompte('francis BOA');
                $compte->setStatus('actif');
                $repository = $this->getDoctrine()->getRepository('AppBundle:Agence');
                $reu = $repository->find(1);
                
                $manager->persist($compte);
                $manager->flush();
                $request->getSession()->getFlashBag()->add('success', 'Informations transmise');
                return $this->redirectToRoute('chargeDash');
            }

        }


        $form2->handleRequest($request);
        if ($form2->isSubmitted() && $form2->isValid()) {

            $registre = $form2->get('registre')->getData();
            if ($registre) {
                $originalFilename1 = pathinfo($registre->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename1 = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename1);
                $newFilename1 = $safeFilename1 . '-' . uniqid() . '.' . $registre->guessExtension();
                try {

                    $registre->move(
                        $this->getParameter('carte_directory'),
                        $newFilename1
                    );
                } catch (fileException $e) {

                }
            }
            $ifu = $form2->get('ifu')->getData();

            $newFilename2=null;
            if ($ifu) {
                $originalFilename2 = pathinfo($ifu->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename2 = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename2);
                $newFilename2 = $safeFilename2 . '-' . uniqid() . '.' . $ifu->guessExtension();
                try {

                    $registre->move(
                        $this->getParameter('carte_directory'),
                        $newFilename2
                    );
                } catch (fileException $e) {

                }
            }

            $repository = $this->getDoctrine()->getRepository('AppBundle:Temp');
            $resu = $repository->findBy(array(), array('id' => 'desc'), 1, 0);
            $personneMoral->setMail($resu[0]->getMail());
            $personneMoral->setTel($resu[0]->getTel ());
            $personneMoral->setRegistre($newFilename1);
            $personneMoral->setStatus('actif');

            $personneMoral->setIfu($newFilename2);

            $personneMoral->setCreatedAt(new \DateTime());
            $personneMoral->setUpdateAt(new \DateTime());
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($personneMoral);
            $compte->setDateCreation(new \DateTime());
            $compte->setNumCompte(uniqid());
            $compte->setIntituleCompte('francis BOA');
            $compte->setStatus('actif');
            $repository = $this->getDoctrine()->getRepository('AppBundle:Agence');
            $reu = $repository->find(1);
            $compte->setAgence($reu);
            $manager->persist($compte);
            $manager->flush();
            $request->getSession()->getFlashBag()->add('success', 'Informations transmise');
             return $this->redirectToRoute('chargeDash');


        }


        if ($request->getContent()) {
            if($data->type == "physique") {

                $repository = $this->getDoctrine()->getRepository('AppBundle:Temp');

                $result = $repository->findOneBy(array('tel' => $data->tel));
                $result2 = $repository->findOneBy(array('tel' => $data->mail));
                if ($result == null && $result == '' && $result2 == null && $result2 == '') {
                    $temp = new Temp();
                    $manager = $this->getDoctrine()->getManager();
                    $temp->setMail($data->mail);
                    $temp->setTel($data->tel);
                    $manager->persist($temp);
                    $manager->flush();
                    return $this->render('default/personnePhysique.html.twig', array(
                        'form' => $form->createView(),
                    ));
                } else {
                    return $this->json(array(), 403);
                }

            } else {

                $repository = $this->getDoctrine()->getRepository('AppBundle:Temp');
                $resul = $repository->findOneBy(array('tel' => $data->tel));
                $result2 = $repository->findOneBy(array('tel' => $data->mail));

                if ($resul == null && $resul == '' && $result2 == null && $result2 == '') {
                    $temp = new Temp();
                    $manager = $this->getDoctrine()->getManager();
                    $temp->setMail($data->mail);
                    $temp->setTel($data->tel);
                    $manager->persist($temp);
                    $manager->flush();
                    return $this->render('default/personneMorale.html.twig', array(
                        'form' => $form2->createView()
                    ));
                } else {
                    return $this->json(array(), 403);
                }

            }
        }


    }
}
