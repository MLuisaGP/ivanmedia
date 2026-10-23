<?php
declare(strict_types=1);

/**
 * Marcas que ya confían en Ivan Media Visual Studio
 * Logos con fondo transparente y logos con marco circular para imágenes con fondo opaco.
 */
$brands = [
    [
        'name' => 'Pausa Café',
        'sector' => 'Cafetería de Especialidad',
        'type' => 'transparent',
        'file' => 'pausa-cafe.png',
    ],
    [
        'name' => 'La Salsa',
        'sector' => 'Restaurante & Grill',
        'type' => 'transparent',
        'file' => 'la-salsa.png',
    ],
    [
        'name' => 'Phocas Mariscos',
        'sector' => 'Gastronomía de Mar',
        'type' => 'transparent',
        'file' => 'phocas-mariscos.png',
    ],
    [
        'name' => 'Runfit Studio',
        'sector' => 'Fitness & Rendimiento',
        'type' => 'transparent',
        'file' => 'runfit.png',
    ],
    [
        'name' => 'Super Team',
        'sector' => 'Crossfit & Deporte',
        'type' => 'transparent',
        'file' => 'super-team.png',
    ],
    [
        'name' => 'Miguel\'s',
        'sector' => 'Joyería & Relojes Finos',
        'type' => 'transparent',
        'file' => 'miguels-relojes.png',
    ],
    [
        'name' => 'Confía Legal',
        'sector' => 'Despacho Jurídico',
        'type' => 'circle',
        'file' => 'confia-legal.jpg',
    ],
    [
        'name' => 'Loftara Wellness',
        'sector' => 'Wellness & Living',
        'type' => 'circle',
        'file' => 'loftara-wellness.jpg',
    ],
    [
        'name' => 'Lora Active',
        'sector' => 'Ropa Deportiva & Moda',
        'type' => 'circle',
        'file' => 'lora-active.jpg',
    ],
    [
        'name' => 'Skin Care Ana Quihui',
        'sector' => 'Clínica Dermatológica',
        'type' => 'circle',
        'file' => 'skincare-ana-quihui.jpg',
    ],
    [
        'name' => 'RAM Gran Auto',
        'sector' => 'Sector Automotriz',
        'type' => 'circle',
        'file' => 'ram-gran-auto.png',
    ],
    [
        'name' => 'Modeloz',
        'sector' => 'Boutique & Moda',
        'type' => 'circle',
        'file' => 'modeloz.jpg',
    ],
    [
        'name' => 'Dante y Nova',
        'sector' => 'Cafetería & Panadería',
        'type' => 'circle',
        'file' => 'dante-nova.webp',
    ],
    [
        'name' => 'Climóvil',
        'sector' => 'Climatización & Servicios',
        'type' => 'circle',
        'file' => 'climovil.jpg',
    ],
];
?>
<section class="trusted-brands-section" id="marcas" aria-label="Marcas que confían en nosotros">
  <div class="container">
    <div class="trusted-brands-header reveal">
      <div class="trusted-brands-header-left">
        <div class="section-label"><span>02</span> / Confianza y trayectoria</div>
        <h2 class="trusted-brands-title">Marcas que ya confían en nosotros</h2>
      </div>
      <p class="trusted-brands-desc">
        Hemos colaborado con marcas y negocios en Hermosillo y el noroeste de México para elevar su presencia audiovisual, destacar en redes y convertir vistas en clientes reales.
      </p>
    </div>

    <!-- Tira continua animada (Marquee) -->
    <div class="trusted-brands-marquee" aria-hidden="true">
      <div class="trusted-brands-track">
        <?php for ($r = 0; $r < 2; $r++): ?>
          <?php foreach ($brands as $b): ?>
            <div class="trusted-brand-pill trusted-brand-pill--<?= $b['type'] ?>">
              <?php if ($b['type'] === 'circle'): ?>
                <span class="trusted-brand-circle">
                  <img src="/assets/imagenes/logos/marcas/<?= $b['file'] ?>" alt="<?= e($b['name']) ?>" loading="lazy">
                </span>
                <span class="trusted-brand-pill-text">
                  <strong><?= e($b['name']) ?></strong>
                  <small><?= e($b['sector']) ?></small>
                </span>
              <?php else: ?>
                <span class="trusted-brand-transparent-wrap">
                  <img src="/assets/imagenes/logos/marcas/<?= $b['file'] ?>" alt="<?= e($b['name']) ?>" class="trusted-brand-logo-img" loading="lazy">
                </span>
                <span class="trusted-brand-pill-text">
                  <strong><?= e($b['name']) ?></strong>
                  <small><?= e($b['sector']) ?></small>
                </span>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        <?php endfor; ?>
      </div>
    </div>

    <!-- Grid curado de marcas -->
    <div class="trusted-brands-grid">
      <?php foreach ($brands as $b): ?>
        <div class="trusted-brand-card reveal">
          <div class="trusted-brand-visual trusted-brand-visual--<?= $b['type'] ?>">
            <?php if ($b['type'] === 'circle'): ?>
              <div class="circle-avatar-frame">
                <img src="/assets/imagenes/logos/marcas/<?= $b['file'] ?>" alt="<?= e($b['name']) ?>" loading="lazy">
              </div>
            <?php else: ?>
              <div class="transparent-logo-frame">
                <img src="/assets/imagenes/logos/marcas/<?= $b['file'] ?>" alt="<?= e($b['name']) ?>" loading="lazy">
              </div>
            <?php endif; ?>
          </div>
          <div class="trusted-brand-meta">
            <span class="trusted-brand-badge"><?= e($b['sector']) ?></span>
            <strong class="trusted-brand-title"><?= e($b['name']) ?></strong>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
