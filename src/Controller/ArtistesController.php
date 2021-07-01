<?php

namespace App\Controller;

use App\Entity\Artist;
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
    public function listArtistes(CategoryRepository $categoryRepository, ArtistRepository $artistRepository): Response
    {

        $categorycolor = [
            'Melodique' => 'primary',
            'Industrielle' => 'secondary',
            'Groovy' => 'success',
            'Deep' => 'info',
            'Detroit' => 'warning',
            null => 'dark',
        ];

        $categories = $categoryRepository->findAll();

        foreach ($categories as $categorie) {
            $categorie->setColor($categorycolor[$categorie->getName()]);

            //dd($categorie);

        }

        $artists = $artistRepository->findAll();

        //dd($posts);

        foreach ($artists as $artist) {

            $categoryName = $artist->getCategory() ? $artist->getCategory()->getName() : null;

            $color = $categoryName ? $categorycolor[$categoryName] : 'dark';

            $artist->setColor($color);
        }

        return $this->render('artistes/artistes.html.twig', [
            'categories' => $categories,
            'artistes' => $artists
        ]);
    }


    // Traitement Requete de sql de selection des artistes par category
    /**
     * @Route("/artist/category/{id}", methods={"GET"}, name="app_artist_category")
     */
    public function listArtisteByCategory($id, CategoryRepository $categoryRepository, ArtistRepository $artistRepository): Response
    {

        $categorycolor = [
            'Melodique' => 'primary',
            'Industrielle' => 'secondary',
            'Groovy' => 'success',
            'Deep' => 'info',
            'Detroit' => 'warning',
            null => 'dark',
        ];

        $categories = $categoryRepository->findAll();

        foreach ($categories as $categorie) {
            $categorie->setColor($categorycolor[$categorie->getName()]);

            //dd($categorie);

        }

        $artistbyCategory = $this->getDoctrine()->getRepository(Artist::class)->findBy(['category' => $id]);

        //dd($posts);

        foreach ($artistbyCategory as $artist) {

            $categoryName = $artist->getCategory() ? $artist->getCategory()->getName() : null;

            $color = $categoryName ? $categorycolor[$categoryName] : 'dark';

            $artist->setColor($color);
        }

        return $this->render('artistes/artistes.html.twig', [
            'categories' => $categories,
            'artistes' => $artistbyCategory
        ]);
    }

    /**
     * @Route("/artist/view/{id}", methods={"GET"}, name="app_artist_view")
     */
    public function ficheArtiste($id, ArtistRepository $artistRepository): Response
    {

        $artist = $artistRepository->findOneBy(['id' => $id]);
        $categorycolor = [
            'Melodique' => 'primary',
            'Industrielle' => 'secondary',
            'Groovy' => 'success',
            'Deep' => 'info',
            'Detroit' => 'warning',
            null => 'dark',
        ];
        $artist->setColor($categorycolor[$artist->getCategory()->getName()]);





        //dd($posts);
        return $this->render('artistes/view.html.twig', [

            'artist' => $artist
        ]);
    }

    /**
     * @Route("/agenda", name="app_agenda_enconcert")
     */
    public function listArtistesenconcert(ArtistRepository $artistRepository): Response
    {
        $lesartistenconcert = $artistRepository->findArtistByConcert();
        return $this->render('agenda/agenda.html.twig', [
            'lesconcerts' => $lesartistenconcert
        ]);
    }
}
