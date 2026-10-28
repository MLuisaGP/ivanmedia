<?php
declare(strict_types=1);

/**
 * @var \App\Models\SiteConfig $site
 * @var \App\Models\Niche $niche
 * @var array<string, \App\Models\Niche> $allNiches
 */
?>

<div class="niche-detail-view">
  <!-- Hero del Nicho (Misma estética oscura, retícula y orbes que la portada) -->
  <section class="niche-hero section-dark">
    <div class="hero-grid" aria-hidden="true"></div>
    <div class="hero-orb orb-one" aria-hidden="true"></div>

    <div class="container niche-hero-inner">
      <div class="niche-hero-top reveal">
        <a href="/#work" class="niche-back-link">
          <span class="niche-back-arrow" aria-hidden="true">&larr;</span>
          <span>Volver a sectores</span>
        </a>
        <span class="niche-badge-pill"><?= e($niche->badge) ?></span>
      </div>

      <div class="niche-hero-body reveal">
        <div class="niche-hero-content">
          <div class="eyebrow">
            <span class="status-dot"></span>
            <span>Sector comercial <?= $niche->formattedOrder() ?></span>
          </div>
          <h1 class="niche-hero-heading"><?= e($niche->name) ?></h1>
          <p class="niche-hero-lead"><?= e($niche->tagline) ?></p>
          <p class="niche-hero-description"><?= e($niche->description) ?></p>

          <!-- CTA Buttons -->
          <div class="niche-hero-actions">
            <button type="button" class="btn-quote" aria-haspopup="dialog">
              <span>Realizar cotización</span>
              <span class="btn-quote-icon" aria-hidden="true"><?= icon('arrow-up-right') ?></span>
            </button>
            <a href="<?= e($site->whatsapp) ?>" target="_blank" rel="noopener" class="niche-btn-whatsapp">
              <span>Hablemos por WhatsApp</span>
              <span class="btn-quote-icon" aria-hidden="true"><?= icon('arrow-up-right') ?></span>
            </a>
          </div>
        </div>

        <?php if (!empty($niche->heroImage)): ?>
        <div class="niche-hero-visual">
          <div class="niche-hero-circle">
            <picture>
              <?php
                $webpHero = preg_replace('/\.(jpe?g|png)$/i', '.webp', $niche->heroImage);
                $docRoot = dirname(__DIR__, 3);
                if (!str_starts_with($niche->heroImage, 'http') && $webpHero !== $niche->heroImage && file_exists($docRoot . '/' . ltrim($webpHero, '/'))):
              ?>
                <source srcset="<?= e($webpHero) ?>" type="image/webp">
              <?php endif; ?>
              <img src="<?= e($niche->heroImage) ?>" alt="<?= e($niche->name) ?>" class="niche-hero-circle-img" width="340" height="340" loading="eager">
            </picture>
            <div class="niche-hero-circle-glow" aria-hidden="true"></div>
            <div class="niche-hero-circle-ring" aria-hidden="true"></div>
          </div>
        </div>
        <?php endif; ?>
      </div>

      <!-- Servicios especializados para este nicho -->
      <div class="niche-services-strip reveal" id="servicios">
        <span class="niche-services-title">Servicios clave para este nicho:</span>
        <div class="niche-services-chips">
          <?php foreach ($niche->services as $service): ?>
          <span class="niche-service-chip">
            <span class="chip-check" aria-hidden="true"><?= icon('check') ?></span>
            <span><?= e($service) ?></span>
          </span>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- Galería Estilo Pinterest (Imágenes y videos sin recortes, alturas variadas) -->
  <section class="niche-gallery-section" id="galeria">
    <div class="container">
      <div class="niche-gallery-heading reveal">
        <div class="niche-gallery-heading-main">
          <div class="section-label"><span>01</span> / Galería de producciones</div>
          <h2>Producción audiovisual.<br><em>Sin recortes, al detalle.</em></h2>
        </div>
      </div>

      <?php
        $numCols = 3;
        $itemsPerCol = (int) ceil(count($niche->gallery) / $numCols);
        $galleryColumns = array_chunk($niche->gallery, $itemsPerCol);
        while (count($galleryColumns) < $numCols) {
            $galleryColumns[] = [];
        }
      ?>
      <div class="pinterest-gallery" id="pinterestGallery">
        <?php foreach ($galleryColumns as $colIndex => $colItems): ?>
          <div class="pinterest-col" data-col="<?= $colIndex + 1 ?>">
            <?php foreach ($colItems as $item): ?>
              <?php if (($item['type'] ?? 'image') === 'video'): ?>
                <?php
                  $format = $item['format'] ?? 'vertical';
                  $badgeText = $item['badge'] ?? ($format === 'horizontal' ? 'Video 16:9' : 'Reel 9:16');
                ?>
                <div class="pin-card pin-card--video reveal" data-type="video" data-format="<?= e($format) ?>">
                  <div class="pin-media-box">
                    <?php $posterUrl = preg_replace('/\.(mp4|mov|webm)$/i', '.jpg', $item['src']); ?>
                    <video class="pin-video-player" playsinline muted loop controls preload="none" poster="<?= e($posterUrl) ?>">
                      <source src="<?= e($item['src']) ?>" type="video/mp4">
                      Tu navegador no soporta reproducción directa de video.
                    </video>
                    <span class="pin-video-badge">
                      <span class="video-indicator"></span> <?= e($badgeText) ?>
                    </span>
                  </div>
                  <div class="pin-video-meta">
                    <div class="pin-video-info">
                      <strong><?= e($item['title'] ?? 'Video comercial') ?></strong>
                      <span><?= e($item['caption'] ?? '') ?></span>
                    </div>
                    <span class="pin-format-pill"><?= $format === 'horizontal' ? '16:9 Horizontal' : '9:16 Vertical' ?></span>
                  </div>
                </div>
              <?php else: ?>
                <?php
                  $aspect = $item['aspect'] ?? 'tall';
                  $cardClasses = ['pin-card', 'pin-card--image', 'reveal'];
                  if ($aspect === 'horizontal') {
                      $cardClasses[] = 'pin-card--horizontal-crop';
                  } elseif ($aspect === 'square') {
                      $cardClasses[] = 'pin-card--square-crop';
                  } elseif ($aspect === 'medium') {
                      $cardClasses[] = 'pin-card--medium-crop';
                  }
                ?>
                <div class="<?= implode(' ', $cardClasses) ?>" data-image="<?= e($item['src']) ?>" data-title="<?= e($item['title'] ?? '') ?>" data-caption="<?= e($item['caption'] ?? '') ?>" data-aspect="<?= e($aspect) ?>">
                  <div class="pin-media-box">
                    <img loading="lazy" decoding="async" src="<?= e($item['src']) ?>" alt="<?= e($item['title'] ?? $niche->name) ?>">
                    
                    <!-- Overlay con título y descripción: visible solo en hover -->
                    <div class="pin-hover-overlay">
                      <div class="pin-hover-content">
                        <div class="pin-meta-tags">
                          <span class="pin-badge"><?= e($niche->badge) ?></span>
                        </div>
                        <strong class="pin-title"><?= e($item['title'] ?? '') ?></strong>
                        <?php if (!empty($item['caption'])): ?>
                          <span class="pin-caption"><?= e($item['caption']) ?></span>
                        <?php endif; ?>
                      </div>
                      <span class="pin-zoom-pill" aria-hidden="true"><?= icon('arrow-up-right') ?></span>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Banner de contacto inferior -->
      <div class="niche-bottom-banner reveal">
        <div class="niche-bottom-copy">
          <h3>¿Tienes un negocio en <?= e($niche->name) ?>?</h3>
          <p>Convierte la imagen de tu marca en un motor de ventas y reservas con producción audiovisual comercial de alto impacto.</p>
        </div>
        <div class="niche-bottom-actions">
          <button type="button" class="btn-quote" aria-haspopup="dialog">
            <span>Realizar cotización</span>
            <span class="btn-quote-icon" aria-hidden="true"><?= icon('arrow-up-right') ?></span>
          </button>
          <a href="<?= e($site->whatsapp) ?>" target="_blank" rel="noopener" class="niche-btn-whatsapp">
            <span>Consultar por WhatsApp</span>
            <span class="btn-quote-icon" aria-hidden="true"><?= icon('arrow-up-right') ?></span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Navegación a otros sectores -->
  <section class="other-sectors-section" id="otros-sectores">
    <div class="container">
      <div class="other-sectors-heading reveal">
        <div class="section-label"><span>02</span> / Otros nichos</div>
        <h3>Explora más sectores comerciales</h3>
      </div>
      <div class="other-sectors-grid">
        <?php foreach ($allNiches as $otherSlug => $otherNiche): ?>
          <?php if ($otherSlug !== $niche->id): ?>
          <a href="<?= e($otherNiche->url()) ?>" class="other-sector-card reveal">
            <span class="other-sector-img">
              <img loading="lazy" src="<?= e($otherNiche->coverImage) ?>" alt="<?= e($otherNiche->name) ?>" onerror="if(!this.dataset.fallback){this.dataset.fallback='1';this.src='/assets/images/sectores/<?= e($otherNiche->id) ?>.webp';}">
            </span>
            <div class="other-sector-body">
              <span class="other-sector-badge"><?= e($otherNiche->badge) ?></span>
              <strong><?= e($otherNiche->name) ?></strong>
            </div>
            <span class="other-sector-arrow" aria-hidden="true">&rarr;</span>
          </a>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</div>
