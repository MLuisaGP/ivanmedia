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
      <img src="assets/fotos/restaurant/costillas-parrillada.jpg" alt="Parrillada sonorense con cerveza artesanal" loading="lazy">
    </div>
    <div class="reel-card reel-card-front" id="reelFrontCard">
      <video class="reel-video" id="reelVideo" autoplay muted loop playsinline poster="assets/fotos/restaurant/taco-costra-queso.jpg" preload="metadata" aria-label="Reel audiovisual gastronómico en movimiento">
        <source src="assets/videos/restaurante/la-salsa-reel.mov" type="video/mp4">
        <source src="assets/videos/restaurante/la-salsa-reel.mov" type="video/quicktime">
      </video>
      <button class="play-button" id="reelPlayBtn" type="button" aria-label="Reproducir o pausar video"><?= icon('play') ?></button>
    </div>
    <div class="floating-tag">Idea → Imagen → Impacto</div>
  </div>
</section>
