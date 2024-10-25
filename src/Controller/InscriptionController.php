<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Routing\Annotation\Route;

class InscriptionController extends AbstractController
{
    #[Route("/inscription", name: "inscription")]
    function inscription()
    {
        $formulaire = $this->createFormBuilder();
        $formulaire->setMethod('POST');
        $formulaire->setAttributes(['class' => "MonID"]);
        $formulaire
            ->add(
                'nom',
                TextType::class,
                ["label" => "Nom de famille", 'attr' => ['placeholder' => "Entrez votre nom"]]
            )
            ->add('prenom', TextType::class, ['attr' => ['placeholder' => "Entrez votre prénom"]]);

        $inscriptionForm = $formulaire->getForm();
        return $this->render('inscription.html.twig', ['formulaire' => $inscriptionForm]);
    }
}
