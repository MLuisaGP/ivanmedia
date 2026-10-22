<?php
declare(strict_types=1);

/**
 * @var array<string, \App\Models\Niche> $niches
 */
?>
<section class="work-section" id="work">
  <div class="work-heading reveal">
    <div>
      <div class="section-label"><span>03</span> / Sectores especializados</div>
      <h2>Menos scroll.<br><em>Más impacto en tu sector.</em></h2>
    </div>
    <p>Contenido audiovisual creado a la medida de tu industria. Selecciona un sector comercial para explorar producciones reales, fotografía comercial y reels estratégicos.</p>
  </div>

  <div class="project-grid niche-grid" id="nichesGrid">
    <?php foreach ($niches as $niche): ?>
    <a href="<?= e($niche->url()) ?>" class="project-card niche-card reveal" aria-label="Explorar producciones para: <?= e($niche->name) ?>">
      <span class="project-image">
        <img loading="lazy" src="<?= e($niche->coverImage) ?>" alt="<?= e($niche->name) ?>">
        <span class="project-open" aria-hidden="true"><?= icon('arrow-up-right') ?></span>
      </span>
      <span class="project-meta">
        <span><?= e($niche->badge) ?></span>
        <span><?= $niche->formattedOrder() ?></span>
      </span>
      <strong><?= e($niche->name) ?></strong>
      <p class="niche-card-summary"><?= e($niche->tagline) ?></p>
    </a>
    <?php endforeach; ?>
  </div>
</section>
