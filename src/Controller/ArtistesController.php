<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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


    /**
     * @Route("/artistes", name="app_artistes")
     */
    public function findAllCategory(CategoryRepository $categoryRepository): Response
    {
        $category = $categoryRepository->findAll();
        //dd($posts);

        return $this->render('artistes/artistes.html.twig', [
            'categorys' => $category,
        ]);
    }

}
