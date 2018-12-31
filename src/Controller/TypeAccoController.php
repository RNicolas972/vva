<?php

namespace App\Controller;

use App\Entity\TypeAcco;
use App\Form\TypeAccoType;
use App\Repository\TypeAccoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/typeAcco")
 */
class TypeAccoController extends AbstractController
{
    /**
     * @Route("/", name="type_acco_index", methods={"GET"})
     */
    public function index(TypeAccoRepository $typeAccoRepository): Response
    {
        return $this->render('type_acco/index.html.twig', ['type_accos' => $typeAccoRepository->findAll()]);
    }

    /**
     * @Route("/new", name="type_acco_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typeAcco = new TypeAcco();
        $form = $this->createForm(TypeAccoType::class, $typeAcco);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeAcco);
            $entityManager->flush();

            return $this->redirectToRoute('type_acco_index');
        }

        return $this->render('type_acco/new.html.twig', [
            'type_acco' => $typeAcco,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_acco_show", methods={"GET"})
     */
    public function show(TypeAcco $typeAcco): Response
    {
        return $this->render('type_acco/show.html.twig', ['type_acco' => $typeAcco]);
    }

    /**
     * @Route("/{id}/edit", name="type_acco_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypeAcco $typeAcco): Response
    {
        $form = $this->createForm(TypeAccoType::class, $typeAcco);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_acco_index', ['id' => $typeAcco->getId()]);
        }

        return $this->render('type_acco/edit.html.twig', [
            'type_acco' => $typeAcco,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_acco_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TypeAcco $typeAcco): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeAcco->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typeAcco);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_acco_index');
    }
}
