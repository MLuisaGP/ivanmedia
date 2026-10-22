<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Models\SiteConfig;
use App\Repositories\NicheRepository;
use App\Repositories\ProjectRepository;

/**
 * Class HomeController
 * Orchestrates main landing page delivery.
 */
class HomeController
{
    public function __construct(
        private readonly NicheRepository $nicheRepository = new NicheRepository(),
        private readonly ProjectRepository $projectRepository = new ProjectRepository(),
        private readonly SiteConfig $siteConfig = new SiteConfig()
    ) {}

    /**
     * Render the one-page homepage.
     */
    public function index(): void
    {
        $niches = $this->nicheRepository->getAll();
        $projects = $this->projectRepository->getAll();

        echo View::render('pages/home', [
            'site' => $this->siteConfig,
            'niches' => $niches,
            'projects' => $projects,
        ], 'layouts/main');
    }
}
