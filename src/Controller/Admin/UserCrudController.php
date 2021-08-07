<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id');
        yield EmailField::new('email');
        yield TextField::new('password');
        yield ArrayField::new('roles');
        yield TextField::new('nom');
        yield TextField::new('prenom');
        yield TextField::new('adresse');
        $dateNaissance = DateTimeField::new('dateNaissance')->setFormTypeOptions([
                        'html5' => true,
                        'years' => range(date('Y'), date('Y') + 5),
                        'widget' => 'single_text',
                    ]);
                    if (Crud::PAGE_EDIT === $pageName) {
                        yield $dateNaissance->setFormTypeOption('enabled', true);
                    } else {
                        yield $dateNaissance;
                    }
        
        yield TextField::new('lieuNaissance');
        yield TextField::new('telephone');
        
    }
    
}
