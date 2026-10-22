<?php
declare(strict_types=1);

/**
 * @var \App\Models\SiteConfig $site
 */
?>
<section class="contact-section section-blue" id="contact">
  <div class="contact-orbit" aria-hidden="true"></div>
  <div class="section-label"><span>08</span> / El siguiente paso es tuyo</div>

  <div class="contact-content">
    <p class="eyebrow"><span class="status-dot"></span>¿Tienes una idea en mente?</p>
    <h2>Vamos a hacer<br>que <em>se vea increíble.</em></h2>
    <p>Cuéntame qué tienes en mente y encontremos la mejor forma de convertirlo en contenido.</p>
    <a class="contact-cta" href="<?= e($site->whatsapp) ?>" target="_blank" rel="noopener">
      Empezar una conversación <?= icon('arrow-up-right') ?>
    </a>
  </div>

  <div class="contact-footer">
    <a class="brand brand-footer" href="#top">
      <span class="brand-mark">i<span>m</span></span>
      <span><?= e($site->name) ?><small>Visual Studio</small></span>
    </a>
    <div>
      <a href="mailto:<?= e($site->email) ?>"><?= e($site->email) ?></a>
      <a href="<?= e($site->instagram) ?>" target="_blank" rel="noopener">Instagram <?= icon('arrow-up-right') ?></a>
    </div>
    <span>© <?= date('Y') ?> <?= e($site->name) ?> · Hecho para destacar</span>
  </div>
</section>
