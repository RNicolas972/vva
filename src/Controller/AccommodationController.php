<?php

namespace App\Controller;

use App\Entity\Accommodation;
use App\Form\AccommodationType;
use App\Repository\AccommodationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/accommodation")
 */
class AccommodationController extends AbstractController
{
    /**
     * @Route("/", name="accommodation_index", methods={"GET"})
     */
    public function index(AccommodationRepository $accommodationRepository): Response
    {
        return $this->render('accommodation/index.html.twig', ['accommodations' => $accommodationRepository->findAll()]);
    }

    /**
     * @Route("/new", name="accommodation_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $accommodation = new Accommodation();
        $form = $this->createForm(AccommodationType::class, $accommodation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($accommodation);
            $entityManager->flush();

            return $this->redirectToRoute('accommodation_index');
        }

        return $this->render('accommodation/new.html.twig', [
            'accommodation' => $accommodation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="accommodation_show", methods={"GET"})
     */
    public function show(Accommodation $accommodation): Response
    {
        return $this->render('accommodation/show.html.twig', ['accommodation' => $accommodation]);
    }

    /**
     * @Route("/{id}/edit", name="accommodation_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Accommodation $accommodation): Response
    {
        $form = $this->createForm(AccommodationType::class, $accommodation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('accommodation_index', ['id' => $accommodation->getId()]);
        }

        return $this->render('accommodation/edit.html.twig', [
            'accommodation' => $accommodation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="accommodation_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Accommodation $accommodation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$accommodation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($accommodation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('accommodation_index');
    }
}
