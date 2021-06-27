<?php

namespace App\Controller;

use App\Repository\ArtistRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ArtistesController extends AbstractController
{
    

    /**
     * @Route("/artistes", name="app_artistes")
     */
    public function findAllCategory(CategoryRepository $categoryRepository,ArtistRepository $artistRepository): Response
    {

        $categorycolor=['Melodique'=>'primary',
        'Industrielle'=>'secondary',
        'Groovy'=>'success',
        'Deep'=>'info',
        'Detroit'=>'warning',
        null=>'dark',
    ];

        $categories = $categoryRepository->findAll();


        foreach ($categories as $categorie){
            $categorie->setColor($categorycolor[$categorie->getName()]);
            //dd($categorie);

        }




        $artists=$artistRepository->findAll();
        
            //dd($posts);

        foreach($artists as $artist){

        $categoryName=$artist->getCategory()?$artist->getCategory()->getName():null;

        $color=$categoryName ? $categorycolor[$categoryName]:'dark';

        $artist->setColor($color);
}

        return $this->render('artistes/artistes.html.twig', [
            'categorys' => $categories,       
            'artistes'=>$artists
        ]);
    }

}
