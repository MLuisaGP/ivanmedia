<?php
declare(strict_types=1);

/**
 * @var \App\Models\SiteConfig $site
 */
?>
<section class="package-section" id="pricing">
  <div class="package-heading reveal">
    <div class="section-label"><span>07</span> / Empieza con lo esencial</div>
    <span class="package-badge">Plan comercial más solicitado</span>
  </div>

  <div class="package-card reveal">
    <!-- Columna Izquierda: Propuesta, Tarifa Mensual (Precio 2940 una sola vez) y Botón Destacado -->
    <div class="package-left">
      <div class="package-eyebrow-wrap">
        <span class="package-status-dot" aria-hidden="true"></span>
        <span class="eyebrow">El paquete más vendido</span>
      </div>

      <h2 class="package-title">
        Tu próximo<br>
        salto visual <span class="pricing-title-accent">desde:</span>
      </h2>

      <!-- Bloque de Tarifa Mensual con Animación Única -->
      <div class="package-pricing-card" id="pricingBox">
        <div class="pricing-shimmer-sweep" aria-hidden="true"></div>

        <div class="pricing-card-header">
          <span class="pricing-rate-pill">
            <span class="rate-pulse-dot" aria-hidden="true"></span>
            Tarifa mensual
          </span>
        </div>

        <div class="pricing-card-body">
          <div class="pricing-number-lockup">
            <span class="pricing-curr-sign">$</span>
            <strong class="pricing-animated-val" id="pricingSpecialPrice" data-target="2940">2,940</strong>
          </div>
          <div class="pricing-unit-lockup">
            <span class="pricing-unit-currency">MXN</span>
            <span class="pricing-unit-period">/ mes</span>
          </div>
        </div>

        <div class="pricing-card-footer">
          <p class="pricing-lead-text">
            Un punto de partida para mantener tu marca activa en redes con contenido que se ve y se siente profesional.
          </p>
        </div>
      </div>

      <!-- Botón que se note (Alta prominencia y visibilidad) -->
      <div class="package-cta-wrapper">
        <button type="button" class="btn-package-highlight btn-quote" data-open-quote aria-haspopup="dialog">
          <span class="btn-highlight-text">Personalizar mi paquete</span>
          <span class="btn-highlight-icon" aria-hidden="true"><?= icon('arrow-up-right') ?></span>
        </button>
        <span class="package-cta-note">⚡ Cotización personalizada en menos de 24 horas</span>
      </div>
    </div>

    <!-- Columna Derecha: Lo que incluye el paquete -->
    <div class="package-right">
      <div class="package-includes-top">
        <div class="includes-kicker-wrap">
          <span class="includes-sparkle" aria-hidden="true"><?= icon('sparkle') ?></span>
          <span class="includes-kicker">Producción mensual completa</span>
        </div>
        <h3 class="includes-heading">Todo lo que incluye el paquete completo:</h3>
        <p class="includes-desc">Material audiovisual y estratégico para mantener tu marca activa con tracción constante.</p>
      </div>

      <ul class="package-items-list">
        <li class="package-item">
          <b class="package-item-num">01</b>
          <div class="package-item-text">
            <div class="package-item-header">
              <strong>10 videos en formato vertical</strong>
              <span class="package-item-tag">Reels & TikTok</span>
            </div>
            <span>Grabación y edición con ritmo ágil, ganchos iniciales y narrativa para alta retención.</span>
          </div>
        </li>
        <li class="package-item">
          <b class="package-item-num">02</b>
          <div class="package-item-text">
            <div class="package-item-header">
              <strong>Paquete de fotos en formato PNG o JPG</strong>
              <span class="package-item-tag">Alta Resolución</span>
            </div>
            <span>Fotografía comercial de producto, espacio y marca listas para publicación y publicidad.</span>
          </div>
        </li>
        <li class="package-item">
          <b class="package-item-num">03</b>
          <div class="package-item-text">
            <div class="package-item-header">
              <strong>Planeación y Storyboard Completo</strong>
              <span class="package-item-tag">Preproducción PRO</span>
            </div>
            <span>Guiones visuales, referencias de estilo, calendarización y estructura antes de filmar.</span>
          </div>
        </li>
        <li class="package-item">
          <b class="package-item-num">04</b>
          <div class="package-item-text">
            <div class="package-item-header">
              <strong>12 post y/o flyers</strong>
              <span class="package-item-tag">Feed & Promociones</span>
            </div>
            <span>Diseños gráficos comerciales optimizados para promociones, carruseles y anuncios clave.</span>
          </div>
        </li>
        <li class="package-item">
          <b class="package-item-num">05</b>
          <div class="package-item-text">
            <div class="package-item-header">
              <strong>Estrategia y Gestión Mensual de Contenido</strong>
              <span class="package-item-tag">Gestión Integral</span>
            </div>
            <span>Curaduría, calendarización y seguimiento activo orientado a metas de crecimiento comercial.</span>
          </div>
        </li>
      </ul>

      <!-- Placa de Compromiso y Resultados Garantizados (3 Meses) -->
      <div class="package-guarantee-card">
        <div class="guarantee-badge-wrap">
          <span class="guarantee-badge-pill">
            <span class="guarantee-star-icon" aria-hidden="true"><?= icon('star') ?></span>
            ¡Garantizado!
          </span>
          <span class="guarantee-term">Compromiso 3 Meses</span>
        </div>
        <div class="guarantee-text">
          <p class="guarantee-claim">
            Si se obtiene el paquete completo obtendremos <strong>resultados reales en 3 meses</strong>.
          </p>
          <span class="guarantee-sub">Constancia, calidad cinematográfica y estrategia activa para impulsar tu marca.</span>
        </div>
      </div>

      <div class="package-disclaimer-wrap">
        <span class="disclaimer-dot" aria-hidden="true"></span>
        <p class="package-disclaimer">
          Producción mensual personalizada según los requerimientos y el nicho de tu negocio.
        </p>
      </div>
    </div>
  </div>
</section>
