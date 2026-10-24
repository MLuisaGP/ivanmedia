<?php
declare(strict_types=1);

/**
 * @var \App\Models\SiteConfig $site
 * @var string $content
 * @var \App\Models\Niche|null $niche
 * @var array<string, \App\Models\Niche>|null $allNiches
 * @var string|null $pageTitle
 */
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#021B39">
  <meta name="description" content="<?= e($site->description) ?>">
  <title><?= isset($niche) ? e($niche->name) . ' — ' . e($site->name) : e($site->name) . ' — Contenido que se siente. Resultados que se notan.' ?></title>
  <link rel="icon" type="image/png" href="/assets/images/logos/logoIM.png">
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/assets/images/logos/logoIM.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/style.css">
  <script>document.documentElement.classList.add('js');</script>
</head>
<body id="top" class="<?= isset($niche) ? 'page-niche' : 'page-home' ?>">
  <div class="scroll-progress" aria-hidden="true"><span id="scrollProgress"></span></div>

  <?= \App\Core\View::partial('partials/header', ['site' => $site, 'niche' => $niche ?? null]) ?>

  <main>
    <?= $content ?>
  </main>

  <?= \App\Core\View::partial('partials/footer', ['site' => $site, 'allNiches' => $allNiches ?? null]) ?>

  <?= \App\Core\View::partial('partials/modal') ?>
  <?= \App\Core\View::partial('partials/quote_modal', ['site' => $site]) ?>

  <a class="back-top" href="#top" aria-label="Volver al inicio"><?= icon('arrow-up') ?></a>
  <script src="/assets/js/main.js" defer></script>
</body>
</html>
