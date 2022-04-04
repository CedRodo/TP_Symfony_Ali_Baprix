<?php

namespace App\Controller;

use App\Form\NewsletterType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NewsletterController extends AbstractController
{
    #[Route('/newsletter', name: 'app_newsletter')]
    public function index(Request $request): Response
    {
        $newsletter=$this->createForm(NewsletterType::class);
        
        $newsletter->handleRequest($request);

        if ($newsletter->isSubmitted()){

            $data=$newsletter->getData();
            
            return $this->renderForm('newsletter/envoye.html.twig', [
                'data' => $data
            ]);
        }

        else {

        $nom = 'Cedric';
            return $this->renderForm('newsletter/index.html.twig', [
            'nom' => $nom,
            'form' => $newsletter
        ]);
        }
    }
}
