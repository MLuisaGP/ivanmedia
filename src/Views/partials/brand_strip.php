<?php
declare(strict_types=1);

/**
 * Sección 08: Marcas que ya confían en Ivan Media
 */
$brands = [
    [
        'name' => 'La Salsa',
        'sector' => 'Restaurante & Grill',
        'file' => 'la-salsa.png',
        'height' => 42,
    ],
    [
        'name' => 'Pausa Café',
        'sector' => 'Cafetería de Especialidad',
        'file' => 'pausa-cafe-dark.png',
        'height' => 36,
    ],
    [
        'name' => 'Phocas Mariscos',
        'sector' => 'Gastronomía de Mar',
        'file' => 'phocas-mariscos.png',
        'height' => 50,
    ],
    [
        'name' => 'Runfit Studio',
        'sector' => 'Fitness & Rendimiento',
        'file' => 'runfit-dark.png',
        'height' => 32,
    ],
    [
        'name' => 'Super Team',
        'sector' => 'Crossfit & Deporte',
        'file' => 'super-team-dark.png',
        'height' => 40,
    ],
    [
        'name' => 'Miguel\'s',
        'sector' => 'Joyería & Relojería',
        'file' => 'miguels-relojes-dark.png',
        'height' => 44,
    ],
    [
        'name' => 'RAM Gran Auto',
        'sector' => 'Sector Automotriz',
        'file' => 'ram-gran-auto-dark.png',
        'height' => 48,
    ],
    [
        'name' => 'Dante y Nova',
        'sector' => 'Café & Panadería',
        'file' => 'dante-nova-clean.png',
        'height' => 46,
    ],
];
?>
<section class="brands-section" id="marcas" aria-label="Marcas que confían en nosotros">
  <div class="container">
    <div class="brands-header reveal">
      <div class="section-label"><span>08</span> / Confianza y trayectoria</div>
      <h2 class="brands-title">Marcas que ya <em>confían en nosotros.</em></h2>
      <p class="brands-subtitle">
        Proyectos, comercios y marcas locales y regionales que han impulsado su presencia y ventas a través de nuestra producción audiovisual.
      </p>
    </div>

    <div class="brands-grid">
      <?php foreach ($brands as $brand): ?>
        <div class="brand-card reveal">
          <div class="brand-card-logo">
            <img src="/assets/imagenes/logos/marcas/<?= e($brand['file']) ?>" 
                 alt="Logotipo de <?= e($brand['name']) ?>" 
                 style="max-height: <?= (int)$brand['height'] ?>px;" 
                 loading="lazy">
          </div>
          <div class="brand-card-details">
            <strong class="brand-card-name"><?= e($brand['name']) ?></strong>
            <span class="brand-card-sector"><?= e($brand['sector']) ?></span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
