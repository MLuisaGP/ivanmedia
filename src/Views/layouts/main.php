<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#021B39">
  <meta name="description" content="<?= e($site->description) ?>">
  <title><?= e($site->name) ?> — Contenido que se siente. Resultados que se notan.</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <script>document.documentElement.classList.add('js');</script>
</head>
<body>
  <div class="scroll-progress" aria-hidden="true"><span id="scrollProgress"></span></div>

  <?= \App\Core\View::partial('partials/header', ['site' => $site]) ?>

  <main>
    <?= $content ?>
  </main>

  <?= \App\Core\View::partial('partials/modal') ?>

  <a class="back-top" href="#top" aria-label="Volver al inicio"><?= icon('arrow-up') ?></a>
  <script src="assets/js/main.js" defer></script>
</body>
</html>
