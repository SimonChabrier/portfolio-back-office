<?php

namespace App\Controller\Api;
use App\Entity\Project;
use App\Repository\ProjectRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ApiController extends AbstractController

{
   /**
     * @Route("/api", name="app_api")
     */
    public function api(ProjectRepository $pr): Response
    {

        $projects = $pr->findByStatus();
        return $this->json($projects, 200, [], ['groups' => 'project:read']);

    }

}