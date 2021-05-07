<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Bidon;
use App\Entity\User;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Bidon');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Administration', 'fa fa-home');
        yield MenuItem::linkToCrud('Bidon', 'fas fa-prescription-bottle', Bidon::class);
        yield MenuItem::linkToCrud('User', 'fas fa-user', User::class);
    }
}
