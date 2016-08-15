<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * @Route("/user", name="HomeUser")
     */
    public function indexAction(Request $request)
    {
        $userName = "Xavier Ngaba";
        return $this->render('user/home.html.twig',array('userName'=>$userName));
    }

    /**
     * @Route("/login", name="LoginUser")
     */
    public function loginAction(Request $request)
    {
        return $this->render('user/login.html.twig');
    }
}