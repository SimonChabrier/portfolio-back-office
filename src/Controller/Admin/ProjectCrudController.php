<?php

namespace App\Controller\Admin;

use App\Entity\Link;
use App\Entity\Project;
use Doctrine\DBAL\Types\ArrayType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
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
            TextField::new('title')
                ->setLabel('Titre du projet'),
            TextareaField::new('desciption')
                ->hideOnIndex(),
            TextField::new('date')
                ->setLabel('Date de réalisation'),
            AssociationField::new('links')
                ->setFormTypeOptions([
                    'by_reference' => false,
                ])
                ->setLabel('Liens du projet'),
            AssociationField::new('technos')
                ->setLabel('Technos utilisées'),
        ];
    }
    
}
