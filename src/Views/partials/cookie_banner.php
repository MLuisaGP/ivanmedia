<?php
declare(strict_types=1);

/**
 * Cookie Consent Banner Partial
 * Displays once for first-time visitors and persists consent in localStorage.
 */
?>
<div class="cookie-banner" id="cookieBanner" role="region" aria-label="Aviso sobre tecnologías de rastreo y cookies" style="display: none;">
  <div class="cookie-banner-inner">
    <div class="cookie-banner-content">
      <div class="cookie-icon-badge" aria-hidden="true">
        <?= icon('sparkle') ?>
      </div>
      <div class="cookie-text">
        <h4 class="cookie-title">Privacidad & Tecnologías de Rastreo</h4>
        <p class="cookie-desc">
          En Ivan Media utilizamos cookies técnicas indispensables para el funcionamiento del cotizador y herramientas analíticas para optimizar tu experiencia. Al continuar navegando, aceptas su uso conforme a nuestro <a href="/aviso-de-privacidad" class="cookie-link">Aviso de Privacidad</a> y los <a href="/terminos-y-condiciones" class="cookie-link">Términos y Condiciones</a>.
        </p>
      </div>
    </div>
    <div class="cookie-banner-actions">
      <button type="button" class="btn-cookie-accept" id="btnAcceptCookies">
        <span>Aceptar y continuar</span>
        <?= icon('check') ?>
      </button>
    </div>
  </div>
</div>
