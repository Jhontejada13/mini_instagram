<?php

namespace App\Controller;

use App\Entity\Comentarioalbum;
use App\Form\ComentarioalbumType;
use App\Repository\ComentarioAlbumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/comentarioalbum")
 */
class ComentarioalbumController extends AbstractController
{
    /**
     * @Route("/", name="comentarioalbum_index", methods={"GET"})
     */
    public function index(ComentarioAlbumRepository $comentarioAlbumRepository): Response
    {
        return $this->render('comentarioalbum/index.html.twig', [
            'comentarioalbums' => $comentarioAlbumRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="comentarioalbum_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $comentarioalbum = new Comentarioalbum();
        $form = $this->createForm(ComentarioalbumType::class, $comentarioalbum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($comentarioalbum);
            $entityManager->flush();

            return $this->redirectToRoute('comentarioalbum_index');
        }

        return $this->render('comentarioalbum/new.html.twig', [
            'comentarioalbum' => $comentarioalbum,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="comentarioalbum_show", methods={"GET"})
     */
    public function show(Comentarioalbum $comentarioalbum): Response
    {
        return $this->render('comentarioalbum/show.html.twig', [
            'comentarioalbum' => $comentarioalbum,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="comentarioalbum_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Comentarioalbum $comentarioalbum): Response
    {
        $form = $this->createForm(ComentarioalbumType::class, $comentarioalbum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('comentarioalbum_index');
        }

        return $this->render('comentarioalbum/edit.html.twig', [
            'comentarioalbum' => $comentarioalbum,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="comentarioalbum_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Comentarioalbum $comentarioalbum): Response
    {
        if ($this->isCsrfTokenValid('delete'.$comentarioalbum->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($comentarioalbum);
            $entityManager->flush();
        }

        return $this->redirectToRoute('comentarioalbum_index');
    }
}
