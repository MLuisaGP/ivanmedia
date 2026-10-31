<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Models\SiteConfig;
use App\Repositories\NicheRepository;
use App\Services\LegalPdfService;

/**
 * Class LegalController
 * Handles legal disclosures: Privacy Policy (Aviso de Privacidad) and Terms & Conditions.
 */
class LegalController
{
    public function __construct(
        private readonly SiteConfig $siteConfig = new SiteConfig(),
        private readonly NicheRepository $nicheRepository = new NicheRepository(),
        private readonly LegalPdfService $legalPdfService = new LegalPdfService()
    ) {}

    /**
     * Render the Privacy Policy (Aviso de Privacidad) page.
     */
    public function privacy(): void
    {
        $allNiches = $this->nicheRepository->getAll();

        echo View::render('pages/privacy', [
            'site' => $this->siteConfig,
            'allNiches' => $allNiches,
            'pageTitle' => 'Aviso de Privacidad Integral',
            'bodyClass' => 'page-legal',
            'isSolidHeader' => true,
            'isSubpage' => true,
        ], 'layouts/main');
    }

    /**
     * Stream Privacy Policy PDF.
     */
    public function downloadPrivacyPdf(): void
    {
        $this->legalPdfService->downloadPrivacyPdf();
    }

    /**
     * Render the Terms & Conditions page.
     */
    public function terms(): void
    {
        $allNiches = $this->nicheRepository->getAll();

        echo View::render('pages/terms', [
            'site' => $this->siteConfig,
            'allNiches' => $allNiches,
            'pageTitle' => 'Términos y Condiciones de Uso y Contratación',
            'bodyClass' => 'page-legal',
            'isSolidHeader' => true,
            'isSubpage' => true,
        ], 'layouts/main');
    }

    /**
     * Stream Terms & Conditions PDF.
     */
    public function downloadTermsPdf(): void
    {
        $this->legalPdfService->downloadTermsPdf();
    }
}
