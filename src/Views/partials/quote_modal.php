<?php
declare(strict_types=1);

/**
 * @var \App\Models\SiteConfig|null $site
 */
$whatsappUrl = isset($site) && !empty($site->whatsapp) ? $site->whatsapp : 'https://wa.me/526621234567';
?>
<dialog class="quote-modal" id="quoteModal" aria-labelledby="quoteModalTitle">
  <div class="quote-modal-card">
    <button class="quote-modal-close" id="quoteModalClose" aria-label="Cerrar formulario de cotización" type="button">
      <?= icon('close') ?>
    </button>

    <!-- Header del Modal -->
    <header class="quote-modal-header">
      <div class="quote-modal-eyebrow">
        <span class="status-dot"></span>
        <span>Cotización Audiovisual · Ivan Media</span>
      </div>
      <h2 class="quote-modal-title" id="quoteModalTitle">Cuéntanos sobre tu marca</h2>
      <p class="quote-modal-subtitle">Queremos conocer a fondo tu proyecto para crear una propuesta comercial y audiovisual a tu medida.</p>

      <!-- Stepper / Indicador de pasos -->
      <nav class="quote-stepper" aria-label="Pasos de la cotización">
        <button type="button" class="quote-step-btn is-active" data-step-target="1" aria-current="step">
          <span class="step-num">01</span>
          <span class="step-label">Contacto</span>
        </button>
        <span class="quote-step-divider" aria-hidden="true"></span>
        <button type="button" class="quote-step-btn" data-step-target="2">
          <span class="step-num">02</span>
          <span class="step-label">Tu Negocio</span>
        </button>
        <span class="quote-step-divider" aria-hidden="true"></span>
        <button type="button" class="quote-step-btn" data-step-target="3">
          <span class="step-num">03</span>
          <span class="step-label">Objetivos</span>
        </button>
        <span class="quote-step-divider" aria-hidden="true"></span>
        <button type="button" class="quote-step-btn" data-step-target="4">
          <span class="step-num">04</span>
          <span class="step-label">Clientes</span>
        </button>
        <span class="quote-step-divider" aria-hidden="true"></span>
        <button type="button" class="quote-step-btn" data-step-target="5">
          <span class="step-num">05</span>
          <span class="step-label">Inversión</span>
        </button>
      </nav>

      <div class="quote-progress" aria-hidden="true">
        <div class="quote-progress-bar" id="quoteProgressBar" style="width: 20%;"></div>
      </div>
    </header>

    <!-- Formulario de Cotización -->
    <form class="quote-form" id="quoteForm" autocomplete="on" novalidate>

      <!-- ================= PASO 1 ================= -->
      <div class="quote-step-pane is-active" data-step="1">
        <div class="quote-step-heading">
          <span class="quote-step-tag">Paso 1 de 5</span>
          <h3>Información de contacto</h3>
          <p>¿Con quién tendremos el gusto de platicar y dar seguimiento?</p>
        </div>

        <div class="quote-fields-grid">
          <div class="form-group">
            <label for="q_nombre">Nombre completo <span class="req">*</span></label>
            <input type="text" id="q_nombre" name="nombre" placeholder="Ej. Carlos Mendoza" required autocomplete="name">
            <span class="field-error-msg">Por favor ingresa tu nombre completo</span>
          </div>

          <div class="form-group">
            <label for="q_marca">Nombre de tu negocio o marca <span class="req">*</span></label>
            <input type="text" id="q_marca" name="marca" placeholder="Ej. Don Carbón Parrilla & Bar" required autocomplete="organization">
            <span class="field-error-msg">Por favor ingresa el nombre de tu marca</span>
          </div>

          <div class="form-group">
            <label for="q_email">Correo electrónico <span class="req">*</span></label>
            <input type="email" id="q_email" name="email" placeholder="ejemplo@tunegocio.com" required autocomplete="email">
            <span class="field-error-msg">Por favor ingresa un correo electrónico válido</span>
          </div>

          <div class="form-group">
            <label for="q_telefono">Número de teléfono o WhatsApp <span class="req">*</span></label>
            <input type="tel" id="q_telefono" name="telefono" placeholder="Ej. 662 123 4567" required autocomplete="tel">
            <span class="field-error-msg">Por favor ingresa un número de contacto</span>
          </div>
        </div>

        <div class="quote-step-actions">
          <div></div>
          <button type="button" class="btn-step-next" data-next="2">
            <span>Siguiente: Tu Negocio</span>
            <span class="btn-icon"><?= icon('arrow-right') ?></span>
          </button>
        </div>
      </div>

      <!-- ================= PASO 2 ================= -->
      <div class="quote-step-pane" data-step="2">
        <div class="quote-step-heading">
          <span class="quote-step-tag">Paso 2 de 5</span>
          <h3>Todo sobre tu negocio</h3>
          <p>Cuéntanos a qué se dedica tu negocio y en qué momento se encuentra.</p>
        </div>

        <div class="form-group">
          <label for="q_giro">Describe brevemente a qué se dedica tu negocio <span class="req">*</span></label>
          <textarea id="q_giro" name="giro" rows="3" placeholder="¿Qué productos o servicios ofreces, qué te hace único y cuál es tu concepto?..." required></textarea>
          <span class="field-error-msg">Por favor describe brevemente a qué se dedica tu negocio</span>
        </div>

        <div class="form-group">
          <label for="q_ubicacion">Ubicación o zona de atención <span class="opt">(opcional)</span></label>
          <input type="text" id="q_ubicacion" name="ubicacion" placeholder="Ej. Hermosillo, Sonora / Envíos nacionales / Sucursal centro">
        </div>

        <div class="form-group">
          <label class="group-title">Tiempo en el mercado <span class="req">*</span></label>
          <div class="quote-choices-grid quote-choices-3" id="groupTiempoMercado">
            <label class="choice-card">
              <input type="radio" name="tiempo_mercado" value="Menos de 1 año" required>
              <span class="choice-box">
                <span class="choice-radio-dot"></span>
                <span class="choice-text">Menos de 1 año</span>
              </span>
            </label>
            <label class="choice-card">
              <input type="radio" name="tiempo_mercado" value="1 a 3 años">
              <span class="choice-box">
                <span class="choice-radio-dot"></span>
                <span class="choice-text">1 a 3 años</span>
              </span>
            </label>
            <label class="choice-card">
              <input type="radio" name="tiempo_mercado" value="Más de 3 años">
              <span class="choice-box">
                <span class="choice-radio-dot"></span>
                <span class="choice-text">Más de 3 años</span>
              </span>
            </label>
          </div>
          <span class="field-error-msg">Por favor selecciona el tiempo que llevas en el mercado</span>
        </div>

        <div class="form-group">
          <label class="group-title">¿Tienes página web o redes sociales? <span class="req">*</span></label>
          <div class="quote-choices-grid quote-choices-2" id="groupCanalesDigitales">
            <label class="choice-card">
              <input type="radio" name="canales_digitales" value="Sí, ambas" required>
              <span class="choice-box">
                <span class="choice-radio-dot"></span>
                <span class="choice-text">Sí, ambas</span>
              </span>
            </label>
            <label class="choice-card">
              <input type="radio" name="canales_digitales" value="Solo redes Sociales">
              <span class="choice-box">
                <span class="choice-radio-dot"></span>
                <span class="choice-text">Solo redes sociales</span>
              </span>
            </label>
            <label class="choice-card">
              <input type="radio" name="canales_digitales" value="Solo página web">
              <span class="choice-box">
                <span class="choice-radio-dot"></span>
                <span class="choice-text">Solo página web</span>
              </span>
            </label>
            <label class="choice-card">
              <input type="radio" name="canales_digitales" value="Ninguna de ellas">
              <span class="choice-box">
                <span class="choice-radio-dot"></span>
                <span class="choice-text">Ninguna de ellas</span>
              </span>
            </label>
          </div>
          <span class="field-error-msg">Por favor selecciona una opción</span>
        </div>

        <div class="quote-step-actions">
          <button type="button" class="btn-step-prev" data-prev="1">
            <span class="btn-icon"><?= icon('arrow-left') ?></span>
            <span>Anterior</span>
          </button>
          <button type="button" class="btn-step-next" data-next="3">
            <span>Siguiente: Objetivos</span>
            <span class="btn-icon"><?= icon('arrow-right') ?></span>
          </button>
        </div>
      </div>

      <!-- ================= PASO 3 ================= -->
      <div class="quote-step-pane" data-step="3">
        <div class="quote-step-heading">
          <span class="quote-step-tag">Paso 3 de 5</span>
          <h3>Objetivos comerciales</h3>
          <p>Definamos qué impacto buscas alcanzar con tu contenido.</p>
        </div>

        <div class="form-group">
          <label class="group-title">¿Qué te gustaría lograr en los próximos 3–6 meses? <span class="opt">(opcional, opción múltiple)</span></label>
          <div class="quote-choices-grid quote-choices-2">
            <label class="choice-card choice-card--checkbox">
              <input type="checkbox" name="objetivos_3_6m[]" value="Aumentar Ventas">
              <span class="choice-box">
                <span class="choice-check-icon"><?= icon('check') ?></span>
                <span class="choice-text">Aumentar ventas</span>
              </span>
            </label>
            <label class="choice-card choice-card--checkbox">
              <input type="checkbox" name="objetivos_3_6m[]" value="Conseguir más clientes potenciales">
              <span class="choice-box">
                <span class="choice-check-icon"><?= icon('check') ?></span>
                <span class="choice-text">Conseguir más clientes potenciales</span>
              </span>
            </label>
            <label class="choice-card choice-card--checkbox">
              <input type="checkbox" name="objetivos_3_6m[]" value="Mejorar mi presencia en redes sociales">
              <span class="choice-box">
                <span class="choice-check-icon"><?= icon('check') ?></span>
                <span class="choice-text">Mejorar mi presencia en redes</span>
              </span>
            </label>
            <label class="choice-card choice-card--checkbox">
              <input type="checkbox" name="objetivos_3_6m[]" value="Posicionar mi marca en internet">
              <span class="choice-box">
                <span class="choice-check-icon"><?= icon('check') ?></span>
                <span class="choice-text">Posicionar mi marca en internet</span>
              </span>
            </label>
            <label class="choice-card choice-card--checkbox choice-card--full" id="choiceOtroWrap">
              <input type="checkbox" name="objetivos_3_6m[]" value="Otro" id="checkObjetivoOtro">
              <span class="choice-box">
                <span class="choice-check-icon"><?= icon('check') ?></span>
                <span class="choice-text">Otro objetivo</span>
              </span>
            </label>
          </div>
          <div class="quote-other-field" id="quoteOtherField" style="display: none;">
            <input type="text" name="objetivo_otro_detalle" id="q_objetivo_otro" placeholder="¿Cuál es tu otro objetivo? Especifica aquí...">
          </div>
        </div>

        <div class="form-group">
          <label class="group-title">Si pudieras elegir un resultado ideal en marketing, sería: <span class="req">* (opción múltiple)</span></label>
          <div class="quote-choices-grid quote-choices-2" id="groupResultadoIdeal">
            <label class="choice-card choice-card--checkbox">
              <input type="checkbox" name="resultado_ideal[]" value="Generar mas ventas">
              <span class="choice-box">
                <span class="choice-check-icon"><?= icon('check') ?></span>
                <span class="choice-text">Generar más ventas</span>
              </span>
            </label>
            <label class="choice-card choice-card--checkbox">
              <input type="checkbox" name="resultado_ideal[]" value="Tener mas seguidores y aumentar mi comunidad">
              <span class="choice-box">
                <span class="choice-check-icon"><?= icon('check') ?></span>
                <span class="choice-text">Tener más seguidores y comunidad</span>
              </span>
            </label>
            <label class="choice-card choice-card--checkbox">
              <input type="checkbox" name="resultado_ideal[]" value="Posicionar mi marca o Reconocimiento">
              <span class="choice-box">
                <span class="choice-check-icon"><?= icon('check') ?></span>
                <span class="choice-text">Posicionar mi marca o reconocimiento</span>
              </span>
            </label>
            <label class="choice-card choice-card--checkbox">
              <input type="checkbox" name="resultado_ideal[]" value="Mejorar mi imagen y presentacion de mi negocio">
              <span class="choice-box">
                <span class="choice-check-icon"><?= icon('check') ?></span>
                <span class="choice-text">Mejorar imagen y presentación</span>
              </span>
            </label>
          </div>
          <span class="field-error-msg">Por favor selecciona al menos un resultado ideal</span>
        </div>

        <div class="quote-step-actions">
          <button type="button" class="btn-step-prev" data-prev="2">
            <span class="btn-icon"><?= icon('arrow-left') ?></span>
            <span>Anterior</span>
          </button>
          <button type="button" class="btn-step-next" data-next="4">
            <span>Siguiente: Clientes</span>
            <span class="btn-icon"><?= icon('arrow-right') ?></span>
          </button>
        </div>
      </div>

      <!-- ================= PASO 4 ================= -->
      <div class="quote-step-pane" data-step="4">
        <div class="quote-step-heading">
          <span class="quote-step-tag">Paso 4 de 5</span>
          <h3>Clientes y competencia</h3>
          <p>Para crear contenido que cautive, necesitamos saber a quién le hablamos.</p>
        </div>

        <div class="form-group">
          <label for="q_cliente_ideal">Describe brevemente a tu cliente ideal <span class="req">*</span> <small>(Edad, intereses, ubicación, etc.)</small></label>
          <textarea id="q_cliente_ideal" name="cliente_ideal" rows="3" placeholder="Ej. Hombres y mujeres de 22 a 40 años que disfrutan salir a cenar los fines de semana, valoran la comida de calidad y el buen ambiente..." required></textarea>
          <span class="field-error-msg">Por favor describe brevemente a tu cliente ideal</span>
        </div>

        <div class="form-group">
          <label for="q_competidores">Menciona 1 o 2 competidores o marcas que admires <span class="req">*</span></label>
          <textarea id="q_competidores" name="competidores" rows="2" placeholder="Ej. Marca Local A, Marca Internacional B (esto nos permite captar la estética y tono visual que te inspira)" required></textarea>
          <span class="field-error-msg">Por favor menciona al menos 1 o 2 marcas o competidores</span>
        </div>

        <div class="quote-step-actions">
          <button type="button" class="btn-step-prev" data-prev="3">
            <span class="btn-icon"><?= icon('arrow-left') ?></span>
            <span>Anterior</span>
          </button>
          <button type="button" class="btn-step-next" data-next="5">
            <span>Siguiente: Inversión</span>
            <span class="btn-icon"><?= icon('arrow-right') ?></span>
          </button>
        </div>
      </div>

      <!-- ================= PASO 5 ================= -->
      <div class="quote-step-pane" data-step="5">
        <div class="quote-step-heading">
          <span class="quote-step-tag">Paso 5 de 5</span>
          <h3>Inversión y expectativas</h3>
          <p>Último paso para ajustar el alcance de la propuesta a tu presupuesto y necesidades.</p>
        </div>

        <div class="form-group">
          <label class="group-title">¿Con qué presupuesto mensual estimado cuentas para Creación de contenido? <span class="req">* (una opción)</span></label>
          <div class="quote-choices-grid quote-choices-2" id="groupPresupuesto">
            <label class="choice-card">
              <input type="radio" name="presupuesto" value="Menos de $4,000 MXN" required>
              <span class="choice-box">
                <span class="choice-radio-dot"></span>
                <span class="choice-text">Menos de $4,000 MXN</span>
              </span>
            </label>
            <label class="choice-card">
              <input type="radio" name="presupuesto" value="Entre $4,000 y $8,000 MXN">
              <span class="choice-box">
                <span class="choice-radio-dot"></span>
                <span class="choice-text">Entre $4,000 y $8,000 MXN</span>
              </span>
            </label>
            <label class="choice-card">
              <input type="radio" name="presupuesto" value="Más de $8,000 MXN">
              <span class="choice-box">
                <span class="choice-radio-dot"></span>
                <span class="choice-text">Más de $8,000 MXN</span>
              </span>
            </label>
            <label class="choice-card">
              <input type="radio" name="presupuesto" value="No estoy seguro, necesito orientación">
              <span class="choice-box">
                <span class="choice-radio-dot"></span>
                <span class="choice-text">No estoy seguro, necesito orientación</span>
              </span>
            </label>
          </div>
          <span class="field-error-msg">Por favor selecciona un rango de presupuesto</span>
        </div>

        <div class="form-group">
          <label for="q_expectativas">¿Qué esperas de una agencia de marketing para considerarla un aliado ideal? <span class="opt">(opcional)</span></label>
          <textarea id="q_expectativas" name="expectativas" rows="3" placeholder="Ej. Claridad en tiempos de entrega, iniciativa con ideas de contenido, compromiso y comunicación directa..."></textarea>
        </div>

        <div class="quote-step-actions">
          <button type="button" class="btn-step-prev" data-prev="4">
            <span class="btn-icon"><?= icon('arrow-left') ?></span>
            <span>Anterior</span>
          </button>
          <button type="submit" class="btn-step-submit" id="btnSubmitQuote">
            <span>Enviar solicitud de cotización</span>
            <span class="btn-icon"><?= icon('check') ?></span>
          </button>
        </div>
      </div>
    </form>

    <!-- Vista de Éxito / Confirmación -->
    <div class="quote-success-view" id="quoteSuccessView" style="display: none;">
      <div class="quote-success-badge">
        <?= icon('check') ?>
      </div>
      <h3 class="quote-success-title">¡Solicitud recibida con éxito!</h3>
      <p class="quote-success-msg">
        Gracias por compartirnos los detalles de tu negocio. Hemos registrado tu información y prepararemos una propuesta audiovisual personalizada a tu medida.
      </p>
      
      <div class="quote-summary-card" id="quoteSummaryCard">
        <!-- Rellenado dinámicamente con JS -->
      </div>

      <div class="quote-success-actions">
        <button type="button" class="btn-quote-close-success" id="btnSuccessClose">
          <span>Volver al sitio</span>
        </button>
        <a href="<?= e($whatsappUrl) ?>" target="_blank" rel="noopener" class="btn-quote-whatsapp-success">
          <span>Platicar también por WhatsApp</span>
          <span class="btn-icon"><?= icon('arrow-up-right') ?></span>
        </a>
      </div>
    </div>
  </div>
</dialog>
