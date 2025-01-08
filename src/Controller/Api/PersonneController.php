<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Personne;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/api/personne', name: 'app_api_personne')]

class PersonneController extends AbstractController
{
    // public function index(): Response
    // {
    //     return $this->render('api/personne/index.html.twig', [
    //         'controller_name' => 'PersonneController',
    //     ]);
    // }
    #[Route('/register', name: 'personne_register', methods: ['POST'])]
    public function register(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher): JsonResponse {
       
        $data = json_decode($request->getContent(), true);

        $personne = new Personne();
        $personne->setNom($data['nom']);
        $personne->setPrenom($data['prenom']);
        // $personne->setDateNaissance(new \DateTime($data['dateNaissance']));
        $personne->setSexe($data['sexe']);
        $personne->setAddresse($data['addresse']);
        // $personne->setVille($data['ville']);
        $personne->setContact(contact: $data['contact']);
        $personne->setEmail($data['email']);
        $personne->setUsername($data['username']);
        $hashedPassword = $passwordHasher->hashPassword($personne, $data['password']);
        $personne->setPassword($hashedPassword);

        $entityManager->persist($personne);
        $entityManager->flush();

        return new JsonResponse(['message' => 'Inscription réussie'], 201);
    }
}
