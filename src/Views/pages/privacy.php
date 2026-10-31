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
        <span>Marco Normativo LFPDPPP · Ivan Media</span>
      </div>
      <h1 class="legal-title">Aviso de Privacidad <em>Integral</em></h1>
      <p class="legal-subtitle">
        En Ivan Media protegemos la confidencialidad de tu información comercial y personal con estricto apego a la legislación mexicana. Conoce cómo recabamos, utilizamos y resguardamos tus datos.
      </p>

      <div class="legal-meta-bar">
        <div class="legal-meta-item">
          <span class="meta-label">Última actualización:</span>
          <span class="meta-val">30 de octubre de 2026</span>
        </div>
        <div class="legal-meta-item">
          <span class="meta-label">Responsable:</span>
          <span class="meta-val">Iván Molina / Ivan Media</span>
        </div>
        <div class="legal-meta-item">
          <span class="meta-label">Ubicación:</span>
          <span class="meta-val"><?= e($site->location) ?></span>
        </div>
        <div class="legal-meta-item">
          <span class="meta-label">Atención ARCO:</span>
          <a href="mailto:<?= e($site->email) ?>?subject=Solicitud%20de%20Derechos%20ARCO" class="meta-link"><?= e($site->email) ?></a>
        </div>
        <div class="legal-meta-item legal-meta-item--download">
          <a href="/aviso-de-privacidad/descargar" class="btn-hero-pdf" title="Descargar Aviso de Privacidad en PDF">
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
      <aside class="legal-sidebar" aria-label="Índice del documento">
        <div class="legal-toc-card">
          <h3 class="toc-title"><?= icon('sparkle') ?> Índice de contenido</h3>
          <ul class="toc-list">
            <li><a href="#responsable">1. Responsable del tratamiento</a></li>
            <li><a href="#datos-recabados">2. Datos personales que recabamos</a></li>
            <li><a href="#finalidades">3. Finalidades del tratamiento</a></li>
            <li><a href="#transferencias">4. Transferencia de datos</a></li>
            <li><a href="#derechos-arco">5. Ejercicio de Derechos ARCO</a></li>
            <li><a href="#revocacion">6. Revocación del consentimiento</a></li>
            <li><a href="#cookies">7. Uso de cookies y rastreo</a></li>
            <li><a href="#seguridad">8. Medidas de seguridad</a></li>
            <li><a href="#modificaciones">9. Cambios a este aviso</a></li>
            <li><a href="#contacto-legal">10. Contacto y dudas</a></li>
          </ul>

          <div class="toc-download-box">
            <a href="/aviso-de-privacidad/descargar" class="toc-download-btn">
              <?= icon('download') ?>
              <span>Descargar Aviso en PDF</span>
            </a>
          </div>

          <div class="toc-cta-box">
            <span class="toc-cta-tag">¿Dudas de privacidad?</span>
            <p>Escríbenos directamente y atenderemos tu solicitud sin costo.</p>
            <a href="mailto:<?= e($site->email) ?>?subject=Consulta%20sobre%20Privacidad" class="toc-email-btn">
              <?= icon('mail') ?>
              <span>Contactar al estudio</span>
            </a>
          </div>
        </div>
      </aside>

      <!-- Main Prose Content -->
      <article class="legal-prose">

        <!-- Sección 1 -->
        <section id="responsable" class="legal-section">
          <div class="section-badge">Apartado 01</div>
          <h2>1. Identidad y domicilio del Responsable</h2>
          <p>
            <strong>Ivan Media</strong> (en lo sucesivo denominado indistintamente como "Ivan Media", "el Estudio" o "el Responsable"), bajo la titularidad y dirección operativa de <strong>Iván Molina</strong>, con domicilio en la ciudad de <strong>Hermosillo, Sonora, México</strong>, en estricto cumplimiento con lo dispuesto por la <strong>Ley Federal de Protección de Datos Personales en Posesión de los Particulares (LFPDPPP)</strong>, su Reglamento y los Lineamientos del Aviso de Privacidad emitidos por el Instituto Nacional de Transparencia, Acceso a la Información y Protección de Datos Personales (INAI), pone a disposición de sus clientes, prospectos y visitantes el presente <strong>Aviso de Privacidad Integral</strong>.
          </p>
          <p>
            El presente documento tiene por finalidad informarte con total transparencia las características, alcance y condiciones del tratamiento al que serán sometidos los datos personales que proporciones al navegar en nuestro sitio web, completar cotizaciones digitales, contactarnos por mensajería instantánea o contratar nuestros servicios de producción audiovisual y fotografía comercial.
          </p>
        </section>

        <!-- Sección 2 -->
        <section id="datos-recabados" class="legal-section">
          <div class="section-badge">Apartado 02</div>
          <h2>2. Datos personales que recabamos</h2>
          <p>
            Para brindar una atención personalizada, cotizar con precisión técnica y llevar a cabo las producciones contratadas, Ivan Media podrá recabar las siguientes categorías de información:
          </p>

          <div class="legal-feature-grid">
            <div class="legal-feature-card">
              <h4>A. Datos de identificación y contacto</h4>
              <ul>
                <li>Nombre completo de la persona de contacto o representante.</li>
                <li>Nombre comercial de la marca, empresa o proyecto.</li>
                <li>Correo electrónico de contacto y seguimiento.</li>
                <li>Número de teléfono móvil o WhatsApp para coordinación directa.</li>
                <li>Ubicación geográfica (ciudad, estado) del negocio o locación.</li>
              </ul>
            </div>

            <div class="legal-feature-card">
              <h4>B. Información de proyecto y cotización</h4>
              <ul>
                <li>Sector comercial o nicho (gastronomía, arquitectura, marcas personales, corporativo, etc.).</li>
                <li>Objetivos de marketing, canales de difusión y audiencia objetivo.</li>
                <li>Formato de contenido requerido (reels, fotografía, paquetes mensuales).</li>
                <li>Rango de inversión presupuestal estimada.</li>
                <li>Expectativas y notas particulares para la producción.</li>
              </ul>
            </div>

            <div class="legal-feature-card">
              <h4>C. Material audiovisual de producción</h4>
              <ul>
                <li>Fotografías e imágenes fijas capturadas durante las sesiones.</li>
                <li>Tomas de video cinematográficas de colaboradores, productos e instalaciones.</li>
                <li>Grabaciones de audio ambiental, diálogos o testimoniales autorizados.</li>
              </ul>
            </div>

            <div class="legal-feature-card">
              <h4>D. Datos técnicos y de navegación</h4>
              <ul>
                <li>Dirección IP (anonimizada para métricas del servidor).</li>
                <li>Navegador web, sistema operativo y tipo de dispositivo.</li>
                <li>Páginas visitadas, tiempo de permanencia y flujo de cotizador.</li>
              </ul>
            </div>
          </div>

          <div class="legal-callout legal-callout--important">
            <div class="callout-icon"><?= icon('sparkle') ?></div>
            <div class="callout-body">
              <strong>Compromiso sobre Datos Personales Sensibles:</strong>
              <p>Ivan Media <strong>no solicita ni trata en ningún momento datos personales sensibles</strong> (tales como origen étnico, estado de salud, ideología política, religión, creencias morales o preferencias sexuales). Te pedimos abstenerte de compartir datos de dicha naturaleza en cualquiera de nuestros canales.</p>
            </div>
          </div>
        </section>

        <!-- Sección 3 -->
        <section id="finalidades" class="legal-section">
          <div class="section-badge">Apartado 03</div>
          <h2>3. Finalidades del tratamiento de los datos</h2>
          <p>
            Los datos personales que recopilamos son tratados bajo los principios de licitud, consentimiento, información, calidad, finalidad, lealtad, proporcionalidad y responsabilidad contemplados en la LFPDPPP, conforme a las siguientes finalidades:
          </p>

          <h3>3.1. Finalidades Primarias (necesarias para la prestación del servicio)</h3>
          <ul class="legal-checklist">
            <li><strong>Atención y seguimiento oportuno:</strong> Responder a solicitudes de contacto, cotizaciones en línea, mensajes de correo y chats de WhatsApp.</li>
            <li><strong>Elaboración de propuestas y dossiers:</strong> Generar diagnósticos técnicos de producción audiovisual, paquetes a la medida y cotizaciones formales descargables.</li>
            <li><strong>Planeación y logística de rodaje:</strong> Coordinar agendas de llamado, scouting de locaciones en Hermosillo y requerimientos técnicos de iluminación, cámaras y audio.</li>
            <li><strong>Ejecución y postproducción audiovisual:</strong> Realizar las jornadas de filmación, sesiones fotográficas, edición dinámica, corrección de color y diseño sonoro.</li>
            <li><strong>Entrega formal de material:</strong> Facilitar el acceso y descarga segura de los archivos de video e imagen finalizados en alta resolución.</li>
            <li><strong>Gestión contable y fiscal:</strong> Emisión de facturas electrónicas (CFDI) conforme a las disposiciones del SAT y control administrativo de cobranza.</li>
          </ul>

          <h3>3.2. Finalidades Secundarias (no indispensables para la relación jurídica principal)</h3>
          <ul class="legal-checklist">
            <li><strong>Exhibición en portafolio y redes sociales:</strong> Difusión de fragmentos audiovisuales, reels, fotografías finales y mención de marca en el portafolio profesional, sitio web y canales oficiales de Ivan Media (<code>@_ivan.media</code>) como testimonio de calidad artística.</li>
            <li><strong>Comunicaciones de cortesía y novedades:</strong> Notificación de nuevos servicios, promociones de temporada para producción o encuestas de satisfacción.</li>
          </ul>

          <div class="legal-callout">
            <div class="callout-icon"><?= icon('check') ?></div>
            <div class="callout-body">
              <strong>¿Deseas negarte al tratamiento para finalidades secundarias?</strong>
              <p>Puedes manifestar tu negativa en cualquier momento enviando un correo electrónico a <strong><?= e($site->email) ?></strong> indicando tu nombre y marca. Tu negativa para estas finalidades accesorias no afectará bajo ninguna circunstancia la cotización o prestación de nuestros servicios principales.</p>
            </div>
          </div>
        </section>

        <!-- Sección 4 -->
        <section id="transferencias" class="legal-section">
          <div class="section-badge">Apartado 04</div>
          <h2>4. Transferencia de datos personales</h2>
          <p>
            Ivan Media <strong>no comercializa, no renta y no transfiere tus datos personales a terceros</strong> para actividades publicitarias ajenas o con fines de lucro.
          </p>
          <p>
            Tus datos únicamente podrán ser transferidos sin necesidad de consentimiento expreso en los supuestos previstos en el <strong>Artículo 37 de la LFPDPPP</strong>, que incluyen:
          </p>
          <ul>
            <li><strong>Proveedores de tecnología indispensables:</strong> Plataformas de hosting de servidores web, servicios de entrega de correo SMTP transaccional y nubes de almacenamiento seguro (ej. Google Drive, Dropbox) contratadas exclusivamente para alojar y compartir los entregables audiovisuales bajo cláusulas estrictas de confidencialidad.</li>
            <li><strong>Autoridades competentes:</strong> Cuando sea legalmente requerido mediante mandato debidamente fundado y motivado por autoridades fiscales, administrativas o judiciales mexicanas.</li>
          </ul>
        </section>

        <!-- Sección 5 -->
        <section id="derechos-arco" class="legal-section">
          <div class="section-badge">Apartado 05</div>
          <h2>5. Mecanismo para el ejercicio de los Derechos ARCO</h2>
          <p>
            De conformidad con la LFPDPPP, tú o tu representante legal debidamente acreditado tienen derecho de <strong>Acceso, Rectificación, Cancelación y Oposición (Derechos ARCO)</strong> respecto a los datos personales que conservamos en nuestros registros:
          </p>

          <div class="arco-cards-grid">
            <div class="arco-card">
              <span class="arco-letter">A</span>
              <h4>Acceso</h4>
              <p>Conocer qué datos personales tuyos poseemos, su origen y el tratamiento que les damos.</p>
            </div>
            <div class="arco-card">
              <span class="arco-letter">R</span>
              <h4>Rectificación</h4>
              <p>Solicitar la corrección o actualización de datos inexactos, erróneos o incompletos.</p>
            </div>
            <div class="arco-card">
              <span class="arco-letter">C</span>
              <h4>Cancelación</h4>
              <p>Pedir que eliminemos tus datos cuando consideres que ya no son necesarios o no se apegan a la ley.</p>
            </div>
            <div class="arco-card">
              <span class="arco-letter">O</span>
              <h4>Oposición</h4>
              <p>Oponerte al tratamiento de tus datos para fines específicos o secundarios.</p>
            </div>
          </div>

          <h3>Procedimiento para formular una solicitud ARCO:</h3>
          <ol class="legal-steps-list">
            <li>
              <strong>Envío de la solicitud:</strong> Redacta un correo electrónico dirigido a <strong><?= e($site->email) ?></strong> con el asunto: <em>"Solicitud de Derechos ARCO - [Tu Nombre o Marca]"</em>.
            </li>
            <li>
              <strong>Documentación requerida:</strong>
              <ul>
                <li>Nombre completo del titular y medio de contacto para recibir respuesta (correo electrónico o teléfono).</li>
                <li>Copia digital legible de identificación oficial vigente (INE o Pasaporte) para acreditar tu identidad, o instrumento legal correspondiente en caso de actuar mediante apoderado.</li>
                <li>Descripción clara y puntual de los datos sobre los que deseas ejercer el derecho ARCO y el derecho concreto que pretendes hacer valer.</li>
              </ul>
            </li>
            <li>
              <strong>Plazos de respuesta:</strong> Ivan Media responderá a tu solicitud en un plazo máximo de <strong>20 (veinte) días hábiles</strong> contados a partir de su recepción. De resultar procedente, se hará efectiva en un plazo no mayor a <strong>15 (quince) días hábiles</strong> siguientes a la notificación. El procedimiento es completamente gratuito.
            </li>
          </ol>
        </section>

        <!-- Sección 6 -->
        <section id="revocacion" class="legal-section">
          <div class="section-badge">Apartado 06</div>
          <h2>6. Revocación del consentimiento y limitación de divulgación</h2>
          <p>
            Puedes revocar en cualquier momento el consentimiento que nos hayas otorgado para el tratamiento de tus datos o solicitar la limitación de su uso. Ten en cuenta que si la revocación involucra información indispensable para una producción en curso o exigida por la normatividad fiscal aplicable (como la emisión de comprobantes fiscales), la cancelación definitiva se efectuará una vez concluidas las obligaciones legales vigentes.
          </p>
          <p>
            Para realizar esta solicitud, basta con remitir un correo electrónico a <strong><?= e($site->email) ?></strong> con tu requerimiento explícito.
          </p>
        </section>

        <!-- Sección 7 -->
        <section id="cookies" class="legal-section">
          <div class="section-badge">Apartado 07</div>
          <h2>7. Uso de cookies y tecnologías de rastreo</h2>
          <p>
            Este sitio web utiliza cookies técnicas y herramientas de almacenamiento local para garantizar la funcionalidad del cotizador en varios pasos, recordar preferencias de navegación y optimizar el rendimiento visual de los elementos interactivos.
          </p>
          <p>
            Puedes deshabilitar o borrar las cookies en cualquier momento a través de la configuración de tu navegador (Chrome, Safari, Firefox o Edge). Considera que al desactivar ciertas cookies técnicas, algunas funcionalidades interactivas (como el guardado del borrador de cotización) podrían requerir recargar la página.
          </p>
        </section>

        <!-- Sección 8 -->
        <section id="seguridad" class="legal-section">
          <div class="section-badge">Apartado 08</div>
          <h2>8. Medidas de seguridad y resguardo de la información</h2>
          <p>
            Ivan Media aplica rigurosas medidas de seguridad técnicas, administrativas y físicas para proteger tus datos personales y activos audiovisuales contra pérdida, alteración, robo, destrucción o accesos no autorizados:
          </p>
          <ul>
            <li><strong>Cifrado SSL / HTTPS:</strong> Toda la transmisión de datos entre tu navegador y nuestro servidor viaja encriptada.</li>
            <li><strong>Control de accesos y credenciales seguras:</strong> El acceso a los sistemas de cotización, correos y repositorios de contenido está restringido a personal autorizado y protegido con autenticación robusta.</li>
            <li><strong>Protocolos de confidencialidad:</strong> Los miembros del equipo técnico y creativo de Ivan Media suscriben compromisos de discreción sobre las grabaciones comerciales y secretos de campaña de nuestros clientes.</li>
          </ul>
        </section>

        <!-- Sección 9 -->
        <section id="modificaciones" class="legal-section">
          <div class="section-badge">Apartado 09</div>
          <h2>9. Modificaciones y actualizaciones al Aviso de Privacidad</h2>
          <p>
            El presente Aviso de Privacidad puede actualizarse periódicamente para reflejar mejoras en nuestros servicios, adaptaciones a reformas normativas o cambios en nuestras políticas internas.
          </p>
          <p>
            Cualquier modificación sustancial será publicada en esta misma dirección web:  
            <a href="/aviso-de-privacidad" class="legal-inline-link"><strong>https://ivanmedia.com.mx/aviso-de-privacidad</strong></a>, indicando en el encabezado la fecha de la última revisión.
          </p>
        </section>

        <!-- Sección 10: Recuadro Azul de Contacto -->
        <section id="contacto-legal" class="legal-section legal-contact-box">
          <div class="contact-box-inner">
            <div class="contact-box-header">
              <span class="status-dot"></span>
              <h3>10. Contacto directo y dudas sobre privacidad</h3>
            </div>
            <p>
              Si tienes preguntas sobre el tratamiento de tus datos personales, requieres asistencia para ejercer tus derechos ARCO o deseas conocer más sobre nuestros protocolos de confidencialidad, nuestro equipo te atenderá con gusto:
            </p>
            <div class="contact-box-grid">
              <div class="contact-box-pill">
                <span class="pill-label">Responsable:</span>
                <strong>Iván Molina · Ivan Media</strong>
              </div>
              <div class="contact-box-pill">
                <span class="pill-label">Correo directo:</span>
                <a href="mailto:<?= e($site->email) ?>"><?= e($site->email) ?></a>
              </div>
              <div class="contact-box-pill">
                <span class="pill-label">Teléfono / WhatsApp:</span>
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
              <a href="/aviso-de-privacidad/descargar" class="btn-legal-download">
                <?= icon('download') ?>
                <span>Descargar Aviso en PDF</span>
              </a>
              <a href="/terminos-y-condiciones" class="btn-legal-sec">
                <span>Ver Términos y Condiciones</span>
                <?= icon('arrow-right') ?>
              </a>
            </div>
          </div>
        </section>

      </article>
    </div>
  </div>
</div>
