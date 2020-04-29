<?php

namespace App\Controller;

use App\Entity\Comentarioimagen;
use App\Form\ComentarioimagenType;
use App\Repository\ComentarioImagenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/comentarioimagen")
 */
class ComentarioimagenController extends AbstractController
{
    /**
     * @Route("/", name="comentarioimagen_index", methods={"GET"})
     */
    public function index(ComentarioImagenRepository $comentarioImagenRepository): Response
    {
        return $this->render('comentarioimagen/index.html.twig', [
            'comentarioimagens' => $comentarioImagenRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="comentarioimagen_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $comentarioimagen = new Comentarioimagen();
        $form = $this->createForm(ComentarioimagenType::class, $comentarioimagen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($comentarioimagen);
            $entityManager->flush();

            return $this->redirectToRoute('comentarioimagen_index');
        }

        return $this->render('comentarioimagen/new.html.twig', [
            'comentarioimagen' => $comentarioimagen,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="comentarioimagen_show", methods={"GET"})
     */
    public function show(Comentarioimagen $comentarioimagen): Response
    {
        return $this->render('comentarioimagen/show.html.twig', [
            'comentarioimagen' => $comentarioimagen,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="comentarioimagen_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Comentarioimagen $comentarioimagen): Response
    {
        $form = $this->createForm(ComentarioimagenType::class, $comentarioimagen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('comentarioimagen_index');
        }

        return $this->render('comentarioimagen/edit.html.twig', [
            'comentarioimagen' => $comentarioimagen,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="comentarioimagen_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Comentarioimagen $comentarioimagen): Response
    {
        if ($this->isCsrfTokenValid('delete'.$comentarioimagen->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($comentarioimagen);
            $entityManager->flush();
        }

        return $this->redirectToRoute('comentarioimagen_index');
    }
}
