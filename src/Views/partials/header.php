<?php
declare(strict_types=1);

/**
 * @var \App\Models\SiteConfig $site
 * @var \App\Models\Niche|null $niche
 */
$isNiche = isset($niche) && $niche !== null;
$isSub = $isNiche || !empty($isSubpage);
?>
<header class="site-header <?= $isSub ? 'site-header--solid' : '' ?>" id="top">
  <a class="brand" href="/" aria-label="<?= e($site->name) ?>, inicio">
    <img src="/assets/images/logos/ivan.Media.png" alt="<?= e($site->name) ?>" class="brand-logo" width="220" height="51">
  </a>
  <button class="menu-toggle" id="menuToggle" aria-expanded="false" aria-controls="mainNav" aria-label="Abrir menú">
    <span></span><span></span>
  </button>
  <nav class="main-nav" id="mainNav">
    <div class="nav-links">
      <?php if ($isNiche): ?>
        <a href="/"><span class="nav-num">01</span>Inicio</a>
        <a href="/#about"><span class="nav-num">02</span>Quién soy</a>
        <a href="/#services"><span class="nav-num">03</span>Servicios</a>
        <a href="/#work"><span class="nav-num">04</span>Sectores</a>
        <a href="#galeria"><span class="nav-num">05</span>Galería</a>
        <a href="/#contact"><span class="nav-num">06</span>Contacto</a>
      <?php elseif (!empty($isSubpage)): ?>
        <a href="/"><span class="nav-num">01</span>Inicio</a>
        <a href="/#about"><span class="nav-num">02</span>Quién soy</a>
        <a href="/#services"><span class="nav-num">03</span>Servicios</a>
        <a href="/#work"><span class="nav-num">04</span>Sectores</a>
        <a href="/#pricing"><span class="nav-num">05</span>Paquetes</a>
        <a href="/#contact"><span class="nav-num">06</span>Contacto</a>
      <?php else: ?>
        <a href="#about"><span class="nav-num">01</span>Quién soy</a>
        <a href="#services"><span class="nav-num">02</span>Servicios</a>
        <a href="#work"><span class="nav-num">03</span>Sectores</a>
        <a href="#contact"><span class="nav-num">04</span>Contacto</a>
      <?php endif; ?>
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
