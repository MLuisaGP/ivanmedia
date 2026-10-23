<?php
declare(strict_types=1);

/**
 * Sección de Casos de Éxito & Opiniones de Clientes (Testimonios)
 */
$testimonials = [
    [
        'quote' => 'El lanzamiento de nuestro nuevo menú fue un éxito total. Las tomas de los platillos y los videos para redes no solo se ven impecables, sino que transmiten el verdadero sabor de nuestra cocina. Las mesas estuvieron llenas desde la primera semana.',
        'author' => 'Carlos Mendoza',
        'role' => 'Fundador & Director General',
        'company' => 'La Salsa Restaurant & Grill',
        'sector' => 'Gastronomía Comercial',
        'metric' => '+180% alcance en Reels',
        'avatar' => 'CM',
        'rating' => 5,
    ],
    [
        'quote' => 'Iván tiene una sensibilidad única para captar la atmósfera, el vapor del café y la calidez del lugar. Los videos para Instagram transmiten esa vibra moderna y acogedora que invita a la gente a venir a trabajar o reunirse.',
        'author' => 'Sofía Valenzuela',
        'role' => 'Directora de Marca',
        'company' => 'Pausa Café Specialty',
        'sector' => 'Cafetería de Especialidad',
        'metric' => '+35K reproducciones orgánicas',
        'avatar' => 'SV',
        'rating' => 5,
    ],
    [
        'quote' => 'Buscábamos un lenguaje audiovisual enérgico, limpio y cinematográfico para nuestro gimnasio. El ritmo de los videos y el uso de la luz elevaron el nivel de nuestra marca a un estándar de franquicia internacional.',
        'author' => 'Roberto Garza',
        'role' => 'Head Coach & Co-fundador',
        'company' => 'Runfit Studio',
        'sector' => 'Fitness & Rendimiento',
        'metric' => '+45 nuevas membresías',
        'avatar' => 'RG',
        'rating' => 5,
    ],
    [
        'quote' => 'En el ámbito jurídico la seriedad y la confianza son primordiales. La producción fotográfica corporativa y los clips de presentación nos dieron una presencia digital sobria y de altísima credibilidad ante clientes empresariales.',
        'author' => 'Lic. Alejandro Duarte',
        'role' => 'Socio Director',
        'company' => 'Confía Legal Abogados',
        'sector' => 'Servicios Jurídicos',
        'metric' => 'Autoridad & Posicionamiento',
        'avatar' => 'AD',
        'rating' => 5,
    ],
    [
        'quote' => 'La calidad en los primeros planos de tratamientos faciales y tecnología dermatológica es impresionante. Se aprecia la textura, la pureza y el ambiente clínico de spa. Nuestros pacientes felicitan constantemente el contenido.',
        'author' => 'Dra. Ana Quihui',
        'role' => 'Médica Especialista',
        'company' => 'Skin Care Clinic',
        'sector' => 'Dermatología & Estética',
        'metric' => 'Agenda completa por 3 semanas',
        'avatar' => 'AQ',
        'rating' => 5,
    ],
    [
        'quote' => 'Fotografiar piezas de alta gama como relojes y joyería fina exige un control de reflejos y enfoque milimétrico. Iván cuidó cada detalle y brillo de las piezas con maestría artesanal. Trabajo 100% profesional.',
        'author' => 'Miguel Ángel R.',
        'role' => 'Propietario',
        'company' => 'Miguel\'s Relojería & Joyas',
        'sector' => 'Comercio & Retail',
        'metric' => 'ROI 4.2x en campaña',
        'avatar' => 'MR',
        'rating' => 5,
    ],
];
?>
<section class="testimonials-section" id="casos-exito" aria-label="Casos de éxito y opiniones de clientes">
  <div class="container">
    <div class="testimonials-header reveal">
      <div class="testimonials-header-left">
        <div class="section-label"><span>07</span> / Casos de éxito</div>
        <h2 class="testimonials-title">Historias reales. <em>Resultados</em> que transforman marcas.</h2>
      </div>
      <p class="testimonials-subtitle">
        Diseñamos contenido estratégico para resolver problemas reales: llenar restaurantes, posicionar despachos profesionales y acelerar ventas de marcas locales.
      </p>
    </div>

    <!-- Barra de métricas de confianza -->
    <div class="testimonials-stats-bar reveal">
      <div class="testi-stat-item">
        <strong class="testi-stat-number">+150</strong>
        <span class="testi-stat-label">Producciones comerciales realizadas</span>
      </div>
      <div class="testi-stat-sep" aria-hidden="true"></div>
      <div class="testi-stat-item">
        <strong class="testi-stat-number">98%</strong>
        <span class="testi-stat-label">Tasa de satisfacción y recompra</span>
      </div>
      <div class="testi-stat-sep" aria-hidden="true"></div>
      <div class="testi-stat-item">
        <strong class="testi-stat-number">4.9 ★</strong>
        <span class="testi-stat-label">Calificación promedio de clientes</span>
      </div>
      <div class="testi-stat-sep" aria-hidden="true"></div>
      <div class="testi-stat-item">
        <strong class="testi-stat-number">100%</strong>
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
