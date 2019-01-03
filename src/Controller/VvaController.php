<?php

namespace App\Controller;

use App\Entity\Accommodation;
use App\Repository\AccommodationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class VvaController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('vva/index.html.twig', [
            'controller_name' => 'VvaController',
        ]);
    }

    /**
     * @Route("/journey", name="journey_index", methods={"GET"})
     */
    public function journey(AccommodationRepository $accommodationRepository): Response
    {
        return $this->render('vva/journey.html.twig', [
            'controller_name' => 'Journey',
            'accommodations' => $accommodationRepository->findAll()
        ]);
    }

    /**
     * @Route("/journey/{name}", name="journey_show", methods={"GET"})
     */
    public function show(Accommodation $accommodation): Response
    {
        return $this->render('vva/show.html.twig', [
            'accommodation' => $accommodation,
        ]);
    }
}
