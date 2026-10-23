<?php
declare(strict_types=1);

/**
 * @var \App\Models\SiteConfig $site
 */
?>
<section class="results reveal">
  <div class="results-copy">
    <div class="section-label"><span>05</span> / Generamos resultados</div>
    <h2>Haz que tu contenido<br><em>se note.</em></h2>
    <p>Diseñamos cada toma para comunicar mejor: una estética coherente, un mensaje claro y piezas pensadas para captar atención.</p>
    <a class="button button-dark" href="<?= e($site->whatsapp) ?>" target="_blank" rel="noopener">
      Hablemos de tu idea <?= icon('arrow-up-right') ?>
    </a>
  </div>
  <div class="results-visual">
    <div class="results-backdrop"></div>
    <div class="reel-card reel-card-back">
      <img src="https://res.cloudinary.com/dbs1ypch/image/upload/v1792719597/home/ivan%20portafolio/2-DSC02848.jpg" alt="Parrillada sonorense con cerveza artesanal" loading="lazy">
    </div>
    <div class="reel-card reel-card-front" id="reelFrontCard">
      <video class="reel-video" id="reelVideo" autoplay muted loop playsinline poster="https://res.cloudinary.com/dbs1ypch/image/upload/v1792770171/14-DSC02824.jpg" preload="metadata" aria-label="Reel audiovisual gastronómico en movimiento">
        <source src="https://res.cloudinary.com/dbs1ypch/video/upload/v1792729381/home/ivan%20portafolio/restaurante_burro_carne_chile_vertical.mp4" type="video/mp4">
        <source src="https://res.cloudinary.com/dbs1ypch/video/upload/v1792729381/home/ivan%20portafolio/restaurante_burro_carne_chile_vertical.mp4" type="video/quicktime">
      </video>
      <button class="play-button" id="reelPlayBtn" type="button" aria-label="Reproducir o pausar video"><?= icon('play') ?></button>
    </div>
    <div class="floating-tag">Idea → Imagen → Impacto</div>
  </div>
</section>
