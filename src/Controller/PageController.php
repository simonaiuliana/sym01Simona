<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route; // Am folosit `Annotation\Route` aici pentru claritate

class PageController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('pages/index.html.twig', [
            'message' => 'Bienvenue',
        ]);
    }

    #[Route(
        path: '/page1/{id}',
        name: 'page1',
        requirements: ['id' => '\d+'],
        defaults: ['id' => 1],
        methods: ['GET']
    )]
    public function article(int $id): Response
    {
        return $this->render('pages/page1.html.twig', [
            'idarticle' => $id,
        ]);
    }
}
