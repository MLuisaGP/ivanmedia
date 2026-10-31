<?php
declare(strict_types=1);

/**
 * Cookie Consent Banner Partial
 * Self-contained component (HTML + Scoped CSS + JS).
 * Supports: "Aceptar todas", "Solo necesarias" and "Configurar preferencias".
 * Persists user choice in localStorage so it appears strictly once.
 */
?>
<!-- Banner interactivo de Cookies & Privacidad -->
<div class="cookie-banner" id="cookieBanner" role="region" aria-label="Aviso y configuración de cookies" style="display: none;">
  <div class="cookie-banner-inner">
    
    <!-- Vista Principal del Banner -->
    <div class="cookie-view-main" id="cookieViewMain">
      <div class="cookie-banner-content">
        <div class="cookie-icon-badge" aria-hidden="true">
          <svg class="svg-icon" viewBox="0 0 24 24" fill="currentColor" width="22" height="22">
            <path d="M12 2a10 10 0 1 0 10 10A10.011 10.011 0 0 0 12 2zm-1.5 5a1.5 1.5 0 1 1-1.5 1.5A1.5 1.5 0 0 1 10.5 7zm-3 5a1.5 1.5 0 1 1 1.5-1.5A1.5 1.5 0 0 1 7.5 12zm3.5 4a1.5 1.5 0 1 1 1.5-1.5A1.5 1.5 0 0 1 11 16zm5-2a1.5 1.5 0 1 1 1.5-1.5 1.5 1.5 0 0 1-1.5 1.5zm1-5a1.25 1.25 0 1 1 1.25-1.25A1.25 1.25 0 0 1 17 9z"/>
          </svg>
        </div>
        <div class="cookie-text">
          <h4 class="cookie-title">Privacidad & Tecnologías de Rastreo</h4>
          <p class="cookie-desc">
            En Ivan Media utilizamos cookies propias y analíticas para optimizar tu experiencia y el funcionamiento del cotizador. Puedes aceptar todas, rechazar las opcionales o personalizar tus preferencias. Conoce más en nuestro <a href="/aviso-de-privacidad" class="cookie-link">Aviso de Privacidad</a> y los <a href="/terminos-y-condiciones" class="cookie-link">Términos y Condiciones</a>.
          </p>
        </div>
      </div>

      <div class="cookie-banner-actions">
        <button type="button" class="btn-cookie-action btn-cookie-config" id="btnCookieConfig">
          <svg class="svg-icon" viewBox="0 0 24 24" fill="currentColor" width="14" height="14" aria-hidden="true">
            <path d="M19.14 12.94c.04-.3.06-.61.06-.94 0-.32-.02-.64-.07-.94l2.03-1.58a.49.49 0 0 0 .12-.61l-1.92-3.32a.488.488 0 0 0-.59-.22l-2.39.96c-.5-.38-1.03-.7-1.62-.94l-.36-2.54a.484.484 0 0 0-.48-.41h-3.84c-.24 0-.43.17-.47.41l-.36 2.54c-.59.24-1.13.57-1.62.94l-2.39-.96c-.22-.08-.47 0-.59.22L2.74 8.87c-.12.21-.08.47.12.61l2.03 1.58c-.05.3-.09.63-.09.94s.02.64.07.94l-2.03 1.58a.49.49 0 0 0-.12.61l1.92 3.32c.12.22.37.29.59.22l2.39-.96c.5.38 1.03.7 1.62.94l.36 2.54c.05.24.24.41.48.41h3.84c.24 0 .44-.17.47-.41l.36-2.54c.59-.24 1.13-.56 1.62-.94l2.39.96c.22.08.47 0 .59-.22l1.92-3.32c.12-.22.07-.47-.12-.61l-2.01-1.58zM12 15.6c-1.98 0-3.6-1.62-3.6-3.6s1.62-3.6 3.6-3.6 3.6 1.62 3.6 3.6-1.62 3.6-3.6 3.6z"/>
          </svg>
          <span>Configurar</span>
        </button>

        <button type="button" class="btn-cookie-action btn-cookie-secondary" id="btnCookieReject">
          <span>Solo necesarias</span>
        </button>

        <button type="button" class="btn-cookie-action btn-cookie-primary" id="btnCookieAcceptAll">
          <span>Aceptar todas</span>
          <svg class="svg-icon" viewBox="0 0 24 24" fill="currentColor" width="15" height="15" aria-hidden="true">
            <path d="M9.86 18a1 1 0 0 1-.73-.32l-4.86-5.17a1 1 0 1 1 1.46-1.37l4.12 4.39 8.41-9.2a1 1 0 1 1 1.48 1.34l-9.14 10a1 1 0 0 1-.74.33z"/>
          </svg>
        </button>
      </div>
    </div>

    <!-- Panel Extensible de Configuración de Preferencias -->
    <div class="cookie-view-config" id="cookieViewConfig" style="display: none;">
      <div class="cookie-config-header">
        <div class="cookie-config-title-wrap">
          <h4 class="cookie-config-title">Preferencias de Privacidad</h4>
          <p class="cookie-config-subtitle">Elige qué tipos de tecnologías deseas permitir durante tu navegación.</p>
        </div>
        <button type="button" class="btn-cookie-close-config" id="btnCookieBackTop" aria-label="Volver">
          ✕
        </button>
      </div>

      <div class="cookie-categories-list">
        <!-- 1. Necesarias -->
        <div class="cookie-cat-item">
          <div class="cookie-cat-info">
            <div class="cookie-cat-header">
              <span class="cookie-cat-name">Cookies Esenciales & Técnicas</span>
              <span class="cookie-pill-required">Siempre Activas</span>
            </div>
            <p class="cookie-cat-desc">
              Necesarias para el funcionamiento básico del sitio, navegación segura, validaciones del cotizador y recordar tu sesión. No pueden desactivarse.
            </p>
          </div>
          <div class="cookie-cat-switch">
            <input type="checkbox" checked disabled id="cookieReq" aria-label="Cookies requeridas">
            <span class="cookie-slider is-disabled"></span>
          </div>
        </div>

        <!-- 2. Analíticas -->
        <div class="cookie-cat-item">
          <div class="cookie-cat-info">
            <div class="cookie-cat-header">
              <label for="cookieAnalytics" class="cookie-cat-name cookie-clickable-label">Métricas & Analítica</label>
              <span class="cookie-pill-optional">Opcional</span>
            </div>
            <p class="cookie-cat-desc">
              Nos permiten medir visitas anónimas, secciones más consultadas y rendimiento general para mejorar la plataforma de Ivan Media.
            </p>
          </div>
          <div class="cookie-cat-switch">
            <input type="checkbox" id="cookieAnalytics" checked>
            <label for="cookieAnalytics" class="cookie-slider"></label>
          </div>
        </div>

        <!-- 3. Marketing -->
        <div class="cookie-cat-item">
          <div class="cookie-cat-info">
            <div class="cookie-cat-header">
              <label for="cookieMarketing" class="cookie-cat-name cookie-clickable-label">Marketing & Publicidad</label>
              <span class="cookie-pill-optional">Opcional</span>
            </div>
            <p class="cookie-cat-desc">
              Ayudan a mostrarte anuncios y contenido relevante en redes sociales según los servicios de producción que te interesan.
            </p>
          </div>
          <div class="cookie-cat-switch">
            <input type="checkbox" id="cookieMarketing">
            <label for="cookieMarketing" class="cookie-slider"></label>
          </div>
        </div>
      </div>

      <div class="cookie-config-footer">
        <button type="button" class="btn-cookie-action btn-cookie-secondary" id="btnCookieBack">
          <span>Volver</span>
        </button>
        <button type="button" class="btn-cookie-action btn-cookie-primary" id="btnCookieSaveConfig">
          <span>Guardar mis preferencias</span>
        </button>
      </div>
    </div>

  </div>
</div>

<style>
/* ==========================================================================
   COOKIE BANNER & PREFERENCES COMPONENT (SCOPED)
   ========================================================================== */
#cookieBanner.cookie-banner {
  position: fixed;
  bottom: 24px;
  left: 50%;
  transform: translateX(-50%) translateY(120%);
  width: calc(100% - 32px);
  max-width: 960px;
  z-index: 999999;
  background: rgba(2, 27, 57, 0.96);
  backdrop-filter: blur(16px);
  -webkit-backdrop-filter: blur(16px);
  border: 1px solid rgba(56, 189, 248, 0.35);
  border-radius: 16px;
  box-shadow: 0 20px 50px -10px rgba(0, 0, 0, 0.7), 0 0 35px rgba(56, 189, 248, 0.15);
  opacity: 0;
  transition: transform 0.45s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.4s ease;
  pointer-events: none;
  font-family: 'DM Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
  box-sizing: border-box;
}

#cookieBanner.cookie-banner *,
#cookieBanner.cookie-banner *::before,
#cookieBanner.cookie-banner *::after {
  box-sizing: border-box;
}

#cookieBanner.cookie-banner.is-visible {
  transform: translateX(-50%) translateY(0);
  opacity: 1;
  pointer-events: auto;
}

#cookieBanner .cookie-banner-inner {
  padding: 18px 24px;
}

/* Vista Principal */
#cookieBanner .cookie-view-main {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 22px;
}

#cookieBanner .cookie-banner-content {
  display: flex;
  align-items: center;
  gap: 16px;
  flex: 1;
}

#cookieBanner .cookie-icon-badge {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 44px;
  height: 44px;
  min-width: 44px;
  border-radius: 12px;
  background: rgba(56, 189, 248, 0.12);
  border: 1px solid rgba(56, 189, 248, 0.32);
  color: #38bdf8;
  flex-shrink: 0;
}

#cookieBanner .cookie-text {
  flex: 1;
}

#cookieBanner .cookie-title {
  font-size: 14.5px;
  font-weight: 700;
  color: #FFFFFF;
  margin: 0 0 3px;
  letter-spacing: -0.01em;
}

#cookieBanner .cookie-desc {
  font-size: 13px;
  line-height: 1.48;
  color: #D7EAFF;
  margin: 0;
}

#cookieBanner .cookie-link {
  color: #38bdf8;
  font-weight: 600;
  text-decoration: underline;
  text-underline-offset: 2px;
  transition: color 0.15s ease;
}

#cookieBanner .cookie-link:hover {
  color: #FFFFFF;
}

#cookieBanner .cookie-banner-actions {
  display: flex;
  align-items: center;
  gap: 10px;
  flex-shrink: 0;
}

/* Botones del Banner */
#cookieBanner .btn-cookie-action {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 7px;
  padding: 10px 18px;
  border-radius: 9999px;
  font-size: 13px;
  font-weight: 700;
  cursor: pointer;
  white-space: nowrap;
  transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
  border: 1px solid transparent;
}

#cookieBanner .btn-cookie-primary {
  background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);
  color: #FFFFFF;
  border-color: rgba(255, 255, 255, 0.25);
  box-shadow: 0 4px 14px rgba(2, 132, 199, 0.35);
}

#cookieBanner .btn-cookie-primary:hover {
  background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
  transform: translateY(-1.5px);
  box-shadow: 0 6px 18px rgba(14, 165, 233, 0.45);
}

#cookieBanner .btn-cookie-secondary {
  background: rgba(255, 255, 255, 0.08);
  color: #E2E8F0;
  border-color: rgba(215, 234, 255, 0.2);
}

#cookieBanner .btn-cookie-secondary:hover {
  background: rgba(255, 255, 255, 0.16);
  color: #FFFFFF;
  border-color: rgba(215, 234, 255, 0.35);
}

#cookieBanner .btn-cookie-config {
  background: transparent;
  color: #93c5fd;
  border-color: transparent;
  padding: 10px 14px;
}

#cookieBanner .btn-cookie-config:hover {
  color: #FFFFFF;
  background: rgba(255, 255, 255, 0.06);
}

/* Vista de Configuración / Preferencias */
#cookieBanner .cookie-view-config {
  animation: cookieFadeIn 0.25s ease;
}

@keyframes cookieFadeIn {
  from { opacity: 0; transform: translateY(6px); }
  to { opacity: 1; transform: translateY(0); }
}

#cookieBanner .cookie-config-header {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  gap: 16px;
  padding-bottom: 14px;
  border-bottom: 1px solid rgba(215, 234, 255, 0.12);
  margin-bottom: 14px;
}

#cookieBanner .cookie-config-title {
  font-size: 16px;
  font-weight: 700;
  color: #FFFFFF;
  margin: 0 0 4px;
}

#cookieBanner .cookie-config-subtitle {
  font-size: 12.5px;
  color: #BACCDD;
  margin: 0;
}

#cookieBanner .btn-cookie-close-config {
  background: rgba(255, 255, 255, 0.08);
  border: 1px solid rgba(255, 255, 255, 0.15);
  color: #BACCDD;
  width: 28px;
  height: 28px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  font-size: 12px;
  transition: all 0.2s ease;
}

#cookieBanner .btn-cookie-close-config:hover {
  background: rgba(255, 255, 255, 0.2);
  color: #FFFFFF;
}

#cookieBanner .cookie-categories-list {
  display: flex;
  flex-direction: column;
  gap: 10px;
  max-height: 280px;
  overflow-y: auto;
  padding-right: 6px;
  margin-bottom: 16px;
}

#cookieBanner .cookie-cat-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 18px;
  padding: 12px 16px;
  background: rgba(255, 255, 255, 0.04);
  border: 1px solid rgba(215, 234, 255, 0.1);
  border-radius: 10px;
}

#cookieBanner .cookie-cat-info {
  flex: 1;
}

#cookieBanner .cookie-cat-header {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 3px;
}

#cookieBanner .cookie-cat-name {
  font-size: 13.5px;
  font-weight: 700;
  color: #FFFFFF;
}

#cookieBanner .cookie-clickable-label {
  cursor: pointer;
}

#cookieBanner .cookie-pill-required {
  font-size: 10px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  padding: 2px 8px;
  border-radius: 9999px;
  background: rgba(56, 189, 248, 0.15);
  color: #38bdf8;
  border: 1px solid rgba(56, 189, 248, 0.3);
}

#cookieBanner .cookie-pill-optional {
  font-size: 10px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  padding: 2px 8px;
  border-radius: 9999px;
  background: rgba(255, 255, 255, 0.08);
  color: #94a3b8;
  border: 1px solid rgba(255, 255, 255, 0.12);
}

#cookieBanner .cookie-cat-desc {
  font-size: 12px;
  line-height: 1.45;
  color: #BACCDD;
  margin: 0;
}

/* iOS-Style Switches */
#cookieBanner .cookie-cat-switch {
  position: relative;
  width: 44px;
  height: 24px;
  flex-shrink: 0;
}

#cookieBanner .cookie-cat-switch input {
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
}

#cookieBanner .cookie-slider {
  position: absolute;
  cursor: pointer;
  inset: 0;
  background-color: rgba(255, 255, 255, 0.2);
  border-radius: 24px;
  transition: 0.25s ease;
}

#cookieBanner .cookie-slider::before {
  position: absolute;
  content: "";
  height: 18px;
  width: 18px;
  left: 3px;
  bottom: 3px;
  background-color: #FFFFFF;
  border-radius: 50%;
  transition: 0.25s cubic-bezier(0.16, 1, 0.3, 1);
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}

#cookieBanner .cookie-cat-switch input:checked + .cookie-slider {
  background-color: #0284c7;
}

#cookieBanner .cookie-cat-switch input:checked + .cookie-slider::before {
  transform: translateX(20px);
}

#cookieBanner .cookie-slider.is-disabled {
  cursor: not-allowed;
  opacity: 0.7;
  background-color: #0369a1;
}

#cookieBanner .cookie-slider.is-disabled::before {
  transform: translateX(20px);
}

#cookieBanner .cookie-config-footer {
  display: flex;
  align-items: center;
  justify-content: flex-end;
  gap: 12px;
  padding-top: 6px;
}

/* Responsividad Mobile */
@media (max-width: 768px) {
  #cookieBanner.cookie-banner {
    bottom: 16px;
    width: calc(100% - 24px);
    border-radius: 14px;
  }

  #cookieBanner .cookie-banner-inner {
    padding: 16px;
  }

  #cookieBanner .cookie-view-main {
    flex-direction: column;
    align-items: stretch;
    gap: 14px;
  }

  #cookieBanner .cookie-banner-content {
    align-items: flex-start;
    gap: 12px;
  }

  #cookieBanner .cookie-icon-badge {
    width: 38px;
    height: 38px;
    min-width: 38px;
    margin-top: 2px;
  }

  #cookieBanner .cookie-banner-actions {
    flex-direction: column-reverse;
    gap: 8px;
    width: 100%;
  }

  #cookieBanner .btn-cookie-action {
    width: 100%;
    padding: 11px 16px;
  }

  #cookieBanner .cookie-cat-item {
    align-items: flex-start;
  }

  #cookieBanner .cookie-config-footer {
    flex-direction: column-reverse;
    gap: 8px;
  }
}
</style>

<script>
(function() {
  const STORAGE_KEY = 'ivanmedia_cookie_consent';

  function initCookieBanner() {
    // 1. Comprobar si el usuario ya tomó una decisión previa (no vuelve a salir)
    try {
      if (localStorage.getItem(STORAGE_KEY)) {
        return;
      }
    } catch (e) {
      // Ignorar si localStorage está restringido
    }

    const banner = document.getElementById('cookieBanner');
    const viewMain = document.getElementById('cookieViewMain');
    const viewConfig = document.getElementById('cookieViewConfig');

    const btnAcceptAll = document.getElementById('btnCookieAcceptAll');
    const btnReject = document.getElementById('btnCookieReject');
    const btnConfig = document.getElementById('btnCookieConfig');
    const btnBack = document.getElementById('btnCookieBack');
    const btnBackTop = document.getElementById('btnCookieBackTop');
    const btnSaveConfig = document.getElementById('btnCookieSaveConfig');

    const chkAnalytics = document.getElementById('cookieAnalytics');
    const chkMarketing = document.getElementById('cookieMarketing');

    if (!banner || !viewMain || !btnAcceptAll) return;

    // 2. Desplegar el banner tras 700ms de carga
    setTimeout(function() {
      banner.style.display = 'block';
      void banner.offsetWidth; // Forzar reflow para animación CSS
      banner.classList.add('is-visible');
    }, 700);

    // Función para cerrar y guardar
    function saveAndClose(consentData) {
      try {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(consentData));
      } catch (e) {}

      banner.classList.remove('is-visible');
      setTimeout(function() {
        banner.style.display = 'none';
      }, 450);
    }

    // Aceptar todas
    btnAcceptAll.addEventListener('click', function() {
      saveAndClose({
        status: 'all',
        necessary: true,
        analytics: true,
        marketing: true,
        date: new Date().toISOString()
      });
    });

    // Solo necesarias
    btnReject?.addEventListener('click', function() {
      saveAndClose({
        status: 'necessary',
        necessary: true,
        analytics: false,
        marketing: false,
        date: new Date().toISOString()
      });
    });

    // Abrir panel de configuración
    btnConfig?.addEventListener('click', function() {
      viewMain.style.display = 'none';
      viewConfig.style.display = 'block';
    });

    // Volver a la vista principal
    function goBackToMain() {
      viewConfig.style.display = 'none';
      viewMain.style.display = 'flex';
    }
    btnBack?.addEventListener('click', goBackToMain);
    btnBackTop?.addEventListener('click', goBackToMain);

    // Guardar preferencias personalizadas
    btnSaveConfig?.addEventListener('click', function() {
      saveAndClose({
        status: 'custom',
        necessary: true,
        analytics: chkAnalytics ? chkAnalytics.checked : false,
        marketing: chkMarketing ? chkMarketing.checked : false,
        date: new Date().toISOString()
      });
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initCookieBanner);
  } else {
    initCookieBanner();
  }
})();
</script>
