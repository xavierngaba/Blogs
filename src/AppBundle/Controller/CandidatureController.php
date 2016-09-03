<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Form\CandidatureType;
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
        return $this->render('AppBundle:public:candidature.html.twig',array('candidatures'=>$this->getAllCandidature()));
    }

    /**
     * @Route("/profil", name="Profil")
     */
    public function profilAction(Request $request)
    {
        return $this->render('AppBundle:public:profil.html.twig');
    }

    /**
     * @Route("/new", name="New")
     */
    public function newAction(Request $request)
    {
        $candidature = new Candidature();

        $candidature->setDateCr(new \Datetime('Now'));
        //On récupère le formulaire
        $form = $this->createForm(CandidatureType::class,$candidature);

        //On génère le HTML du formulaire crée
        $formView = $form->createView();

        $form->handleRequest($request);

        //si le formulaire est sousmis
        if($form->isSubmitted()){
            //On enregistre la candidature en Bdd
            $em = $this->getDoctrine()->getManager();

            $em->persist($candidature);
            $em->flush();

            return $this->render('AppBundle:public:newoffre.html.twig',array('form'=>$formView,'response'=>'success'));
        }

        return $this->render('AppBundle:public:newoffre.html.twig',array('form'=>$formView));
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

    /**
     * @Route("/editCandidature/{id}", name="EditCandidature", requirements={"id" = "\d+"})
     */
    public function editcandidatureAction(Request $request, Candidature $candidature){
        //On récupère le formulaire
        $form = $this->createForm(CandidatureType::class,$candidature);

        //On génère le HTML du formulaire crée
        $formView = $form->createView();

        $form->handleRequest($request);

        //si le formulaire est sousmis
        if($form->isSubmitted()){
            //On enregistre la candidature en Bdd
            $em = $this->getDoctrine()->getManager();

            $em->flush();

            return $this->render('AppBundle:public:editcandidature.html.twig',array('form'=>$formView,'response'=>'success'));
        }

        return $this->render('AppBundle:public:editcandidature.html.twig',array('form'=>$formView));
    }

    public function getAllCandidature(){
        $candidature = $this->getDoctrine()->getRepository('AppBundle:Candidature')->findAll();
        return $candidature;
    }
}