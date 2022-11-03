<?php

namespace App\Controller\Admin;

use App\Entity\Project;

use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class ProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Project::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            BooleanField::new('status')->setLabel('Publié'),
            TextField::new('title')->setLabel('Titre du projet'),
            TextareaField::new('desciption')->hideOnIndex(),
            TextField::new('date')->setLabel('Date de réalisation'),
            AssociationField::new('technos')->setLabel('Technos utilisées'),
            //* On AssociationField, add ->setFormTypeOptions([ 'by_reference' => false ])
            //* if more than one value in database
            AssociationField::new('links')->setFormTypeOptions([ 'by_reference' => false ])->setLabel('Liens du projet'), 
            AssociationField::new('user')->setLabel('Auteur du projet'),
            ImageField::new('picture')
                ->setBasePath('assets/media/')
                ->setUpLoadDir('public/assets/media/')
                ->setLabel('Image')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            
        ];
    }


    
}
