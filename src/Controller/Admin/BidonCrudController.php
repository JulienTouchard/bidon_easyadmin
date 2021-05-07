<?php

namespace App\Controller\Admin;

use App\Entity\Bidon;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BidonCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Bidon::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
