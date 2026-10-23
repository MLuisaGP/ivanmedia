<?php
declare(strict_types=1);

/**
 * @var \App\Models\SiteConfig $site
 */
?>
<section class="hero section-dark">
  <div class="hero-orb orb-one"></div>
  <div class="hero-orb orb-two"></div>
  <div class="hero-grid"></div>
  <div class="hero-content">
    <p class="eyebrow"><span class="status-dot"></span><?= e($site->eyebrow) ?></p>
    <h1>Tu marca merece<br>ser <em>imposible <br>de ignorar.</em></h1>
    <div class="hero-bottom">
      <p>Ideas con intención. Imágenes con personalidad.<br>Contenido creado para hacer que tu marca se mueva.</p>
      <a class="hero-scroll-btn" href="#about" aria-label="Conoce más">
        <span>Conoce más</span>
        <span class="scroll-arrow"><?= icon('arrow-down') ?></span>
      </a>
    </div>
  </div>
  <div class="hero-art" aria-label="Collage de fotografía creativa">
    <div class="art-frame art-frame-main">
      <img src="https://res.cloudinary.com/dbs1ypch/image/upload/v1792731787/home/ivan%20portafolio/negocio_golden-hour-padel.jpg" alt="Fotografía editorial deportiva al atardecer en Hermosillo" width="1066" height="1600">
    </div>
    <div class="art-frame art-frame-small">
      <img src="https://res.cloudinary.com/dbs1ypch/image/upload/v1792769884/24-DSC04817.webp" alt="Detalle de arte matcha en las rocas" width="700" height="1200">
    </div>
    <div class="art-sticker"><span>Creatividad<br>en movimiento</span><b><?= icon('sparkle') ?></b></div>
    <div class="art-caption">01 / Visual Storytelling</div>
  </div>
</section>
