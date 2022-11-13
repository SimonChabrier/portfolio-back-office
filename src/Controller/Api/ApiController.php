<?php

namespace App\Controller\Api;

use App\Entity\Project;
use App\Repository\ProjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ApiController extends AbstractController

{
   /**
     * @Route("/api", name="app_api")
     */
    public function api(ProjectRepository $pr): Response
    {

        $projects = $pr->findAllPublishedProjects();
        
        return $this->json(
            $projects,
             200, 
             [], 
             ['groups' => 'project:read']);

    }

    /**
     * @Route("/api/register", name="app_api_register", methods={"POST"})
     */
    public function createUser(EntityManagerInterface $doctrine,
            Request $request,
            SerializerInterface $serializer,
            ValidatorInterface $validator): Response
    {
        $data = $request->getContent();
        $newProject = $serializer->deserialize($data, Project::class, 'json');       
        $errors = $validator->validate($newProject);

        if (count($errors) > 0) {
            // les messages d'erreurs sont à définir dans les asserts de l'entité Project
            // Ex: @Assert\NotBlank(message = "Le Tire n'est pas présent")
            $errorsString = (string) $errors;
            return new JsonResponse($errorsString, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
       
        $doctrine->persist($newProject);
        $doctrine->flush();

        // ici on retourne la validité de la création pour que celui qui a fait la requête post 
        //puisse éventuellement ré-intercepter le nouvel objet avec du coup son Id qui vient dêtre crée en Bdd
        return $this->json(
        $newProject,
        Response::HTTP_CREATED,
        [],
        ['groups' => ['project:read']]
        );
        
    }

}