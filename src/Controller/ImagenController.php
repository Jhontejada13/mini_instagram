<?php

namespace App\Controller;

use App\Entity\Imagen;
use App\Form\ImagenType;
use App\Repository\ImagenRepository;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/imagen")
 */
class ImagenController extends AbstractController
{
    /**
     * @Route("/", name="imagen_index", methods={"GET"})
     */
    public function index(ImagenRepository $imagenRepository): Response
    {
        return $this->render('imagen/index.html.twig', [
            'imagens' => $imagenRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="imagen_new", methods={"GET","POST"})
     */
    public function new(Request $request, FileUploader $fileUploader): Response
    {
        $imagen = new Imagen();
        $form = $this->createForm(ImagenType::class, $imagen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $imagenFile = $form->get('foto')->getData();
            if($imagenFile){
                $imagenFileName = $fileUploader->cargar($imagenFile);
                $imagen->setFoto($imagenFileName);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($imagen);
            $entityManager->flush();

            return $this->redirectToRoute('imagen_index');
        }

        return $this->render('imagen/new.html.twig', [
            'imagen' => $imagen,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="imagen_show", methods={"GET"})
     */
    public function show(Imagen $imagen, FileUploader $fileUploader): Response
    {

        // $rutaImagen = $fileUploader->getDirectorioDestino();
        $rutaImagen = '/fotos/'.$imagen->getFoto();

        return $this->render('imagen/show.html.twig', [
            'imagen' => $imagen,
            'rutaImagen' => $rutaImagen
        ]);
    }

    /**
     * @Route("/{id}/edit", name="imagen_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Imagen $imagen): Response
    {
        $form = $this->createForm(ImagenType::class, $imagen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('imagen_index');
        }

        return $this->render('imagen/edit.html.twig', [
            'imagen' => $imagen,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="imagen_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Imagen $imagen): Response
    {
        if ($this->isCsrfTokenValid('delete'.$imagen->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($imagen);
            $entityManager->flush();
        }

        return $this->redirectToRoute('imagen_index');
    }
}
