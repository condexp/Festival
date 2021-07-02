<?php

namespace App\Controller;

use App\Form\ClientType;
use App\Entity\Lesclients;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ClientController extends AbstractController
{
    /**
     * @Route("/billeterie", name="app_client_billeterie")
     */
    public function index(Request $request): Response
    {
        $client = new Lesclients();
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();
            return $this->redirectToRoute('app_home');
        }
        return $this->render('billeterie/billeterie.html.twig', [
            'info_reservation' => 'Fiche de reservation client ',
            'clientForm' => $form->createView()
        ]);
    }
}
