<?php

namespace Exo\UserBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Exo\UserBundle\Entity\User;

use Symfony\Component\HttpFoundation\Request;

class ListeController extends Controller
{
    public function indexAction()
    {
        return $this->render('ExoUserBundle:Default:index.html.twig');
    }

    public function viewAction() {

    	var_dump("rien");
    	exit();
    }
}
