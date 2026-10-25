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
          <img src="/assets/images/logos/ivan.Media.png" alt="<?= e($site->name) ?>" class="brand-logo brand-logo--footer" width="240" height="56">
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
          <li><a href="/#services">Servicios audiovisuales</a></li>
          <li><a href="/#work">Sectores especializados</a></li>
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
            <span><?= e($site->location) ?></span>
          </li>
          <li>
            <span class="footer-contact-icon" aria-hidden="true"><?= icon('mail') ?></span>
            <a href="mailto:<?= e($site->email) ?>"><?= e($site->email) ?></a>
          </li>
          <li>
            <span class="footer-contact-icon" aria-hidden="true"><?= icon('phone') ?></span>
            <a href="<?= e($site->whatsapp) ?>" target="_blank" rel="noopener"><?= e($site->phoneFormatted) ?></a>
          </li>
          <li class="footer-schedule">
            <span class="footer-contact-icon" aria-hidden="true"><?= icon('sparkle') ?></span>
            <span><?= e($site->schedule) ?></span>
          </li>
        </ul>

        <div class="footer-socials">
          <span class="footer-socials-label">Síguenos en redes:</span>
          <div class="footer-social-icons">
            <?php if (!empty($site->instagram)): ?>
            <a href="<?= e($site->instagram) ?>" target="_blank" rel="noopener" class="footer-social-btn" aria-label="Instagram de <?= e($site->name) ?>" title="Instagram">
              <?= icon('instagram') ?>
            </a>
            <?php endif; ?>
            <?php if (!empty($site->facebook)): ?>
            <a href="<?= e($site->facebook) ?>" target="_blank" rel="noopener" class="footer-social-btn" aria-label="Facebook de <?= e($site->name) ?>" title="Facebook">
              <?= icon('facebook') ?>
            </a>
            <?php endif; ?>
            <?php if (!empty($site->x)): ?>
            <a href="<?= e($site->x) ?>" target="_blank" rel="noopener" class="footer-social-btn" aria-label="X de <?= e($site->name) ?>" title="X">
              <?= icon('x') ?>
            </a>
            <?php endif; ?>
            <?php if (!empty($site->linkedin)): ?>
            <a href="<?= e($site->linkedin) ?>" target="_blank" rel="noopener" class="footer-social-btn" aria-label="LinkedIn de <?= e($site->name) ?>" title="LinkedIn">
              <?= icon('linkedin') ?>
            </a>
            <?php endif; ?>
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
    </div>
  </div>
</footer>
