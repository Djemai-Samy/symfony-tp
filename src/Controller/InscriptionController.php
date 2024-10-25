<?php

namespace App\Controller;

use App\Form\InscriptionForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class InscriptionController extends AbstractController
{
    #[Route("/inscription", name: "inscription", methods: ['GET', 'POST'])]
    function inscription(Request $req)
    {
        // Instancier un objet à lier avec le formulaire
        $user = new User();

        // Création du formulaire a partir de la classe InscriptionForm 
        //en le liant avec l'objet
        $inscriptionForm = $this->createForm(InscriptionForm::class, $user);

        // Récuperer les données du corps de la requête
        $inscriptionForm->handleRequest($req);

        // Tester si le formulaire est soumis et valide
        if ($inscriptionForm->isSubmitted() && $inscriptionForm->isValid()) {
            // L'objet user sera automatiquement iriguer avec les données du formulaire
            dump($user);
        }

        // Retourner la vue avec le formulaire
        return $this->render(
            'inscription.html.twig',
            ['formulaire' => $inscriptionForm->createView()]
        );
    }
}

class User
{
    private $email;
    private $nom;
    private $prenom;
    private $genre;

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getGenre()
    {
        return $this->genre;
    }

    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}
