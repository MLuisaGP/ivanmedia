<?php
declare(strict_types=1);

/**
 * @var \App\Models\SiteConfig $site
 */
?>
<section class="contact-section section-blue" id="contact">
  <div class="contact-orbit" aria-hidden="true"></div>
  <div class="section-label"><span>09</span> / El siguiente paso es tuyo</div>

  <div class="contact-wrapper">
    <div class="contact-content">
      <p class="eyebrow"><span class="status-dot"></span>¿Tienes una idea en mente?</p>
      <h2>Vamos a hacer<br>que <em>se vea increíble.</em></h2>
      <p>Cuéntame qué tienes en mente y encontremos la mejor forma de convertirlo en contenido comercial de alto impacto.</p>
      <a class="contact-cta" href="<?= e($site->whatsapp) ?>" target="_blank" rel="noopener">
        Empezar una conversación <?= icon('arrow-up-right') ?>
      </a>
    </div>

    <div class="contact-visual">
      <div class="contact-portrait-card">
        <img src="assets/images/ivan-contact.png" alt="Iván Molina - Creación y Dirección Audiovisual" class="contact-portrait-img" width="397" height="397" loading="lazy">
        <div class="contact-portrait-badge">
          <span class="status-dot" aria-hidden="true"></span>
          <span>Disponible para nuevos proyectos</span>
        </div>
      </div>
    </div>
  </div>
</section>
