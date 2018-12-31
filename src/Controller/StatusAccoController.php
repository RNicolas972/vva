<?php

namespace App\Controller;

use App\Entity\StatusAcco;
use App\Form\StatusAccoType;
use App\Repository\StatusAccoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/statusAcco")
 */
class StatusAccoController extends AbstractController
{
    /**
     * @Route("/", name="status_acco_index", methods={"GET"})
     */
    public function index(StatusAccoRepository $statusAccoRepository): Response
    {
        return $this->render('status_acco/index.html.twig', ['status_accos' => $statusAccoRepository->findAll()]);
    }

    /**
     * @Route("/new", name="status_acco_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $statusAcco = new StatusAcco();
        $form = $this->createForm(StatusAccoType::class, $statusAcco);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($statusAcco);
            $entityManager->flush();

            return $this->redirectToRoute('status_acco_index');
        }

        return $this->render('status_acco/new.html.twig', [
            'status_acco' => $statusAcco,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="status_acco_show", methods={"GET"})
     */
    public function show(StatusAcco $statusAcco): Response
    {
        return $this->render('status_acco/show.html.twig', ['status_acco' => $statusAcco]);
    }

    /**
     * @Route("/{id}/edit", name="status_acco_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, StatusAcco $statusAcco): Response
    {
        $form = $this->createForm(StatusAccoType::class, $statusAcco);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('status_acco_index', ['id' => $statusAcco->getId()]);
        }

        return $this->render('status_acco/edit.html.twig', [
            'status_acco' => $statusAcco,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="status_acco_delete", methods={"DELETE"})
     */
    public function delete(Request $request, StatusAcco $statusAcco): Response
    {
        if ($this->isCsrfTokenValid('delete'.$statusAcco->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($statusAcco);
            $entityManager->flush();
        }

        return $this->redirectToRoute('status_acco_index');
    }
}
