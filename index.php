<?php
declare(strict_types=1);
/**
 * Ivan Media — one-page portfolio starter.
 * Personaliza los datos de contacto, proyectos y paquetes antes de publicar.
 */
$site = [
    'name' => 'Ivan Media',
    'eyebrow' => 'Estudio creativo · Foto · Video · Contenido',
    'whatsapp' => 'https://wa.me/526621234567', // Cambia por el WhatsApp real.
    'email' => 'hola@ivanmedia.com',             // Cambia por el correo real.
    'instagram' => 'https://instagram.com/',     // Cambia por el Instagram real.
];
$projects = [
    ['title' => 'Producto que se antoja', 'category' => 'producto', 'tag' => 'Producto', 'image' => 'photo-1542291026-7eec264c27ff', 'description' => 'Fotografía de producto con dirección de arte y color.'],
    ['title' => 'Movimiento sin límites', 'category' => 'deportivo', 'tag' => 'Ropa deportiva', 'image' => 'photo-1538805060514-97d9cc17730c', 'description' => 'Contenido dinámico para marcas que viven en movimiento.'],
    ['title' => 'Retratos con carácter', 'category' => 'retrato', 'tag' => 'Retrato', 'image' => 'photo-1534528741775-53994a69daeb', 'description' => 'Retrato editorial con una estética limpia y expresiva.'],
    ['title' => 'Detalles que venden', 'category' => 'producto', 'tag' => 'Producto', 'image' => 'photo-1523275335684-37898b6baf30', 'description' => 'Composición minimalista que pone el producto al centro.'],
    ['title' => 'Energía en cada toma', 'category' => 'deportivo', 'tag' => 'Ropa deportiva', 'image' => 'photo-1517836357463-d25dfeac3438', 'description' => 'Imágenes que transmiten esfuerzo, actitud y energía.'],
    ['title' => 'La esencia eres tú', 'category' => 'retrato', 'tag' => 'Retrato', 'image' => 'photo-1500648767791-00dcc994a43e', 'description' => 'Retratos auténticos para construir una marca personal.'],
];
function e(string $value): string { return htmlspecialchars($value, ENT_QUOTES, 'UTF-8'); }

function icon(string $name, string $extraClass = ''): string {
    $class = 'svg-icon' . ($extraClass !== '' ? ' ' . e($extraClass) : '');
    return match ($name) {
        'sparkle', 'asterisk' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.75" stroke-linecap="round" aria-hidden="true"><path d="M12 2v20M2 12h20M4.93 4.93l14.14 14.14M4.93 19.07L19.07 4.93"/></svg>',
        'arrow-up-right' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 17L17 7M7 7h10v10"/></svg>',
        'arrow-down' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 4v16m0 0l-6-6m6 6l6-6"/></svg>',
        'arrow-up' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 20V4m0 0l-6 6m6-6l6 6"/></svg>',
        'play' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M7 4.5v15a1 1 0 0 0 1.52.85l12-7.5a1 1 0 0 0 0-1.7l-12-7.5A1 1 0 0 0 7 4.5z"/></svg>',
        'close' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 6L6 18M6 6l12 12"/></svg>',
        default => '',
    };
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#021B39">
  <meta name="description" content="Ivan Media: fotografía, video y contenido visual para marcas que quieren destacar.">
  <title><?= e($site['name']) ?> — Contenido que se siente. Resultados que se notan.</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <script>document.documentElement.classList.add('js');</script>
</head>
<body>
  <div class="scroll-progress" aria-hidden="true"><span id="scrollProgress"></span></div>
  <header class="site-header" id="top">
    <a class="brand" href="#top" aria-label="Ivan Media, inicio"><span class="brand-mark">i<span>m</span></span><span><?= e($site['name']) ?><small>Visual Studio</small></span></a>
    <button class="menu-toggle" id="menuToggle" aria-expanded="false" aria-controls="mainNav" aria-label="Abrir menú"><span></span><span></span></button>
    <nav class="main-nav" id="mainNav">
      <div class="nav-links">
        <a href="#work"><span class="nav-num">01</span>Portafolio</a>
        <a href="#services"><span class="nav-num">02</span>Servicios</a>
        <a href="#about"><span class="nav-num">03</span>Estudio</a>
        <a href="#contact"><span class="nav-num">04</span>Contacto</a>
      </div>
      <div class="nav-footer">
        <a class="nav-cta" href="<?= e($site['whatsapp']) ?>" target="_blank" rel="noopener">Hablemos por WhatsApp <?= icon('arrow-up-right') ?></a>
        <div class="nav-contact-info">
          <a href="mailto:<?= e($site['email']) ?>"><?= e($site['email']) ?></a>
          <a href="<?= e($site['instagram']) ?>" target="_blank" rel="noopener">Instagram <?= icon('arrow-up-right') ?></a>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <section class="hero section-dark">
      <div class="hero-orb orb-one"></div><div class="hero-orb orb-two"></div>
      <div class="hero-grid"></div>
      <div class="hero-content">
        <p class="eyebrow"><span class="status-dot"></span><?= e($site['eyebrow']) ?></p>
        <h1>Tu marca merece<br>ser <em>imposible <br>de ignorar.</em></h1>
        <div class="hero-bottom">
          <p>Ideas con intención. Imágenes con personalidad.<br>Contenido creado para hacer que tu marca se mueva.</p>
          <a class="hero-scroll-btn" href="#work" aria-label="Explorar portafolio">
            <span>Explorar portafolio</span>
            <span class="scroll-arrow"><?= icon('arrow-down') ?></span>
          </a>
        </div>
      </div>
      <div class="hero-art" aria-label="Collage de fotografía creativa">
        <div class="art-frame art-frame-main"><img src="https://images.unsplash.com/photo-1531058020387-3be344556be6?auto=format&fit=crop&w=1000&q=85" alt="Escena de producción creativa con iluminación de estudio"></div>
        <div class="art-frame art-frame-small"><img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=600&q=85" alt="Fotografía de producto con tenis rojos"></div>
        <div class="art-sticker"><span>Creatividad<br>en movimiento</span><b><?= icon('sparkle') ?></b></div>
        <div class="art-caption">01 / Visual Storytelling</div>
      </div>
    </section>

    <section class="brand-strip" aria-label="Colaboraciones">
      <p>Ideas grandes. Marcas con visión.</p>
      <div class="brand-marquee">
        <div class="brand-track">
          <span class="brand-item" tabindex="0">Creative Minds</span>
          <i class="brand-sep"><?= icon('sparkle') ?></i>
          <span class="brand-item" tabindex="0">Local Stories</span>
          <i class="brand-sep"><?= icon('sparkle') ?></i>
          <span class="brand-item" tabindex="0">New Perspective</span>
          <i class="brand-sep"><?= icon('sparkle') ?></i>
          <span class="brand-item" tabindex="0">Built to Move</span>
        </div>
      </div>
      <small>Hemos trabajado con diferentes marcas</small>
    </section>

    <section class="intro section-light reveal" id="about">
      <div class="section-label"><span>01</span> / La idea detrás de la imagen</div>
      <div class="intro-layout">
        <h2>No hacemos contenido<br>por hacer. <span>Contamos<br>historias que conectan.</span></h2>
        <div class="intro-copy"><p>En Ivan Media convertimos ideas en contenido visual que capta miradas y despierta emociones. Unimos estrategia, fotografía y video para darle a cada marca una identidad que se sienta propia.</p><a class="text-link" href="#services">Conoce lo que hacemos <?= icon('arrow-up-right') ?></a></div>
      </div>
      <div class="metrics">
        <div><strong data-count="3">03</strong><span>Formas de crear</span></div><div><strong>∞</strong><span>Ideas por explorar</span></div><div><strong>1:1</strong><span>Enfoque personalizado</span></div>
      </div>
    </section>

    <section class="work-section" id="work">
      <div class="work-heading reveal"><div><div class="section-label"><span>02</span> / Trabajo seleccionado</div><h2>Menos scroll.<br><em>Más impacto.</em></h2></div><p>Una selección de estilos, conceptos y momentos creados para destacar en pantalla y fuera de ella.</p></div>
      <div class="filter-bar" role="group" aria-label="Filtrar proyectos">
        <button class="filter-btn is-active" data-filter="todos">Todo <span>06</span></button>
        <button class="filter-btn" data-filter="retrato">Retrato</button><button class="filter-btn" data-filter="producto">Producto</button><button class="filter-btn" data-filter="deportivo">Ropa deportiva</button>
      </div>
      <div class="project-grid" id="projectGrid">
        <?php foreach ($projects as $i => $project): ?>
        <button class="project-card reveal" data-category="<?= e($project['category']) ?>" data-title="<?= e($project['title']) ?>" data-description="<?= e($project['description']) ?>" data-image="https://images.unsplash.com/<?= e($project['image']) ?>?auto=format&fit=crop&w=1400&q=90" aria-label="Ver proyecto: <?= e($project['title']) ?>">
          <span class="project-image"><img loading="lazy" src="https://images.unsplash.com/<?= e($project['image']) ?>?auto=format&fit=crop&w=900&q=85" alt="<?= e($project['title']) ?>"><span class="project-open"><?= icon('arrow-up-right') ?></span></span>
          <span class="project-meta"><span><?= e($project['tag']) ?></span><span>0<?= $i + 1 ?></span></span><strong><?= e($project['title']) ?></strong>
        </button>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="services section-dark" id="services">
      <div class="section-label"><span>03</span> / Qué podemos crear</div>
      <div class="services-top"><h2>Contenido que<br><em>trabaja por tu marca.</em></h2><p>Una buena imagen llama la atención. Una idea bien ejecutada hace que te recuerden.</p></div>
      <div class="service-list">
        <button class="service-row" aria-expanded="false"><span class="service-number">01</span><span class="service-name">Fotografía</span><span class="service-desc">Retrato · Producto · Lifestyle</span><span class="service-plus">+</span><span class="service-detail">Construimos imágenes con intención: desde la composición y la iluminación hasta el retoque final. Ideal para catálogos, campañas, redes sociales y marca personal.</span></button>
        <button class="service-row" aria-expanded="false"><span class="service-number">02</span><span class="service-name">Video & Reels</span><span class="service-desc">Contenido corto · Promocional · Detrás de cámaras</span><span class="service-plus">+</span><span class="service-detail">Piezas con ritmo, narrativa y formato pensado para cada plataforma. Del concepto a la edición, para que tu mensaje no pase desapercibido.</span></button>
        <button class="service-row" aria-expanded="false"><span class="service-number">03</span><span class="service-name">Contenido para marcas</span><span class="service-desc">Concepto · Dirección visual · Campaña</span><span class="service-plus">+</span><span class="service-detail">Alineamos el estilo visual con la personalidad de tu marca para lograr contenido consistente, reconocible y listo para comunicar.</span></button>
      </div>
    </section>

    <section class="results reveal">
      <div class="results-copy"><div class="section-label"><span>04</span> / Generamos resultados</div><h2>Haz que tu contenido<br><em>se note.</em></h2><p>Diseñamos cada toma para comunicar mejor: una estética coherente, un mensaje claro y piezas pensadas para captar atención.</p><a class="button button-dark" href="<?= e($site['whatsapp']) ?>" target="_blank" rel="noopener">Hablemos de tu idea <?= icon('arrow-up-right') ?></a></div>
      <div class="results-visual"><div class="results-backdrop"></div><div class="reel-card reel-card-back"><img src="https://images.unsplash.com/photo-1529139574466-a303027c1d8b?auto=format&fit=crop&w=700&q=85" alt="Moda editorial en exterior"></div><div class="reel-card reel-card-front"><img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=700&q=85" alt="Reloj fotografiado como producto"><span class="play-button"><?= icon('play') ?></span></div><div class="floating-tag">Idea → Imagen → Impacto</div></div>
    </section>

    <section class="package-section">
      <div class="package-heading"><div class="section-label"><span>05</span> / Empieza con lo esencial</div><span class="package-badge">Favorito de la comunidad</span></div>
      <div class="package-card">
        <div class="package-left"><p class="eyebrow">El paquete más vendido</p><h2>Tu próximo<br><em>salto visual.</em></h2><p>Un punto de partida para mantener tu marca activa con contenido que se ve y se siente profesional.</p><div class="package-price"><span>Paquete a tu medida</span><strong>Hablemos</strong></div><a class="button button-light" href="<?= e($site['whatsapp']) ?>" target="_blank" rel="noopener">Personalizar mi paquete <?= icon('arrow-up-right') ?></a></div>
        <div class="package-right"><div class="package-includes"><span>Qué podemos incluir</span><ul><li><b>01</b> Sesión de fotografía</li><li><b>02</b> Videos verticales / reels</li><li><b>03</b> Edición y retoque</li><li><b>04</b> Entrega optimizada para redes</li></ul></div><p class="package-disclaimer">El contenido, la cantidad de entregables y la inversión se definen según las necesidades de cada proyecto.</p></div>
      </div>
    </section>

    <section class="testimonials">
      <div class="section-label"><span>06</span> / Experiencias que inspiran</div><div class="testimonial-layout"><h2>Las buenas ideas<br>se construyen <em>en equipo.</em></h2><div class="testimonial-card"><span class="quote-mark">“</span><p>Tu marca puede contar una historia que la gente quiera escuchar. Vamos a crearla.</p><div class="testimonial-author"><span class="author-avatar">Im</span><span><strong>Ivan Media</strong><small>Fotografía · Video · Contenido</small></span><span class="testimonial-count">01 / 01</span></div></div></div>
    </section>

    <section class="contact-section section-blue" id="contact">
      <div class="contact-orbit"></div><div class="section-label"><span>07</span> / El siguiente paso es tuyo</div>
      <div class="contact-content"><p class="eyebrow">¿Tienes una idea en mente?</p><h2>Vamos a hacer<br>que <em>se vea increíble.</em></h2><p>Cuéntame qué tienes en mente y encontremos la mejor forma de convertirlo en contenido.</p><a class="contact-cta" href="<?= e($site['whatsapp']) ?>" target="_blank" rel="noopener">Empezar una conversación <?= icon('arrow-up-right') ?></a></div>
      <div class="contact-footer"><a class="brand brand-footer" href="#top"><span class="brand-mark">i<span>m</span></span><span><?= e($site['name']) ?><small>Visual Studio</small></span></a><div><a href="mailto:<?= e($site['email']) ?>"><?= e($site['email']) ?></a><a href="<?= e($site['instagram']) ?>" target="_blank" rel="noopener">Instagram <?= icon('arrow-up-right') ?></a></div><span>© <?= date('Y') ?> <?= e($site['name']) ?> · Hecho para destacar</span></div>
    </section>
  </main>

  <dialog class="project-modal" id="projectModal" aria-label="Detalle del proyecto"><button class="modal-close" id="modalClose" aria-label="Cerrar proyecto"><?= icon('close') ?></button><img id="modalImage" src="" alt=""><div class="modal-info"><span>Proyecto seleccionado</span><h3 id="modalTitle"></h3><p id="modalDescription"></p></div></dialog>
  <a class="back-top" href="#top" aria-label="Volver al inicio"><?= icon('arrow-up') ?></a>
  <script src="assets/js/main.js" defer></script>
</body>
</html>
