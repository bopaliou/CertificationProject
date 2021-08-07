<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Image;
use App\Entity\Document;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

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
            ->setTitle('La page d\'administration de SamaCarte');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Acceuil', 'fa fa-home');
        yield MenuItem::linkToCrud('Documents', 'fas fa-id-card', Document::class);
        yield MenuItem::linkToCrud('Images', 'fas fa-images', Image::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-users', User::class);
    }
}
