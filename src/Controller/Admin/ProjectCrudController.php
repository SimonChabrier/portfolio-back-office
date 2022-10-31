<?php

namespace App\Controller\Admin;

use App\Entity\Link;
use App\Entity\Project;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Project::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextareaField::new('desciption'),
            TextField::new('date'),
            AssociationField::new('links'),
            AssociationField::new('technos'),
            //TextField::new('technos'),
            
        ];
    }
    
}
