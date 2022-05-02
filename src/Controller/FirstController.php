<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FirstController extends AbstractController
{
    #[Route('/first', name: 'app_first')]
    public function index(): Response
    {
      
        return $this->render(view:'first/index.html.twig'
        );
       

    }    
    
    /**
     * sayHello
     * 
     * @return Response
     */

    #[Route('/sayHello/{name}/{firstname}', name: 'app_first')]
    public function sayHello( Request $request , $name , $firstname): Response 
  
    {
       
        return $this->render('first/index.html.twig',
    [
        'nom' => $request->name ,
        'prenom' => $request->firstname,
    ]);
    }
   
    
}
