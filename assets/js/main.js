(() => {
  const menuToggle = document.querySelector('#menuToggle');
  const mainNav = document.querySelector('#mainNav');
  const closeNav = () => {
    menuToggle?.setAttribute('aria-expanded', 'false');
    mainNav?.classList.remove('is-open');
    document.body.classList.remove('nav-open');
  };

  if (menuToggle && mainNav) {
    menuToggle.addEventListener('click', () => {
      const isOpen = menuToggle.getAttribute('aria-expanded') === 'true';
      menuToggle.setAttribute('aria-expanded', String(!isOpen));
      mainNav.classList.toggle('is-open', !isOpen);
      document.body.classList.toggle('nav-open', !isOpen);
    });
    mainNav.querySelectorAll('a').forEach(link => link.addEventListener('click', closeNav));
  }

  const progress = document.querySelector('#scrollProgress');
  const backTop = document.querySelector('.back-top');
  const siteHeader = document.querySelector('.site-header');
  const updateScroll = () => {
    const max = document.documentElement.scrollHeight - window.innerHeight;
    if (progress) progress.style.width = `${max > 0 ? (window.scrollY / max) * 100 : 0}%`;
    if (backTop) backTop.classList.toggle('is-visible', window.scrollY > 300);
    if (siteHeader) siteHeader.classList.toggle('is-scrolled', window.scrollY > 20);
  };
  window.addEventListener('scroll', updateScroll, { passive: true });
  updateScroll();
  if (backTop) {
    backTop.addEventListener('click', (e) => {
      e.preventDefault();
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  const revealItems = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window) {
    const revealObserver = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          revealObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12 });
    revealItems.forEach(item => revealObserver.observe(item));
  } else {
    revealItems.forEach(item => item.classList.add('is-visible'));
  }

  // Counter animation for statistics (Quién soy & Sección 07 Casos de éxito)
  const statCounters = document.querySelectorAll('.stat-counter');
  if (statCounters.length > 0) {
    const prefersReducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    const setContent = (el, text) => {
      if (text.includes('<')) {
        el.innerHTML = text;
      } else {
        el.textContent = text;
      }
    };

    const animateCounter = (el) => {
      const rawTarget = el.dataset.target;
      if (!rawTarget) return;
      const target = parseFloat(rawTarget);
      if (isNaN(target)) return;
      const prefix = el.dataset.prefix || '';
      const suffix = el.dataset.suffix || '';
      const hasDecimals = el.dataset.decimals !== undefined
        ? parseInt(el.dataset.decimals, 10) > 0
        : rawTarget.includes('.');
      const decimals = hasDecimals
        ? parseInt(el.dataset.decimals || (rawTarget.split('.')[1] || '').length || '1', 10)
        : 0;
      const duration = parseInt(el.dataset.duration || '1600', 10);
      let startTime = null;

      const updateCount = (timestamp) => {
        if (!startTime) startTime = timestamp;
        const elapsed = timestamp - startTime;
        const progress = Math.min(elapsed / duration, 1);
        // Easing: easeOutCubic (starts briskly, smoothly decelerates to final number)
        const easeProgress = 1 - Math.pow(1 - progress, 3);
        const currentVal = easeProgress * target;
        const currentFormatted = decimals > 0 ? currentVal.toFixed(decimals) : Math.round(currentVal);

        setContent(el, `${prefix}${currentFormatted}${suffix}`);

        if (progress < 1) {
          window.requestAnimationFrame(updateCount);
        } else {
          const finalFormatted = decimals > 0 ? target.toFixed(decimals) : target;
          setContent(el, `${prefix}${finalFormatted}${suffix}`);
        }
      };

      window.requestAnimationFrame(updateCount);
    };

    if (!prefersReducedMotion) {
      if ('IntersectionObserver' in window) {
        // Reset to initial 0 before scrolling into view
        statCounters.forEach(counter => {
          const prefix = counter.dataset.prefix || '';
          const suffix = counter.dataset.suffix || '';
          const rawTarget = counter.dataset.target || '';
          const hasDecimals = counter.dataset.decimals !== undefined
            ? parseInt(counter.dataset.decimals, 10) > 0
            : rawTarget.includes('.');
          const decimals = hasDecimals
            ? parseInt(counter.dataset.decimals || (rawTarget.split('.')[1] || '').length || '1', 10)
            : 0;
          const initialVal = decimals > 0 ? (0).toFixed(decimals) : '0';
          setContent(counter, `${prefix}${initialVal}${suffix}`);
        });

        const statsObserver = new IntersectionObserver((entries, observer) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              animateCounter(entry.target);
              observer.unobserve(entry.target);
            }
          });
        }, { threshold: 0.15 });

        statCounters.forEach(counter => statsObserver.observe(counter));
      } else {
        statCounters.forEach(counter => animateCounter(counter));
      }
    }
  }

  const filters = document.querySelectorAll('.filter-btn');
  const filterCards = document.querySelectorAll('.project-card[data-category]');
  if (filters.length > 0) {
    filters.forEach(button => button.addEventListener('click', () => {
      const filter = button.dataset.filter;
      filters.forEach(item => item.classList.toggle('is-active', item === button));
      filterCards.forEach((card, index) => {
        const show = filter === 'todos' || card.dataset.category === filter;
        card.hidden = !show;
        if (show) {
          card.style.animationDelay = `${(index % 3) * 55}ms`;
        }
      });
    }));
  }

  document.querySelectorAll('.service-row').forEach(row => row.addEventListener('click', () => {
    const wasOpen = row.getAttribute('aria-expanded') === 'true';
    document.querySelectorAll('.service-row').forEach(other => other.setAttribute('aria-expanded', 'false'));
    row.setAttribute('aria-expanded', String(!wasOpen));
  }));

  const modal = document.querySelector('#projectModal');
  const modalImage = document.querySelector('#modalImage');
  const modalTitle = document.querySelector('#modalTitle');
  const modalDescription = document.querySelector('#modalDescription');
  const modalInfo = document.querySelector('#modalInfo');
  const closeModal = () => {
    if (modal?.open) modal.close();
    document.body.classList.remove('modal-open');
  };

  const openLightbox = (imageSrc, title, desc) => {
    if (!modal || !imageSrc) return;
    if (modalImage) {
      modalImage.src = imageSrc;
      modalImage.alt = title || 'Producción audiovisual';
    }
    if (modalTitle) modalTitle.textContent = title || '';
    if (modalDescription) modalDescription.textContent = desc || '';
    if (modalInfo) {
      modalInfo.style.display = (!title && !desc) ? 'none' : 'block';
    }
    if (typeof modal.showModal === 'function') {
      modal.showModal();
      document.body.classList.add('modal-open');
    }
  };

  // Pinterest gallery pin cards (lightbox on click for uncropped full view)
  document.querySelectorAll('.pin-card--image').forEach(pin => {
    pin.addEventListener('click', () => {
      openLightbox(pin.dataset.image, pin.dataset.title, pin.dataset.caption);
    });
  });

  // ============================================
  // MODAL DE COTIZACIÓN MULTI-STEP
  // ============================================
  const quoteModal = document.querySelector('#quoteModal');
  const quoteModalClose = document.querySelector('#quoteModalClose');
  const quoteForm = document.querySelector('#quoteForm');
  const quoteSuccessView = document.querySelector('#quoteSuccessView');
  const quoteProgressBar = document.querySelector('#quoteProgressBar');
  const quoteStepperBtns = document.querySelectorAll('.quote-step-btn');
  const quoteStepPanes = document.querySelectorAll('.quote-step-pane');
  const checkObjetivoOtro = document.querySelector('#checkObjetivoOtro');
  const quoteOtherField = document.querySelector('#quoteOtherField');
  const btnSuccessClose = document.querySelector('#btnSuccessClose');
  const quoteSummaryCard = document.querySelector('#quoteSummaryCard');

  let currentQuoteStep = 1;
  const totalQuoteSteps = 5;

  const openQuoteModal = () => {
    if (!quoteModal) return;
    const modalHeader = quoteModal.querySelector('.quote-modal-header');
    if (modalHeader) modalHeader.style.display = 'block';
    if (typeof quoteModal.showModal === 'function') {
      quoteModal.showModal();
    } else {
      quoteModal.setAttribute('open', '');
    }
    document.body.classList.add('modal-open');
    if (quoteForm) quoteForm.style.display = 'block';
    if (quoteSuccessView) quoteSuccessView.style.display = 'none';
    goToQuoteStep(1);
  };

  const closeQuoteModal = () => {
    if (!quoteModal) return;
    const modalHeader = quoteModal.querySelector('.quote-modal-header');
    if (modalHeader) modalHeader.style.display = 'block';
    if (quoteModal.open) {
      if (typeof quoteModal.close === 'function') {
        quoteModal.close();
      } else {
        quoteModal.removeAttribute('open');
      }
    }
    document.body.classList.remove('modal-open');
  };

  const updateProgressBar = (step) => {
    if (!quoteProgressBar) return;
    const percent = Math.min((step / totalQuoteSteps) * 100, 100);
    quoteProgressBar.style.width = `${percent}%`;
  };

  const updateStepper = (step) => {
    quoteStepperBtns.forEach(btn => {
      const targetStep = parseInt(btn.dataset.stepTarget, 10);
      btn.classList.toggle('is-active', targetStep === step);
      btn.classList.toggle('is-completed', targetStep < step);
      if (targetStep === step) {
        btn.setAttribute('aria-current', 'step');
      } else {
        btn.removeAttribute('aria-current');
      }
    });
  };

  const goToQuoteStep = (step) => {
    if (step < 1 || step > totalQuoteSteps) return;
    currentQuoteStep = step;

    quoteStepPanes.forEach(pane => {
      const paneStep = parseInt(pane.dataset.step, 10);
      pane.classList.toggle('is-active', paneStep === step);
    });

    updateProgressBar(step);
    updateStepper(step);

    const card = quoteModal?.querySelector('.quote-modal-card');
    if (card) card.scrollTop = 0;
    const formEl = quoteModal?.querySelector('.quote-form');
    if (formEl) formEl.scrollTop = 0;

    const activePane = quoteModal?.querySelector(`.quote-step-pane[data-step="${step}"]`);
    if (window.innerWidth > 650) {
      const firstInput = activePane?.querySelector('input:not([type="hidden"]), textarea, select');
      firstInput?.focus();
    }
  };

  const markFieldInvalid = (element, isInvalid) => {
    const group = element.closest('.form-group');
    if (group) {
      group.classList.toggle('is-invalid', isInvalid);
    }
  };

  quoteForm?.querySelectorAll('input, textarea, select').forEach(input => {
    input.addEventListener('input', () => markFieldInvalid(input, false));
    input.addEventListener('change', () => markFieldInvalid(input, false));
  });

  const validateQuoteStep = (step) => {
    let isValid = true;
    let firstInvalid = null;

    if (step === 1) {
      const nombre = quoteForm.querySelector('#q_nombre');
      const marca = quoteForm.querySelector('#q_marca');
      const email = quoteForm.querySelector('#q_email');
      const telefono = quoteForm.querySelector('#q_telefono');

      if (!nombre?.value.trim()) {
        markFieldInvalid(nombre, true);
        isValid = false;
        if (!firstInvalid) firstInvalid = nombre;
      }
      if (!marca?.value.trim()) {
        markFieldInvalid(marca, true);
        isValid = false;
        if (!firstInvalid) firstInvalid = marca;
      }
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!email?.value.trim() || !emailRegex.test(email.value.trim())) {
        markFieldInvalid(email, true);
        isValid = false;
        if (!firstInvalid) firstInvalid = email;
      }
      if (!telefono?.value.trim() || telefono.value.trim().length < 7) {
        markFieldInvalid(telefono, true);
        isValid = false;
        if (!firstInvalid) firstInvalid = telefono;
      }
    } else if (step === 2) {
      const giro = quoteForm.querySelector('#q_giro');
      const tiempoSelected = quoteForm.querySelector('input[name="tiempo_mercado"]:checked');
      const canalesSelected = quoteForm.querySelector('input[name="canales_digitales"]:checked');

      if (!giro?.value.trim()) {
        markFieldInvalid(giro, true);
        isValid = false;
        if (!firstInvalid) firstInvalid = giro;
      }
      if (!tiempoSelected) {
        const group = quoteForm.querySelector('#groupTiempoMercado')?.closest('.form-group');
        group?.classList.add('is-invalid');
        isValid = false;
        if (!firstInvalid) firstInvalid = group;
      }
      if (!canalesSelected) {
        const group = quoteForm.querySelector('#groupCanalesDigitales')?.closest('.form-group');
        group?.classList.add('is-invalid');
        isValid = false;
        if (!firstInvalid) firstInvalid = group;
      }
    } else if (step === 3) {
      const resultadoChecked = quoteForm.querySelectorAll('input[name="resultado_ideal[]"]:checked');
      if (resultadoChecked.length === 0) {
        const group = quoteForm.querySelector('#groupResultadoIdeal')?.closest('.form-group');
        group?.classList.add('is-invalid');
        isValid = false;
        if (!firstInvalid) firstInvalid = group;
      }
    } else if (step === 4) {
      const clienteIdeal = quoteForm.querySelector('#q_cliente_ideal');
      const competidores = quoteForm.querySelector('#q_competidores');

      if (!clienteIdeal?.value.trim()) {
        markFieldInvalid(clienteIdeal, true);
        isValid = false;
        if (!firstInvalid) firstInvalid = clienteIdeal;
      }
      if (!competidores?.value.trim()) {
        markFieldInvalid(competidores, true);
        isValid = false;
        if (!firstInvalid) firstInvalid = competidores;
      }
    } else if (step === 5) {
      const presupuestoSelected = quoteForm.querySelector('input[name="presupuesto"]:checked');
      if (!presupuestoSelected) {
        const group = quoteForm.querySelector('#groupPresupuesto')?.closest('.form-group');
        group?.classList.add('is-invalid');
        isValid = false;
        if (!firstInvalid) firstInvalid = group;
      }
    }

    if (!isValid && firstInvalid) {
      if (typeof firstInvalid.focus === 'function') firstInvalid.focus();
      firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    return isValid;
  };

  quoteForm?.querySelectorAll('.btn-step-next').forEach(btn => {
    btn.addEventListener('click', () => {
      const nextStep = parseInt(btn.dataset.next, 10);
      if (validateQuoteStep(currentQuoteStep)) {
        goToQuoteStep(nextStep);
      }
    });
  });

  quoteForm?.querySelectorAll('.btn-step-prev').forEach(btn => {
    btn.addEventListener('click', () => {
      const prevStep = parseInt(btn.dataset.prev, 10);
      goToQuoteStep(prevStep);
    });
  });

  quoteStepperBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const targetStep = parseInt(btn.dataset.stepTarget, 10);
      if (targetStep < currentQuoteStep) {
        goToQuoteStep(targetStep);
      } else if (targetStep > currentQuoteStep) {
        if (validateQuoteStep(currentQuoteStep)) {
          goToQuoteStep(targetStep);
        }
      }
    });
  });

  checkObjetivoOtro?.addEventListener('change', () => {
    if (quoteOtherField) {
      quoteOtherField.style.display = checkObjetivoOtro.checked ? 'block' : 'none';
      if (checkObjetivoOtro.checked) {
        quoteOtherField.querySelector('input')?.focus();
      }
    }
  });

  const escapeHtml = (str) => {
    return String(str).replace(/[&<>'"]/g, tag => ({
      '&': '&amp;',
      '<': '&lt;',
      '>': '&gt;',
      "'": '&#39;',
      '"': '&quot;'
    }[tag] || tag));
  };

  quoteForm?.addEventListener('submit', async (e) => {
    e.preventDefault();
    if (!validateQuoteStep(5)) return;

    const submitBtn = quoteForm.querySelector('#btnSubmitQuote');
    const originalBtnText = submitBtn ? submitBtn.innerHTML : '<span>Enviar solicitud de cotización</span>';
    if (submitBtn) {
      submitBtn.disabled = true;
      submitBtn.innerHTML = '<span>Generando expediente PDF y enviando...</span>';
    }

    const formData = new FormData(quoteForm);
    const nombre = (formData.get('nombre') || '').toString();
    const marca = (formData.get('marca') || '').toString();
    const email = (formData.get('email') || '').toString();
    const tel = (formData.get('telefono') || '').toString();
    const presupuesto = (formData.get('presupuesto') || '').toString();

    try {
      const response = await fetch('/api/cotizar', {
        method: 'POST',
        body: formData,
        headers: {
          'X-Requested-With': 'XMLHttpRequest'
        }
      });

      const result = await response.json().catch(() => null);

      if (response.ok && result && result.success) {
        if (quoteSummaryCard) {
          const folio = result.folio || 'Registrado';
          const emailSent = !!result.emailSent;
          const statusHtml = emailSent
            ? '<span class="status-pill status-pill-success">✓ PDF generado y enviado a tu correo</span>'
            : '<span class="status-pill status-pill-info">📋 Folio registrado y expediente PDF archivado en servidor</span>';

          quoteSummaryCard.innerHTML = `
            <div class="summary-row">
              <span class="summary-label">Folio Oficial:</span>
              <span class="summary-val summary-folio-val">${escapeHtml(folio)}</span>
            </div>
            <div class="summary-row">
              <span class="summary-label">Solicitante:</span>
              <span class="summary-val">${escapeHtml(nombre)}</span>
            </div>
            <div class="summary-row">
              <span class="summary-label">Marca o Negocio:</span>
              <span class="summary-val">${escapeHtml(marca)}</span>
            </div>
            <div class="summary-row">
              <span class="summary-label">Correo:</span>
              <span class="summary-val">${escapeHtml(email)}</span>
            </div>
            <div class="summary-row">
              <span class="summary-label">WhatsApp / Tel:</span>
              <span class="summary-val">${escapeHtml(tel)}</span>
            </div>
            <div class="summary-row">
              <span class="summary-label">Presupuesto estimado:</span>
              <span class="summary-val">${escapeHtml(presupuesto)}</span>
            </div>
            <div class="summary-row summary-status-row">
              <span class="summary-label">Estado:</span>
              <span class="summary-val">${statusHtml}</span>
            </div>
          `;
        }

        const modalHeader = quoteModal.querySelector('.quote-modal-header');
        if (modalHeader) modalHeader.style.display = 'none';

        // Preload WhatsApp message with all lead details & PDF link
        const btnWhatsapp = quoteSuccessView?.querySelector('#btnQuoteWhatsapp');
        if (btnWhatsapp) {
          const waNumber = '526623422103';
          const originUrl = window.location.origin;
          const pdfUrl = result.pdfFile ? `${originUrl}/cotizacion/descargar/${encodeURIComponent(result.pdfFile)}` : '';

          let waMsg = `¡Hola Iván! 👋 Acabo de enviar mi solicitud de cotización en tu página web.\n\n` +
            `📋 *Folio:* ${folio}\n` +
            `👤 *Nombre:* ${nombre}\n` +
            `🏢 *Marca:* ${marca}\n` +
            `💰 *Presupuesto:* ${presupuesto}\n`;

          if (pdfUrl) {
            waMsg += `📄 *Expediente en PDF:* ${pdfUrl}\n`;
          }
          waMsg += `\nMe gustaría platicar contigo para revisar mi proyecto. ¡Muchas gracias!`;

          btnWhatsapp.href = `https://wa.me/${waNumber}?text=${encodeURIComponent(waMsg)}`;
        }

        if (quoteForm) quoteForm.style.display = 'none';
        if (quoteSuccessView) quoteSuccessView.style.display = 'block';
      } else {
        const errorMsg = (result && result.message) ? result.message : 'Ocurrió un error al procesar tu solicitud.';
        alert(errorMsg);
      }
    } catch (err) {
      console.warn('Network notice during quote submission:', err);
      if (quoteSummaryCard) {
        quoteSummaryCard.innerHTML = `
          <div class="summary-row">
            <span class="summary-label">Solicitante:</span>
            <span class="summary-val">${escapeHtml(nombre)}</span>
          </div>
          <div class="summary-row">
            <span class="summary-label">Marca / Negocio:</span>
            <span class="summary-val">${escapeHtml(marca)}</span>
          </div>
          <div class="summary-row">
            <span class="summary-label">Correo:</span>
            <span class="summary-val">${escapeHtml(email)}</span>
          </div>
          <div class="summary-row">
            <span class="summary-label">WhatsApp / Tel:</span>
            <span class="summary-val">${escapeHtml(tel)}</span>
          </div>
          <div class="summary-row">
            <span class="summary-label">Presupuesto:</span>
            <span class="summary-val">${escapeHtml(presupuesto)}</span>
          </div>
        `;
      }
      const modalHeader = quoteModal.querySelector('.quote-modal-header');
      if (modalHeader) modalHeader.style.display = 'none';

      const btnWhatsapp = quoteSuccessView?.querySelector('#btnQuoteWhatsapp');
      if (btnWhatsapp) {
        const waNumber = '526623422103';
        const waMsg = `¡Hola Iván! 👋 Llené el formulario de cotización en tu página web.\n\n` +
          `👤 *Nombre:* ${nombre}\n` +
          `🏢 *Marca:* ${marca}\n` +
          `💰 *Presupuesto:* ${presupuesto}\n\n` +
          `Me gustaría platicar contigo para conocer más detalles sobre mi proyecto. ¡Saludos!`;
        btnWhatsapp.href = `https://wa.me/${waNumber}?text=${encodeURIComponent(waMsg)}`;
      }

      if (quoteForm) quoteForm.style.display = 'none';
      if (quoteSuccessView) quoteSuccessView.style.display = 'block';
    } finally {
      if (submitBtn) {
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalBtnText;
      }
    }
  });

  btnSuccessClose?.addEventListener('click', () => {
    closeQuoteModal();
    setTimeout(() => {
      const modalHeader = quoteModal.querySelector('.quote-modal-header');
      if (modalHeader) modalHeader.style.display = 'block';
      quoteForm?.reset();
      goToQuoteStep(1);
      if (quoteOtherField) quoteOtherField.style.display = 'none';
    }, 300);
  });

  document.querySelectorAll('.btn-quote, [data-open-quote]').forEach(btn => {
    btn.addEventListener('click', event => {
      event.preventDefault();
      openQuoteModal();
    });
  });

  quoteModalClose?.addEventListener('click', closeQuoteModal);
  quoteModal?.addEventListener('click', event => {
    if (event.target === quoteModal) closeQuoteModal();
  });
  quoteModal?.addEventListener('close', () => document.body.classList.remove('modal-open'));

  document.querySelector('#modalClose')?.addEventListener('click', closeModal);
  modal?.addEventListener('click', event => {
    if (event.target === modal) closeModal();
  });
  modal?.addEventListener('close', () => document.body.classList.remove('modal-open'));

  const reelVideo = document.querySelector('#reelVideo');
  const reelPlayBtn = document.querySelector('#reelPlayBtn');
  const reelCard = document.querySelector('#reelFrontCard');
  if (reelVideo) {
    const toggleReel = e => {
      e?.preventDefault();
      if (reelVideo.paused) {
        reelVideo.play().catch(() => {});
        if (reelPlayBtn) reelPlayBtn.style.opacity = '0';
      } else {
        reelVideo.pause();
        if (reelPlayBtn) reelPlayBtn.style.opacity = '1';
      }
    };
    reelPlayBtn?.addEventListener('click', toggleReel);
    reelCard?.addEventListener('click', e => {
      if (e.target !== reelPlayBtn && !reelPlayBtn?.contains(e.target)) {
        toggleReel(e);
      }
    });
    reelVideo.addEventListener('play', () => {
      if (reelPlayBtn) reelPlayBtn.style.opacity = '0';
    });
    reelVideo.addEventListener('pause', () => {
      if (reelPlayBtn) reelPlayBtn.style.opacity = '1';
    });
  }

  // Auto-reproducción silenciosa de videos en galería (Pinterest)
  const pinVideos = document.querySelectorAll('.pin-video-player');
  if (pinVideos.length > 0) {
    pinVideos.forEach(video => {
      video.muted = true;
      video.defaultMuted = true;
    });

    if ('IntersectionObserver' in window) {
      const videoObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          const video = entry.target;
          if (entry.isIntersecting) {
            video.muted = true;
            video.play().catch(() => {});
          } else {
            video.pause();
          }
        });
      }, { threshold: 0.25 });

      pinVideos.forEach(video => videoObserver.observe(video));
    } else {
      pinVideos.forEach(video => {
        video.play().catch(() => {});
      });
    }
  }

  // Copiar correo al portapapeles con feedback visual en enlaces mailto:
  let copyToastTimeout;
  const showCopyToast = (email) => {
    let toast = document.querySelector('#copyToast');
    if (!toast) {
      toast = document.createElement('div');
      toast.id = 'copyToast';
      toast.className = 'copy-toast';
      toast.setAttribute('role', 'status');
      toast.setAttribute('aria-live', 'polite');
      document.body.appendChild(toast);
    }

    const gmailUrl = `https://mail.google.com/mail/?view=cm&fs=1&to=${encodeURIComponent(email)}`;

    toast.innerHTML = `
      <div class="copy-toast-icon" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <polyline points="20 6 9 17 4 12"></polyline>
        </svg>
      </div>
      <div class="copy-toast-content">
        <strong>¡Correo copiado al portapapeles!</strong>
        <span>${email}</span>
      </div>
      <a href="${gmailUrl}" target="_blank" rel="noopener" class="copy-toast-action" title="Redactar en Gmail">
        Abrir Gmail
        <svg viewBox="0 0 24 24" fill="currentColor" width="11" height="11" aria-hidden="true">
          <path d="M17.586 5H9a1 1 0 0 0 0 2h6.172L4.086 18.086a1 1 0 1 0 1.414 1.414L16.586 8.414V15a1 1 0 0 0 2 0V6.414A1.414 1.414 0 0 0 17.586 5z"/>
        </svg>
      </a>
    `;

    toast.classList.remove('is-active');
    void toast.offsetWidth;
    toast.classList.add('is-active');

    clearTimeout(copyToastTimeout);
    copyToastTimeout = setTimeout(() => {
      toast.classList.remove('is-active');
    }, 4000);
  };

  const copyEmailToClipboard = async (text) => {
    try {
      if (navigator.clipboard && window.isSecureContext) {
        await navigator.clipboard.writeText(text);
        return true;
      }
    } catch (_) {}

    try {
      const textArea = document.createElement('textarea');
      textArea.value = text;
      textArea.style.position = 'fixed';
      textArea.style.left = '-9999px';
      textArea.style.top = '-9999px';
      textArea.style.opacity = '0';
      document.body.appendChild(textArea);
      textArea.focus();
      textArea.select();
      const success = document.execCommand('copy');
      document.body.removeChild(textArea);
      return success;
    } catch (_) {
      return false;
    }
  };

  document.querySelectorAll('a[href^="mailto:"]').forEach(link => {
    link.addEventListener('click', () => {
      const href = link.getAttribute('href');
      const email = href.replace(/^mailto:/i, '').split('?')[0].trim();
      if (!email) return;

      copyEmailToClipboard(email);
      showCopyToast(email);
    });
  });

  document.addEventListener('keydown', event => {
    if (event.key === 'Escape') {
      closeModal();
      closeQuoteModal();
      closeNav();
    }
  });
})();
