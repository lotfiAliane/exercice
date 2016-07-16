<?php

namespace Exo\UserBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Exo\UserBundle\Entity\User;

use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ExoUserBundle:Default:index.html.twig');
    }

    public function viewAction($id) {
    	$em= $this->getDoctrine()->getEntityManager();

        $user=$em->getRepository('ExoUserBundle:User')->find($id);
       
         $listApplications = $em
         ->getRepository('ExoCarnetBundle:Membre')
         ->findBy(array('user' => $user));
        
         return $this->render('ExoUserBundle:Default:carnet.html.twig', array(
      'user'           => $user,
      'listApplications' => $listApplications
    ));
    }
}
