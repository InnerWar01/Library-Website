<?php

namespace my_project\GestionLivresBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function homepageAction()
    {
        return $this->render('my_projectGestionLivresBundle:main:homepage.html.twig');
    }
}