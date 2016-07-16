<?php

namespace Exo\CarnetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Exo\CarnetBundle\Entity\Membre;
use Exo\UserBundle\Entity\User;
use Exo\CarnetBundle\Form\MembreType;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    public function indexAction($id)
    {


    	$em= $this->getDoctrine()->getEntityManager();

        $user=$em->getRepository('ExoUserBundle:User')->find($id);


    	$carnet=$em->getRepository('ExoCarnetBundle:Membre')->findBy(array('user' => $user));
        return $this->render('ExoCarnetBundle:Default:index.html.twig',array(
        	'carnets'=> $carnet,
        	));
    }
    public function ajouterAction(Request $request)
    {
       
        
    	$em= $this->getDoctrine()->getEntityManager();

    	$membre= new Membre();

    	 $form = $this->createForm(MembreType::class,$membre);
    	 

    	 if($request->isMethod('POST')){


    	 	$form->handleRequest($request);
            $user = $this->get('security.token_storage')->getToken()->getUser();
    	 	
    	 		$membre->setUser($user);
    	 		$em = $this->getDoctrine()->getManager();
      			$em->persist($membre);
      			$em->flush();
                return $this->redirect($this->generateUrl('exo_user_homepage'));
      		
      		
    	 
    	 }
         $user = $this->get('security.token_storage')->getToken()->getUser();

    	 return $this->render('ExoCarnetBundle:Default:ajouter.html.twig',array(
        	'form'=> $form->createView(),
            'user'=> $user,
        	));

    }

public function editerAction(Membre $membre ,Request $request)
    {
        $em= $this->getDoctrine()->getEntityManager();
        

         $form = $this->createForm(MembreType::class,$membre);
         

         if($request->isMethod('POST')){


            $form->handleRequest($request);

            
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($membre);
                $em->flush();

            return $this->redirect($this->generateUrl('exo_user_homepage'));
            
         
         }

         return $this->render('ExoCarnetBundle:Default:editer.html.twig',array(
            'id' =>$membre->getId(),
            'form'=> $form->createView(),
            ));

    }


    public function voirAction(Membre $membre)
    {

       

        return $this->render('ExoCarnetBundle:Default:voir.html.twig',array(
            'membre'=> $membre,
            ));
    }


    public function suprimerAction($id)
    {

        $em= $this->getDoctrine()->getEntityManager();
        $em->remove($id);
        $em->flush();
        return $this->redirect($this->generateUrl('exo_carnet_carnet'));
    }   
}
