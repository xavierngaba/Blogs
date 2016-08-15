<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Candidature;

class CandidatureController extends Controller
{
    /**
     * @Route("/listcandidature", name="candidatureList")
     */
    public function indexAction(Request $request)
    {
        return $this->render('user/candidature.html.twig',array('candidatures'=>$this->getAllCandidature()));
    }

    /**
     * @Route("/addCandidature", name="addCandidature")
     */
    public function addAction(Request $request)
    {
        $candidature1 = new Candidature();
        $candidature1->setNomEntreprise("ATOS");
        $candidature1->setPoste("Développeur JAVA H/F");
        $candidature1->setAdresse("Blagnac 31200");
        $candidature1->setVille("Toulouse");
        $candidature1->setEtat("En attente");
        $candidature2 = new Candidature();
        $candidature2->setNomEntreprise("ALTRAN");
        $candidature2->setPoste("Développeur H/F");
        $candidature2->setAdresse("Blagnac 3100");
        $candidature2->setVille("Toulouse");
        $candidature2->setEtat("Confirmé");
        $candidature3 = new Candidature();
        $candidature3->setNomEntreprise("DEVIATICS");
        $candidature3->setPoste("Développeur PHP H/F");
        $candidature3->setAdresse("Blagnac 31200");
        $candidature3->setVille("Toulouse");
        $candidature3->setEtat("Refus");
        $em = $this->getDoctrine()->getManager();
        $em->persist($candidature1);
        $em->persist($candidature2);
        $em->persist($candidature3);
        $em->flush();
        return new Response("Candidature enregistrée avec l'id = ".$candidature1->getId());
    }

    /**
     * @Route("/candidature/{id}", name="candidatureView", requirements={"id" = "\d+"})
     * @Route("/candidature/", defaults={"id"=1})
     * @Method({"GET"})
     */
    public function viewCandidatureAction($id)
    {
        $candidature = $this->getDoctrine()->getRepository('AppBundle:Candidature')->find($id);
        if(!$candidature){
            throw $this->createNotFoundException('Aucune candidature ne correspond à l\'id!'.$id);
        }
        return $this->render('user/view_candidature.html.twig',array('candidature'=>$candidature));
    }

    public function getAllCandidature(){
        $candidature = $this->getDoctrine()->getRepository('AppBundle:Candidature')->findAll();
        return $candidature;
    }
}