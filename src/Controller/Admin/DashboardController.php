<?php

namespace App\Controller\Admin;

use App\Controller\Admin\WarningsCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;

#[AdminDashboard(routePath: '/', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        // Crear el AdminUrlGenerator de forma segura dentro del método
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // Generar la URL para el controlador WarningsCrudController
        $urlWarnings = $adminUrlGenerator
            ->setController(WarningsCrudController::class)
            ->generateUrl();
            
        return $this->redirect($urlWarnings);

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Inspector');
    }

    public function configureMenuItems(): iterable
    {
        # yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Warnings', 'fas fa-exclamation-triangle', \App\Entity\Warnings::class);
    }
}
