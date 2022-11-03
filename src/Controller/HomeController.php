<?php

namespace App\Controller;

use App\Entity\Project;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(): Response
    {
        if($this->getUser())
        {
            if($this->getUser()->getRoles()[0] === 'ROLE_ADMIN')
            {
                return $this->redirectToRoute('app_admin');
            }   
        } 

    }
}
