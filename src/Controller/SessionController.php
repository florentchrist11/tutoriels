<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SessionController extends AbstractController
{
    #[Route('/session', name: 'app_session')]
    public function index(Request $request): Response
    {
        // Session_start

        $session = $request->getSession();
        $nbreVisite = 0 ;
        if($session->has(name:'nbreVisite')){

            $nbreVisite = $session->get(name:'nbreVisite') + 1 ;
            $session->set('nbreVisite', $nbreVisite);
        }else{
            $nbreVisite = 1 ;
        }
     $session->set('nbreVisite', $nbreVisite);

        return $this->render('session/index.html.twig'
        );
    }
}
