<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Project;
use App\Entity\Link;
use App\Entity\Techno;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/admin", name="app_admin")
     */
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(UserCrudController::class)->generateUrl());

        //return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Portfolio Back End');
    }

    public function configureMenuItems(): iterable
    {   
        yield MenuItem::linkToLogout('Logout', 'fa fa-fw fa-sign-out');
        yield MenuItem::section('app admin');
        //uncomment this line to main Dashboard
        //yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('User', 'fas fa-user', User::class)->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Projects', 'fa fa-comment', Project::class)->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Links', 'fa fa-comment', Link::class)->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Technos', 'fa fa-comment', Techno::class)->setPermission('ROLE_ADMIN');
        yield MenuItem::section('link');
        yield MenuItem::linkToUrl('Portfolio', 'fas fa-link', 'https://simonchabrier.github.io');
        yield MenuItem::linkToUrl('EasyAdmin', 'fas fa-link', 'https://symfony.com/bundles/EasyAdminBundle/current/index.html');
        
    }
}
