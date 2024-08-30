<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{

    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('page/index.html.twig', [
            'message' => 'Bienvenue',
        ]);
    }


    #[Route(
        path: '/page/{id}',
        name: 'page',
        requirements: ['id' => '\d+'],
        defaults: ['id' => 1],
        methods: ['GET']
    )]
    public function page(int $id = 1): Response
    {
        return $this->render('page/page1                .html.twig', [
            'message' => 'page ' . $id,
        ]);
    }

    #[Route(
        path: '/page/haha',
        name: 'haha',
        methods: ['GET']
    )]
    public function haha(string $slug): Response
    {
        throw $this->createNotFoundException('ERROR');
    }





    #[Route(
        path: '/contact',
        name: 'contact',
        methods: ['GET', 'POST']
    )]
    public function contact(Request $request): Response
    {
        if ($request->isMethod('POST')) {

            $data = $request->request->all(); // Example of form data retrieval

            return $this->redirectToRoute('homepage'); // Redirect after processing
        }

       
        return $this->render('page/contact.html.twig', [
            'message' => 'Me contacter',
        ]);
    }
}