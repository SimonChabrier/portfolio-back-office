<?php

namespace App\Controller\Admin;

use App\Entity\Link;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class LinkCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Link::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('link')->setLabel('Url du lien'),
            AssociationField::new('project')->setLabel('Titre du projet'),
        ];
    }
    
}
