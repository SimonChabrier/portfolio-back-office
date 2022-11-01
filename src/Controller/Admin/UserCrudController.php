<?php

namespace App\Controller\Admin;

use App\Entity\User;

use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('username')->setLabel('Nom d\'utilisateur'),
            TextField::new('email')->setLabel('Email'),
            TextField::new('password')->hideOnIndex()->setLabel('Password'),
            BooleanField::new('isVerified')->renderAsSwitch(true)->setLabel('Mail Vérifié'),
            BooleanField::new('status')->renderAsSwitch(true)->setLabel('Statut'),
            ChoiceField::new('roles')->allowMultipleChoices(true)->setChoices(['Admin' => 'ROLE_ADMIN']),
        ];
    }

}
