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
        return $this->render('page/homepage.html.twig', [
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
        return $this->render('page/page1.html.twig', [
            'message' => 'Page ' . $id,
        ]);
    }

    #[Route('/page/{code}', name: 'error')]
    public function show($code): Response
    {
        return $this->render('page/haha.html.twig', [
            'code' => $code,
        ]);
    }


    #[Route(
        path: '/contact',
        name: 'contact',
        methods: ['GET', 'POST']
    )]
    public function contact(Request $request): Response
    {
        if ($request->isMethod('POST')) {

            $data = $request->request->all();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('page/contact.html.twig', [
            'message' => 'Me contacter',
        ]);
    }
}