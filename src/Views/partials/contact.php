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
    <p>Cuéntame qué tienes en mente y encontremos la mejor forma de convertirlo en contenido comercial de alto impacto.</p>
    <a class="contact-cta" href="<?= e($site->whatsapp) ?>" target="_blank" rel="noopener">
      Empezar una conversación <?= icon('arrow-up-right') ?>
    </a>
  </div>
</section>
