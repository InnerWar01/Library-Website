<?php

namespace my_project\GestionLivresBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('my_projectGestionLivresBundle:Default:index.html.twig');
    }
}
