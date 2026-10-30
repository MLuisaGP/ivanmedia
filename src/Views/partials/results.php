<?php
declare(strict_types=1);

/**
 * @var \App\Models\SiteConfig $site
 */
?>
<section class="results reveal">
  <div class="results-copy">
    <div class="section-label"><span>06</span> / Generamos resultados</div>
    <h2>Haz que tu contenido<br><em>se note.</em></h2>
    <p>Diseñamos cada toma para comunicar mejor: una estética coherente, un mensaje claro y piezas pensadas para captar atención.</p>
    <a class="button button-dark" href="<?= e($site->whatsapp) ?>" target="_blank" rel="noopener">
      Hablemos de tu idea <?= icon('arrow-up-right') ?>
    </a>
  </div>
  <div class="results-visual">
    <div class="results-phone-stage">
      <div class="results-backdrop"></div>
      <div class="reel-card reel-card-front" id="reelFrontCard">
        <video class="reel-video" id="reelVideo" autoplay muted loop playsinline poster="https://res.cloudinary.com/osmrbv2a/video/upload/f_auto,q_auto:eco,w_540,c_limit,so_1/v1793335817/negocio_vid_dorian_lounge.jpg" preload="metadata" aria-label="Reel audiovisual en movimiento - Dorian">
          <source src="https://res.cloudinary.com/osmrbv2a/video/upload/f_auto,q_auto:eco,w_540,c_limit/v1793335817/negocio_vid_dorian_lounge.mp4" type="video/mp4">
          <source src="/assets/videos/dorian.mp4" type="video/mp4">
        </video>
        <button class="play-button" id="reelPlayBtn" type="button" aria-label="Reproducir o pausar video"><?= icon('play') ?></button>
      </div>
      <div class="floating-tag">Idea → Imagen → Impacto</div>
    </div>
  </div>
</section>
