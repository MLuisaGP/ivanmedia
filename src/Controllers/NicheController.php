<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Models\SiteConfig;
use App\Repositories\NicheRepository;

/**
 * Class NicheController
 * Handles dedicated showcase pages for commercial niches.
 */
class NicheController
{
    public function __construct(
        private readonly NicheRepository $nicheRepository = new NicheRepository(),
        private readonly SiteConfig $siteConfig = new SiteConfig()
    ) {}

    /**
     * Display a specific niche page with its tailored description, quote CTA, and Pinterest-style gallery.
     */
    public function show(string $slug): void
    {
        $niche = $this->nicheRepository->findBySlug($slug);

        if ($niche === null) {
            \App\Core\Response::redirect('/#work', 302);
        }

        $allNiches = $this->nicheRepository->getAll();

        echo View::render('pages/niche', [
            'site' => $this->siteConfig,
            'niche' => $niche,
            'allNiches' => $allNiches,
        ], 'layouts/main');
    }
}
