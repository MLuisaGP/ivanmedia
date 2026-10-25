<?php
declare(strict_types=1);

/**
 * Sección de Casos de Éxito & Opiniones de Clientes (Testimonios)
 */
$testimonials = [
    [
        'quote' => 'Buen día, ya comenzaron a llegar planes y clientes nuevos por el contenido. De verdad que estoy bien encantada con el resultado, te rifas machín con tu trabajo y la atención.',
        'author' => 'Diana Lucía',
        'role' => 'Dirección Creativa',
        'company' => 'Diana Lucía Studio',
        'sector' => 'Consultoría & Marcas',
        'metric' => '+140% nuevos prospectos',
        'avatar' => 'DL',
        'rating' => 5,
    ],
    [
        'quote' => 'Te rifaste mucho bro, el video y las tomas quedaron a otro nivel. Ya quiero que hagamos más cosas juntos macizo, la raza no para de preguntar por las promos en redes.',
        'author' => 'Ulises de la Torre',
        'role' => 'Head Coach & Fundador',
        'company' => 'Torre Fitness Club',
        'sector' => 'Fitness & Rendimiento',
        'metric' => '+65 nuevas membresías',
        'avatar' => 'UT',
        'rating' => 5,
    ],
    [
        'quote' => '¡Me encantó, quedó padrísimo todo! Las tomas de los montajes y la luz captaron al cien la vibra de lo que hacemos. Quedó bien suave y la gente en Instagram lo chuleó un chorro.',
        'author' => 'Estíbalis Soto',
        'role' => 'Directora de Eventos',
        'company' => 'Soto Diseño & Experiencias',
        'sector' => 'Eventos & Ambientación',
        'metric' => 'Agenda de temporada llena',
        'avatar' => 'ES',
        'rating' => 5,
    ],
    [
        'quote' => '¡A la bestia Iván, ya los vi! Me encantaron machin, ya quiero subir todo desde que me lo mandaste. Ya se lo enseñé a mi familia y les fascinó por completo. ¡Wow las fotos y el detalle clínico!',
        'author' => 'Dra. Ana Quihui',
        'role' => 'Médica Especialista',
        'company' => 'Skin Care Clinic Hermosillo',
        'sector' => 'Dermatología & Cuidado Facial',
        'metric' => 'Agenda llena por 3 semanas',
        'avatar' => 'AQ',
        'rating' => 5,
    ],
    [
        'quote' => '¡Se la rifaron macizo, casi lloro con la descripción y el video! Captaron el sazón y la tradición de nuestra cocina con una calidad que de verdad se antoja al primer segundo.',
        'author' => 'La Salsa Restaurant',
        'role' => 'Dirección General',
        'company' => 'La Salsa Restaurant & Grill',
        'sector' => 'Gastronomía Comercial',
        'metric' => '+210% alcance en Reels',
        'avatar' => 'LS',
        'rating' => 5,
    ],
    [
        'quote' => '¡Me encantó un friego, muchas gracias chingón! El ritmo de los cortes y la paleta de color quedaron con madre. Da gusto jalar con alguien que entrega al tiro y con tanta calidad.',
        'author' => 'Dante & Nova',
        'role' => 'Co-fundadores',
        'company' => 'Dante & Nova Specialty Café',
        'sector' => 'Cafetería de Especialidad',
        'metric' => '+42K vistas orgánicas',
        'avatar' => 'DN',
        'rating' => 5,
    ],
    [
        'quote' => 'Quedó requeté chingón el material, como siempre un tirazo. La atención al detalle en cada producto y el movimiento lucen de primer nivel. Nos sirve un chorro para vender en línea, ¡muchas gracias compa!',
        'author' => 'Del Modeloz',
        'role' => 'Gerencia de Marca',
        'company' => 'Del Modeloz Boutique & Calzado',
        'sector' => 'Moda & Retail Comercial',
        'metric' => 'ROI 3.9x en campañas',
        'avatar' => 'DM',
        'rating' => 5,
    ],
    [
        'quote' => '¡Ya los vi, excelente! Quedó muy chingón todo el reel y las fotos de producto. El enfoque en los acabados de las piezas y el brillo se ven de lujo total. Excelente trabajo como siempre.',
        'author' => 'Miguel\'s',
        'role' => 'Propietario & Valuador',
        'company' => 'Miguel\'s Joyas & Relojes',
        'sector' => 'Joyería & Artículos de Lujo',
        'metric' => '+55% consultas directas',
        'avatar' => 'MR',
        'rating' => 5,
    ],
    [
        'quote' => '¡Ay amo con locura! Mil mil gracias Iván, ya lo descargué y ya lo subo ahorita mismo a redes. Te la rifaste con la iluminación y los ángulos, quedó súper estético y profesional.',
        'author' => 'Valeria Field',
        'role' => 'Creadora de Contenido',
        'company' => 'Valeria Field Brand',
        'sector' => 'Moda & Lifestyle',
        'metric' => '+90K reproducciones',
        'avatar' => 'VF',
        'rating' => 5,
    ],
];
?>
<section class="testimonials-section" id="casos-exito" aria-label="Casos de éxito y opiniones de clientes">
  <div class="container">
    <div class="testimonials-header reveal">
      <div class="testimonials-header-left">
        <div class="section-label"><span>08</span> / Casos de éxito</div>
        <h2 class="testimonials-title">Historias reales. <em>Resultados</em> que transforman marcas.</h2>
      </div>
      <p class="testimonials-subtitle">
        Diseñamos contenido estratégico para resolver problemas reales: llenar restaurantes, posicionar despachos profesionales y acelerar ventas de marcas locales.
      </p>
    </div>

    <!-- Barra de métricas de confianza -->
    <div class="testimonials-stats-bar reveal">
      <div class="testi-stat-item">
        <strong class="testi-stat-number stat-counter" data-target="150" data-prefix="+">+150</strong>
        <span class="testi-stat-label">Producciones comerciales realizadas</span>
      </div>
      <div class="testi-stat-sep" aria-hidden="true"></div>
      <div class="testi-stat-item">
        <strong class="testi-stat-number stat-counter" data-target="98" data-suffix="%">98%</strong>
        <span class="testi-stat-label">Tasa de satisfacción y recompra</span>
      </div>
      <div class="testi-stat-sep" aria-hidden="true"></div>
      <div class="testi-stat-item">
        <strong class="testi-stat-number stat-counter" data-target="4.9" data-decimals="1" data-suffix=" ★">4.9 ★</strong>
        <span class="testi-stat-label">Calificación promedio de clientes</span>
      </div>
      <div class="testi-stat-sep" aria-hidden="true"></div>
      <div class="testi-stat-item">
        <strong class="testi-stat-number stat-counter" data-target="100" data-suffix="%">100%</strong>
        <span class="testi-stat-label">Calidad 4K cinematográfica garantizada</span>
      </div>
    </div>

    <!-- Cuadros de comentarios / Opiniones -->
    <div class="testimonials-grid">
      <?php foreach ($testimonials as $t): ?>
        <article class="testi-card reveal">
          <div class="testi-card-top">
            <div class="testi-stars" aria-label="Calificación 5 de 5 estrellas">
              <?php for ($i = 0; $i < $t['rating']; $i++): ?>
                <span class="testi-star" aria-hidden="true">★</span>
              <?php endfor; ?>
            </div>
            <span class="testi-metric-pill"><?= e($t['metric']) ?></span>
          </div>

          <div class="testi-quote-wrap">
            <span class="testi-quote-icon" aria-hidden="true">“</span>
            <p class="testi-quote-text"><?= e($t['quote']) ?></p>
          </div>

          <div class="testi-author-row">
            <div class="testi-avatar" aria-hidden="true">
              <?= e($t['avatar']) ?>
            </div>
            <div class="testi-author-info">
              <strong class="testi-author-name"><?= e($t['author']) ?></strong>
              <span class="testi-author-role"><?= e($t['role']) ?> · <?= e($t['company']) ?></span>
              <span class="testi-sector-tag"><?= e($t['sector']) ?></span>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
    </div>

    <!-- Banner inferior de invitación -->
    <div class="testimonials-footer-banner reveal">
      <div class="testi-banner-content">
        <h3>¿Listo para que tu marca sea el próximo caso de éxito?</h3>
        <p>Hablemos de tus metas comerciales y definamos la estrategia audiovisual ideal para tu negocio.</p>
      </div>
      <button type="button" class="testi-banner-cta btn-quote" data-open-quote aria-haspopup="dialog">
        <span>Cotizar mi producción</span>
        <span class="testi-cta-icon" aria-hidden="true"><?= icon('arrow-up-right') ?></span>
      </button>
    </div>
  </div>
</section>
