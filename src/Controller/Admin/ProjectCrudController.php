<?php

namespace App\Controller\Admin;

use App\Entity\Link;
use App\Entity\Techno;
use App\Entity\Project;

use App\Controller\Admin\LinkCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;

class ProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Project::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title')->setLabel('Titre du projet'),
            TextareaField::new('desciption')->hideOnIndex(),
            TextField::new('date')->setLabel('Date de réalisation'),
            AssociationField::new('links')->setFormTypeOptions([ 'by_reference' => false ])->setLabel('Liens du projet'),
            ArrayField::new('links')->setLabel('Liens du projet'),
            //AssociationField::new('technos')->setLabel('Technos utilisées'),
        ];
    }


    
}
