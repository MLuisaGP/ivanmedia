<?php
declare(strict_types=1);

/**
 * @var array<\App\Models\Project> $projects
 */
?>
<section class="work-section" id="work">
  <div class="work-heading reveal">
    <div>
      <div class="section-label"><span>03</span> / Trabajo seleccionado</div>
      <h2>Menos scroll.<br><em>Más impacto.</em></h2>
    </div>
    <p>Una selección de estilos, conceptos y momentos creados para destacar en pantalla y fuera de ella.</p>
  </div>
  <div class="filter-bar" role="group" aria-label="Filtrar proyectos">
    <button class="filter-btn is-active" data-filter="todos">Todo <span><?= str_pad((string)count($projects), 2, '0', STR_PAD_LEFT) ?></span></button>
    <button class="filter-btn" data-filter="gastronomia">Gastronomía</button>
    <button class="filter-btn" data-filter="fitness">Fitness</button>
    <button class="filter-btn" data-filter="producto">Producto</button>
    <button class="filter-btn" data-filter="corporativo">Corporativo</button>
  </div>
  <div class="project-grid" id="projectGrid">
    <?php foreach ($projects as $project): ?>
    <button class="project-card reveal" data-category="<?= e($project->category) ?>" data-title="<?= e($project->title) ?>" data-description="<?= e($project->description) ?>" data-image="<?= e($project->image) ?>" aria-label="Ver proyecto: <?= e($project->title) ?>">
      <span class="project-image">
        <img loading="lazy" src="<?= e($project->image) ?>" alt="<?= e($project->title) ?>">
        <span class="project-open"><?= icon('arrow-up-right') ?></span>
      </span>
      <span class="project-meta">
        <span><?= e($project->tag) ?></span>
        <span><?= $project->formattedNumber() ?></span>
      </span>
      <strong><?= e($project->title) ?></strong>
    </button>
    <?php endforeach; ?>
  </div>
</section>
