<?php
declare(strict_types=1);

use App\Repositories\NicheRepository;

/**
 * @var \App\Models\SiteConfig $site
 * @var array<string, \App\Models\Niche>|null $allNiches
 */
$niches = $allNiches ?? (new NicheRepository())->getAll();
?>
<footer class="site-footer" id="footer">
  <div class="footer-main">
    <div class="container footer-grid">
      <!-- Columna 1: Marca y Propuesta -->
      <div class="footer-col footer-col--brand">
        <a class="brand brand--footer" href="/" aria-label="<?= e($site->name) ?>, inicio">
          <span class="brand-mark">i<span>m</span></span>
          <span><?= e($site->name) ?><small>Visual Studio</small></span>
        </a>
        <p class="footer-brand-desc">
          Dirección y creación de contenido audiovisual comercial en Hermosillo, Sonora. Fotografía de alto impacto, producción de reels y estrategia visual para marcas que quieren destacar.
        </p>
        <div class="footer-status-pill">
          <span class="status-dot"></span>
          <span>Disponible para producciones comerciales</span>
        </div>
      </div>

      <!-- Columna 2: Navegación del Sitio -->
      <div class="footer-col">
        <h4 class="footer-heading">Navegación</h4>
        <ul class="footer-links">
          <li><a href="/">Inicio</a></li>
          <li><a href="/#about">Quién soy</a></li>
          <li><a href="/#work">Sectores especializados</a></li>
          <li><a href="/#services">Servicios audiovisuales</a></li>
          <li><a href="/#pricing">Paquetes de contenido</a></li>
          <li><a href="/#contact">Contacto directo</a></li>
        </ul>
      </div>

      <!-- Columna 3: Nichos Especializados -->
      <div class="footer-col">
        <h4 class="footer-heading">Sectores</h4>
        <ul class="footer-links">
          <?php foreach ($niches as $n): ?>
          <li><a href="<?= e($n->url()) ?>"><?= e($n->name) ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <!-- Columna 4: Contacto y Redes Sociales -->
      <div class="footer-col footer-col--contact">
        <h4 class="footer-heading">Contacto & Redes</h4>
        <ul class="footer-contact-list">
          <li>
            <span class="footer-contact-icon" aria-hidden="true"><?= icon('map-pin') ?></span>
            <span>Hermosillo, Sonora, México</span>
          </li>
          <li>
            <span class="footer-contact-icon" aria-hidden="true"><?= icon('mail') ?></span>
            <a href="mailto:<?= e($site->email) ?>"><?= e($site->email) ?></a>
          </li>
          <li>
            <span class="footer-contact-icon" aria-hidden="true"><?= icon('phone') ?></span>
            <a href="<?= e($site->whatsapp) ?>" target="_blank" rel="noopener">+52 (662) 123-4567</a>
          </li>
          <li class="footer-schedule">
            <span class="footer-contact-icon" aria-hidden="true"><?= icon('sparkle') ?></span>
            <span>Lunes a Sábado · 9:00 AM – 7:00 PM</span>
          </li>
        </ul>

        <div class="footer-socials">
          <span class="footer-socials-label">Síguenos en redes:</span>
          <div class="footer-social-icons">
            <a href="<?= e($site->instagram) ?>" target="_blank" rel="noopener" class="footer-social-btn" aria-label="Instagram de Ivan Media" title="Instagram">
              <?= icon('instagram') ?>
            </a>
            <a href="https://tiktok.com/@ivanmedia" target="_blank" rel="noopener" class="footer-social-btn" aria-label="TikTok de Ivan Media" title="TikTok">
              <?= icon('tiktok') ?>
            </a>
            <a href="<?= e($site->whatsapp) ?>" target="_blank" rel="noopener" class="footer-social-btn" aria-label="WhatsApp de Ivan Media" title="WhatsApp">
              <?= icon('whatsapp') ?>
            </a>
            <a href="https://youtube.com/@ivanmedia" target="_blank" rel="noopener" class="footer-social-btn" aria-label="YouTube de Ivan Media" title="YouTube">
              <?= icon('youtube') ?>
            </a>
            <a href="https://linkedin.com/in/ivanmolina" target="_blank" rel="noopener" class="footer-social-btn" aria-label="LinkedIn de Ivan Media" title="LinkedIn">
              <?= icon('linkedin') ?>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <div class="container footer-bottom-inner">
      <p class="footer-copy">
        © <?= date('Y') ?> <?= e($site->name) ?> Visual Studio · Todos los derechos reservados.
      </p>
      <p class="footer-credits">
        Fotografía comercial & Producción audiovisual · Hermosillo, Son.
      </p>
      <a href="#top" class="footer-back-top" aria-label="Volver al inicio de la página">
        <span>Volver arriba</span>
        <span class="back-top-arrow" aria-hidden="true"><?= icon('arrow-up') ?></span>
      </a>
    </div>
  </div>
</footer>
