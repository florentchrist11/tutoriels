<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Polyfill\Intl\Idn\Info;

class TodoController extends AbstractController
{
    #[Route('/todo', name: 'app_todo')]
    public function index(Request $request): Response
    {
        // Afficher notre tableau de todos
        //Si j'ai mon tableau de de todos dans ma session je ne fait que l'afficher 
        // Si non je l'initialise
        $session = $request->getSession();
      
        $todoslist = null ;
       
        if(!$session->has(name:'todoslist')){
           
  
            $todoslist = [
    'achat' => 'Acheter clé USB',
    'cours' => 'Finaliser les cours',
    'correction' => 'Corriger mes examens'
            ];

            $session->set('todoslist', $todoslist);
            $this->addFlash('success', 'Article Created SUCCEFULLY');

        }

        return $this->render('todo/index.html.twig'
        );
    }
    
    /**
     * addTodo
     
     * @return void
     */
    #[Route('/todo/{name}/{content}', name:'name.content')]
    public function addTodo(Request $request , $name , $content){
        // Verifier si j'ai mon tableau de todos dans la session 
        $session = $request->getSession();


        if($session->has(name:'todoslist')){

            $todoslist = $session->get('todoslist');

            if(isset( $todoslist[$name])){
                $this->addFlash('danger', 'Article Was not created Created!');
            }else{
                $todoslist[$name] = $content ;
                $session->set('todoslist', $todoslist);
               
                return $this->redirectToRoute('app_todo');
                $this->addFlash('success', 'Article Was not created Created!');

            }


        }else{
            $this->addFlash('danger', 'Article Was not created Created!');

        }

        return $this->redirectToRoute('app_todo');
      
        
    }
}
