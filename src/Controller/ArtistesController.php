<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtistesController extends AbstractController
{
    /**
     * @Route("/artistes", name="app_artistes")
     */
    public function index(): Response
    {
        return $this->render('artistes/artistes.html.twig', [
            'controller_name' => 'ArtistesController',
        ]);
    }
}
