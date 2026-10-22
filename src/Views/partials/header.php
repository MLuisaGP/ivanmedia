<?php
declare(strict_types=1);

/**
 * @var \App\Models\SiteConfig $site
 */
?>
<header class="site-header" id="top">
  <a class="brand" href="#top" aria-label="<?= e($site->name) ?>, inicio">
    <span class="brand-mark">i<span>m</span></span>
    <span><?= e($site->name) ?><small>Visual Studio</small></span>
  </a>
  <button class="menu-toggle" id="menuToggle" aria-expanded="false" aria-controls="mainNav" aria-label="Abrir menú">
    <span></span><span></span>
  </button>
  <nav class="main-nav" id="mainNav">
    <div class="nav-links">
      <a href="#about"><span class="nav-num">01</span>Quién soy</a>
      <a href="#work"><span class="nav-num">02</span>Portafolio</a>
      <a href="#services"><span class="nav-num">03</span>Servicios</a>
      <a href="#contact"><span class="nav-num">04</span>Contacto</a>
    </div>
    <div class="nav-footer">
      <a class="nav-cta" href="<?= e($site->whatsapp) ?>" target="_blank" rel="noopener">
        Hablemos por WhatsApp <?= icon('arrow-up-right') ?>
      </a>
      <div class="nav-contact-info">
        <a href="mailto:<?= e($site->email) ?>"><?= e($site->email) ?></a>
        <a href="<?= e($site->instagram) ?>" target="_blank" rel="noopener">
          Instagram <?= icon('arrow-up-right') ?>
        </a>
      </div>
    </div>
  </nav>
</header>
