<?php

namespace App\Controller;

use App\Entity\Persona;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\PersonaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]); 
    }

    public function crearPersona(Request $request, UserPasswordEncoderInterface $encoder){
        $persona = new Persona();//Intancio la clase persona

        $form = $this->createForm(PersonaType::class, $persona);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $persona->getNombre();
            $persona->getApellido();
            $persona->getEmail();

            $encoded = $encoder->encodePassword($persona, $persona->getClave());//Cifra la clave con el algoritmo bcrypt añadido en security.yaml
            $persona->setClave($encoded);//Pasa la clave cifrada

            var_dump($persona);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($persona);
            $entityManager->flush();

            $session = new Session();
            $session->getFlashBag()->add('mensaje', 'Persona creada con exito');

            return $this->redirectToRoute('registro');

        }

        return $this->render('home/crearPersona.html.twig', [
            'form' => $form->createView()
        ]);

    }
}
