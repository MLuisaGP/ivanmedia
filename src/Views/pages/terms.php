<?php
declare(strict_types=1);

/**
 * @var \App\Models\SiteConfig $site
 */
?>
<div class="legal-page-wrapper">
  <!-- Legal Hero -->
  <header class="legal-hero">
    <div class="legal-hero-bg" aria-hidden="true">
      <div class="legal-orb legal-orb-1"></div>
      <div class="legal-orb legal-orb-2"></div>
      <div class="legal-grid-pattern"></div>
    </div>
    <div class="container legal-hero-content">
      <div class="eyebrow">
        <span class="status-dot"></span>
        <span>Contratación & Operación · Ivan Media</span>
      </div>
      <h1 class="legal-title">Términos y <em>Condiciones</em></h1>
      <p class="legal-subtitle">
        Bases legales, operativas y comerciales que regulan el uso de nuestro sitio web y la contratación de servicios de producción audiovisual, fotografía comercial y creación de contenido en Hermosillo, Sonora.
      </p>

      <div class="legal-meta-bar">
        <div class="legal-meta-item">
          <span class="meta-label">Última actualización:</span>
          <span class="meta-val">30 de octubre de 2026</span>
        </div>
        <div class="legal-meta-item">
          <span class="meta-label">Titular:</span>
          <span class="meta-val">Iván Molina / Ivan Media</span>
        </div>
        <div class="legal-meta-item">
          <span class="meta-label">Jurisdicción:</span>
          <span class="meta-val"><?= e($site->location) ?></span>
        </div>
        <div class="legal-meta-item">
          <span class="meta-label">Contacto:</span>
          <a href="mailto:<?= e($site->email) ?>" class="meta-link"><?= e($site->email) ?></a>
        </div>
        <div class="legal-meta-item legal-meta-item--download">
          <a href="/terminos-y-condiciones/descargar" class="btn-hero-pdf" title="Descargar Términos y Condiciones en PDF">
            <?= icon('download') ?>
            <span>Descargar PDF</span>
          </a>
        </div>
      </div>
    </div>
  </header>

  <!-- Legal Body Container -->
  <div class="container legal-container">
    <div class="legal-layout">
      <!-- Sidebar / Quick Index -->
      <aside class="legal-sidebar" aria-label="Índice de los términos">
        <div class="legal-toc-card">
          <h3 class="toc-title"><?= icon('sparkle') ?> Cláusulas principales</h3>
          <ul class="toc-list">
            <li><a href="#t-alcance">1. Información general y alcance</a></li>
            <li><a href="#t-servicios">2. Naturaleza de los servicios</a></li>
            <li><a href="#t-cotizaciones">3. Cotizaciones y propuestas</a></li>
            <li><a href="#t-pagos">4. Reservas, pagos y facturación</a></li>
            <li><a href="#t-propiedad">5. Derechos de autor y licencias</a></li>
            <li><a href="#t-obligaciones">6. Obligaciones del cliente</a></li>
            <li><a href="#t-revisiones">7. Revisiones y entrega final</a></li>
            <li><a href="#t-cancelaciones">8. Cancelación y reprogramación</a></li>
            <li><a href="#t-responsabilidad">9. Limitación de responsabilidad</a></li>
            <li><a href="#t-jurisdiccion">10. Ley aplicable y jurisdicción</a></li>
          </ul>

          <div class="toc-download-box">
            <a href="/terminos-y-condiciones/descargar" class="toc-download-btn">
              <?= icon('download') ?>
              <span>Descargar Términos en PDF</span>
            </a>
          </div>

          <div class="toc-cta-box">
            <span class="toc-cta-tag">¿Deseas cotizar?</span>
            <p>Conoce nuestros paquetes y crea una propuesta a la medida de tu marca.</p>
            <a href="/#pricing" class="toc-email-btn">
              <?= icon('sparkle') ?>
              <span>Ver paquetes de contenido</span>
            </a>
          </div>
        </div>
      </aside>

      <!-- Main Prose Content -->
      <article class="legal-prose">

        <!-- Cláusula 1 -->
        <section id="t-alcance" class="legal-section">
          <div class="section-badge">Cláusula 01</div>
          <h2>1. Información general y aceptación de términos</h2>
          <p>
            El presente documento establece las condiciones legales, comerciales y operativas que rigen el acceso y uso del sitio web <strong>Ivan Media</strong> (<a href="/" class="legal-inline-link">ivanmedia.com.mx</a>), así como la solicitud, cotización, reserva y prestación de servicios de producción de video, fotografía comercial, dirección de arte, reels y paquetes mensuales de contenido audiovisual ofrecidos por <strong>Iván Molina / Ivan Media</strong> (en adelante, el "Prestador" o "el Estudio"), con sede en <strong>Hermosillo, Sonora, México</strong>.
          </p>
          <p>
            La navegación en este sitio web, el envío de solicitudes de cotización interactiva o la contratación formal de cualquier servicio implican la <strong>aceptación expresa, voluntaria y sin reservas</strong> de los presentes Términos y Condiciones. En caso de no estar de acuerdo con cualquiera de sus disposiciones, el usuario deberá abstenerse de utilizar el sitio web o contratar los servicios.
          </p>
        </section>

        <!-- Cláusula 2 -->
        <section id="t-servicios" class="legal-section">
          <div class="section-badge">Cláusula 02</div>
          <h2>2. Naturaleza de los servicios audiovisuales</h2>
          <p>
            Ivan Media se especializa en la creación integral de contenidos audiovisuales comerciales destinados al posicionamiento de marcas, empresas y figuras públicas en medios digitales y tradicionales. Nuestras líneas de servicio comprenden:
          </p>
          <ul class="legal-checklist">
            <li><strong>Fotografía comercial y publicitaria:</strong> Producto gastronómico, instalaciones de arquitectura e interiorismo, retratos corporativos ejecutivos, moda, comercio y cobertura de eventos institucionales.</li>
            <li><strong>Producción cinematográfica de video y reels:</strong> Conceptualización, guionismo visual, rodaje en alta resolución (4K/HD), captura de sonido directo, iluminación profesional y edición vertical (9:16) y horizontal (16:9).</li>
            <li><strong>Paquetes de contenido continuo:</strong> Producción periódica calendarizada para marcas que requieren presencia activa, estética cuidada y ritmo constante en redes sociales (Instagram, TikTok, YouTube).</li>
            <li><strong>Postproducción especializada:</strong> Montaje dinámico, corrección cromática y etalonaje, diseño y masterización de sonido, rotulación y animación gráfica 2D.</li>
          </ul>
        </section>

        <!-- Cláusula 3 -->
        <section id="t-cotizaciones" class="legal-section">
          <div class="section-badge">Cláusula 03</div>
          <h2>3. Cotizaciones, estimados y propuestas comerciales</h2>
          <p>
            <strong>3.1. Carácter informativo del cotizador en línea:</strong> Los importes y dossiers generados de manera automatizada a través de las herramientas interactivas del sitio web son estimaciones preliminares sujetas a validación técnica del equipo de Ivan Media. No constituyen un contrato de prestación de servicios definitivo hasta la emisión y aceptación formal de la propuesta comercial por ambas partes.
          </p>
          <p>
            <strong>3.2. Vigencia de las cotizaciones:</strong> Las cotizaciones formales emitidas por escrito tendrán una vigencia estándar de <strong>15 (quince) días naturales</strong> contados a partir de su entrega. Concluido dicho periodo, las tarifas, disponibilidad de fechas y condiciones técnicas podrán ser revisadas o actualizadas.
          </p>
          <p>
            <strong>3.3. Requerimientos especiales y viáticos:</strong> Todo gasto extraordinario no contemplado en la propuesta inicial (tales como alquiler de locaciones exclusivas, contratación de talento o modelos externos, derechos de props/utilería especial o viáticos foráneos de traslado fuera de Hermosillo, Sonora) será presupuestado por separado y requerirá autorización previa del Cliente.
          </p>
        </section>

        <!-- Cláusula 4 -->
        <section id="t-pagos" class="legal-section">
          <div class="section-badge">Cláusula 04</div>
          <h2>4. Reservas de agenda, condiciones de pago y facturación</h2>
          <div class="legal-feature-grid">
            <div class="legal-feature-card">
              <h4>Anticipo de reserva (50%)</h4>
              <p>Para apartar y bloquear una fecha de producción en la agenda del Estudio, el Cliente deberá cubrir el <strong>50% del valor total cotizado</strong>. Las fechas no se considerarán reservadas formalmente sin dicho anticipo.</p>
            </div>
            <div class="legal-feature-card">
              <h4>Liquidación del saldo (50%)</h4>
              <p>El 50% restante deberá liquidarse en su totalidad a la conclusión del rodaje o con carácter previo e indispensable a la entrega de los archivos finales en alta resolución sin marcas de agua.</p>
            </div>
          </div>
          <p>
            <strong>4.1. Moneda:</strong> Todas las tarifas y presupuestos se expresan en Pesos Mexicanos (MXN). En caso de clientes foráneos o cotizaciones en dólares estadounidenses (USD), se fijará el tipo de cambio oficial correspondiente a la fecha de emisión.
          </p>
          <p>
            <strong>4.2. Facturación Fiscal (CFDI):</strong> Los precios cotizados no incluyen IVA salvo indicación expresa. En caso de requerir factura electrónica con validez fiscal en México, el Cliente deberá facilitar oportunamente su Constancia de Situación Fiscal actualizada y cubrir el Impuesto al Valor Agregado conforme a la ley.
          </p>
        </section>

        <!-- Cláusula 5 -->
        <section id="t-propiedad" class="legal-section">
          <div class="section-badge">Cláusula 05</div>
          <h2>5. Derechos de autor, propiedad intelectual y licencias</h2>
          <p>
            En apego irrestricto a la <strong>Ley Federal del Derecho de Autor (LFDA)</strong> vigente en los Estados Unidos Mexicanos, los derechos sobre las obras se rigen bajo los siguientes lineamientos:
          </p>

          <div class="legal-callout legal-callout--important">
            <div class="callout-icon"><?= icon('sparkle') ?></div>
            <div class="callout-body">
              <strong>Derechos Morales de Autor:</strong>
              <p>La autoría moral sobre las creaciones fotográficas y audiovisuales corresponde de forma personal, perpetua, inalienable e irrenunciable a <strong>Iván Molina / Ivan Media</strong>, conservando en todo momento el derecho al reconocimiento de su crédito de autoría.</p>
            </div>
          </div>

          <p>
            <strong>5.1. Licencia de Explotación Comercial al Cliente:</strong> Una vez liquidado el 100% de los honorarios pactados, Ivan Media otorga al Cliente una <strong>licencia de uso comercial no exclusiva, transferible internamente a su marca y de vigencia indeterminada</strong> para publicar, exhibir, reproducir y publicitar las piezas finales entregadas en sus canales propios (sitio web, perfiles oficiales de redes sociales, anuncios pagados y pantallas en sucursales).
          </p>
          <p>
            <strong>5.2. Archivos en bruto (RAW) y proyectos de edición:</strong> Los paquetes estándar contemplan la entrega exclusiva de productos audiovisuales finalizados y optimizados (.MP4, .MOV, .JPG). El material sin procesar (*RAW/footage en bruto*) y los proyectos fuente de software de postproducción (Premiere, DaVinci, Lightroom) son archivos de trabajo interno y propiedad intelectual del Estudio; no se encuentran incluidos en los servicios estándar y su transferencia solo procederá mediante cotización adicional expresa.
          </p>
          <p>
            <strong>5.3. Derecho de Portafolio y Exhibición (*Showreel*):</strong> Ivan Media tiene el derecho legítimo de incluir fragmentos, videos y fotografías terminadas en su portafolio profesional, sitio web y redes sociales (<code>@_ivan.media</code>) con fines de muestra de calidad profesional. Si una producción contiene información sensible o forma parte de un lanzamiento bajo embargo temporal, el Cliente deberá avisar previamente para acordar la fecha permitida de exhibición.
          </p>
        </section>

        <!-- Cláusula 6 -->
        <section id="t-obligaciones" class="legal-section">
          <div class="section-badge">Cláusula 06</div>
          <h2>6. Obligaciones y colaboración del cliente</h2>
          <p>Para la correcta ejecución del plan de rodaje o sesión fotográfica, el Cliente asume las siguientes responsabilidades:</p>
          <ul class="legal-checklist">
            <li><strong>Facilitar activos de marca:</strong> Proveer oportunamente logotipos vectoriales, paletas cromáticas, lineamientos visuales y materiales que deban incluirse en la producción.</li>
            <li><strong>Gestión de locaciones y permisos:</strong> Tramitar y cubrir cualquier permiso, acceso o tarifa de grabación en inmuebles privados, restaurantes o espacios restringidos.</li>
            <li><strong>Autorizaciones de imagen personal:</strong> Es responsabilidad exclusiva del Cliente recabar el consentimiento de uso de imagen de sus empleados, colaboradores o modelos que aparezcan a cuadro en la filmación, deslindando a Ivan Media de reclamos de terceros al respecto.</li>
            <li><strong>Puntualidad en llamados:</strong> Presentarse y tener acondicionada la locación a la hora acordada. Retrasos imputables al Cliente superiores a 30 minutos se descontarán del tiempo de rodaje pactado o generarán costos adicionales por hora de producción.</li>
          </ul>
        </section>

        <!-- Cláusula 7 -->
        <section id="t-revisiones" class="legal-section">
          <div class="section-badge">Cláusula 07</div>
          <h2>7. Proceso de revisiones, ajustes y entrega final</h2>
          <p>
            <strong>7.1. Rondas de cambios incluidas:</strong> Cada entrega de video o fotografía incluye <strong>hasta 2 (dos) rondas de ajustes menores</strong> sobre el corte preliminar enviado (ej. ritmo de corte, reemplazo de tomas alternas grabadas en la sesión, ajuste tipográfico o balance de música).
          </p>
          <p>
            <strong>7.2. Plazo para emitir retroalimentación:</strong> El Cliente dispone de un plazo de <strong>5 (cinco) días hábiles</strong> posteriores a la recepción de la versión preliminar para concentrar sus comentarios en un solo documento o comunicación por escrito. Transcurrido dicho plazo sin respuesta, el material se entenderá como aprobado a entera conformidad.
          </p>
          <p>
            <strong>7.3. Cambios estructurales fuera de alcance:</strong> Las solicitudes de cambios sustanciales que contradigan el concepto o guion previamente aprobado, regrabaciones por causas no imputables al Estudio o modificaciones solicitadas con posterioridad a la entrega final aprobada, se cotizarán como servicios extraordinarios independientes.
          </p>
          <p>
            <strong>7.4. Resguardo de archivos:</strong> Ivan Media garantiza la conservación del material final en sus servidores durante un periodo de <strong>60 (sesenta) días naturales</strong> contados a partir de su entrega. Es responsabilidad del Cliente descargar y respaldar su material de manera definitiva.
          </p>
        </section>

        <!-- Cláusula 8: Tarjetas de Cancelación y Reprogramación Rediseñadas -->
        <section id="t-cancelaciones" class="legal-section">
          <div class="section-badge">Cláusula 08</div>
          <h2>8. Política de cancelaciones, reprogramación y fuerza mayor</h2>
          <p>
            Para garantizar la exclusividad técnica y el compromiso del equipo humano reservado para tu rodaje, las modificaciones de calendario se rigen bajo los siguientes plazos y condiciones:
          </p>

          <div class="policy-cards-grid">
            <div class="policy-card policy-card--success">
              <div class="policy-badge-wrap">
                <span class="policy-badge policy-badge--success">+72 Horas</span>
                <span class="policy-indicator policy-indicator--success">Sin penalización</span>
              </div>
              <h4>Reprogramación oportuna</h4>
              <p>Puedes cambiar la fecha de filmación o sesión fotográfica sin recargo alguno, notificando con al menos 72 horas de anticipación. Sujeto a disponibilidad de agenda.</p>
            </div>

            <div class="policy-card policy-card--danger">
              <div class="policy-badge-wrap">
                <span class="policy-badge policy-badge--danger">&lt; 48 Horas</span>
                <span class="policy-indicator policy-indicator--danger">Anticipo retenido</span>
              </div>
              <h4>Aviso tardío</h4>
              <p>Avisos con menos de 48 horas conllevan la retención del anticipo como compensación por el bloqueo exclusivo de fecha, preparación de equipo y pérdida de oportunidad con otros clientes.</p>
            </div>

            <div class="policy-card policy-card--warning">
              <div class="policy-badge-wrap">
                <span class="policy-badge policy-badge--warning">Mismo día</span>
                <span class="policy-indicator policy-indicator--warning">50% reposición</span>
              </div>
              <h4>Cancelación en locación</h4>
              <p>Si la locación está inaccesible o el cliente cancela en sitio el mismo día del llamado, se deberá cubrir el 50% del valor de un nuevo llamado para reprogramar la producción.</p>
            </div>

            <div class="policy-card policy-card--info">
              <div class="policy-badge-wrap">
                <span class="policy-badge policy-badge--info">Fuerza mayor</span>
                <span class="policy-indicator policy-indicator--info">Reagendado libre</span>
              </div>
              <h4>Clima y contingencias</h4>
              <p>Lluvia intensa o condiciones meteorológicas adversas en exteriores, así como emergencias acreditables, se reprogramarán de común acuerdo sin penalización económica.</p>
            </div>
          </div>
        </section>

        <!-- Cláusula 9 -->
        <section id="t-responsabilidad" class="legal-section">
          <div class="section-badge">Cláusula 09</div>
          <h2>9. Limitación de responsabilidad</h2>
          <p>
            <strong>9.1. Garantía técnica y creativa:</strong> Ivan Media responderá por la ejecución técnica impecable del proyecto conforme a los estándares de su portafolio y los requerimientos aprobados en la cotización.
          </p>
          <p>
            <strong>9.2. No garantía sobre metas de venta o viralidad:</strong> Ivan Media <strong>no garantiza ni responderá por el volumen de ventas, retorno de inversión financiero específico, número de vistas, seguidores o viralidad</strong> que el contenido obtenga en plataformas digitales, toda vez que dichos factores dependen enteramente del producto del Cliente, algoritmos de terceros, estacionalidad del mercado y montos de pauta publicitaria invertida.
          </p>
        </section>

        <!-- Cláusula 10 -->
        <section id="t-jurisdiccion" class="legal-section">
          <div class="section-badge">Cláusula 10</div>
          <h2>10. Legislación aplicable y jurisdicción competente</h2>
          <p>
            Para la interpretación, cumplimiento y resolución de controversias derivadas de estos Términos y Condiciones o de la prestación de servicios contratados, las partes se someten de manera expresa e irrevocable a las leyes federales de los <strong>Estados Unidos Mexicanos</strong> y a la jurisdicción exclusiva de los <strong>Tribunales Civiles competentes de la ciudad de Hermosillo, Sonora</strong>, renunciando expresamente a cualquier otro fuero que pudiera corresponderles por razón de sus domicilios presentes o futuros.
          </p>
        </section>

        <!-- Sección de Contacto: Recuadro Azul -->
        <section class="legal-section legal-contact-box">
          <div class="contact-box-inner">
            <div class="contact-box-header">
              <span class="status-dot"></span>
              <h3>¿Tienes dudas sobre los términos de contratación?</h3>
            </div>
            <p>
              Estamos listos para orientarte y resolver cualquier inquietud antes de dar inicio a tu producción audiovisual:
            </p>
            <div class="contact-box-grid">
              <div class="contact-box-pill">
                <span class="pill-label">Estudio:</span>
                <strong>Iván Molina · Ivan Media</strong>
              </div>
              <div class="contact-box-pill">
                <span class="pill-label">Correo directo:</span>
                <a href="mailto:<?= e($site->email) ?>"><?= e($site->email) ?></a>
              </div>
              <div class="contact-box-pill">
                <span class="pill-label">WhatsApp:</span>
                <a href="<?= e($site->whatsapp) ?>" target="_blank" rel="noopener"><?= e($site->phoneFormatted) ?></a>
              </div>
              <div class="contact-box-pill">
                <span class="pill-label">Sede:</span>
                <strong><?= e($site->location) ?></strong>
              </div>
            </div>

            <!-- Botones de Acción con Padding Espacioso y Botón PDF -->
            <div class="contact-box-actions">
              <a href="/" class="btn-legal-back">
                <?= icon('arrow-left') ?>
                <span>Volver a la página principal</span>
              </a>
              <a href="/terminos-y-condiciones/descargar" class="btn-legal-download">
                <?= icon('download') ?>
                <span>Descargar Términos en PDF</span>
              </a>
              <a href="/aviso-de-privacidad" class="btn-legal-sec">
                <span>Consultar Aviso de Privacidad</span>
                <?= icon('arrow-right') ?>
              </a>
            </div>
          </div>
        </section>

      </article>
    </div>
  </div>
</div>
