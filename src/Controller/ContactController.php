<?php

namespace App\Controller;

use App\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        $this->addFlash('info', 'Veuillez saisir votre demande');
        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contactFormData);
            $entityManager->flush();

            $this->addFlash('success', 'La demande à bien été envoyée');
            return $this->redirectToRoute('contact');
        }
        return $this->render('contact/contact.html.twig', [
                    'contact_form' => $form->createView()
        ]);
    }

}
