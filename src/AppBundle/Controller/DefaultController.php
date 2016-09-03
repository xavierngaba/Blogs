<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/accueil", name="Accueil")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $nbrEA = $em->getRepository('AppBundle:Candidature')
            ->findnombreCandidatureAttente();
        $nbrET = $em->getRepository('AppBundle:Candidature')
            ->findnombreCandidatureEntretient();
        $nbrRef = $em->getRepository('AppBundle:Candidature')
            ->findnombreCandidatureRefus();
        $nbrPR = $em->getRepository('AppBundle:Candidature')
            ->findnombreCandidaturePR();
        $nbrConf = $em->getRepository('AppBundle:Candidature')
            ->findnombreCandidatureConfirme();
        $total = $em->getRepository('AppBundle:Candidature')
            ->findnombreTotalOffre();
        return $this->render('AppBundle:public:index.html.twig',array('attente'=>$nbrEA,'total'=>$total,
                                                                      'entretient'=>$nbrET,'refus'=>$nbrRef,
                                                                      'pr'=>$nbrPR,'confirme'=>$nbrConf));
    }

    /**
     * @Route("/deconnexion", name="LogOut")
     */
    public function deconnecterAction(Request $request)
    {
        return new Response("<h1> Vous êtes déconnecter </h1>");
    }
}
