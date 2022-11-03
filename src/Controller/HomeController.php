<?php

namespace App\Controller;

use App\Entity\Project;
use App\Entity\ProjectRepository;
use App\Repository\ProjectRepository as RepositoryProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(RepositoryProjectRepository $pr): Response
    {


        // if($this->getUser())
        // {
        //     if($this->getUser()->getRoles()[0] === 'ROLE_ADMIN')
        //     {
        //         return $this->redirectToRoute('app_admin');
        //     }   
        // } 
        $projects = $pr->findByStatus();
        dd($projects);

        return $this->render('home/index.html.twig', [
            'projects' => $projects,
        ]);

    }
}
