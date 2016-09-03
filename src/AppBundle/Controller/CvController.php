<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CvController extends Controller
{
    /**
     * @Route("/cv", name="Cv")
     */
    public function indexAction(Request $request)
    {
        //Mais avant on récupère les données dans la base de donnée
        //...
        //Puis on affiche le rendu
        return $this->render('AppBundle:public:cv.html.twig');
    }
}