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
  const updateScroll = () => {
    const max = document.documentElement.scrollHeight - window.innerHeight;
    if (progress) progress.style.width = `${max > 0 ? (window.scrollY / max) * 100 : 0}%`;
    if (backTop) backTop.classList.toggle('is-visible', window.scrollY > 300);
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

  // Counter animation for statistics (Quién soy)
  const statCounters = document.querySelectorAll('.stat-counter');
  if (statCounters.length > 0) {
    const prefersReducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    const animateCounter = (el) => {
      const target = parseInt(el.dataset.target, 10);
      if (isNaN(target)) return;
      const prefix = el.dataset.prefix || '';
      const suffix = el.dataset.suffix || '';
      const duration = 1600;
      let startTime = null;

      const updateCount = (timestamp) => {
        if (!startTime) startTime = timestamp;
        const elapsed = timestamp - startTime;
        const progress = Math.min(elapsed / duration, 1);
        // Easing: easeOutCubic (starts briskly, smoothly decelerates to final number)
        const easeProgress = 1 - Math.pow(1 - progress, 3);
        const current = Math.round(easeProgress * target);

        el.textContent = `${prefix}${current}${suffix}`;

        if (progress < 1) {
          window.requestAnimationFrame(updateCount);
        } else {
          el.textContent = `${prefix}${target}${suffix}`;
        }
      };

      window.requestAnimationFrame(updateCount);
    };

    if (!prefersReducedMotion) {
      if ('IntersectionObserver' in window) {
        // Reset to 0 before scrolling into view so the counter starts from 0
        statCounters.forEach(counter => {
          const prefix = counter.dataset.prefix || '';
          const suffix = counter.dataset.suffix || '';
          counter.textContent = `${prefix}0${suffix}`;
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
    const firstInput = activePane?.querySelector('input:not([type="hidden"]), textarea, select');
    firstInput?.focus();
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

  quoteForm?.addEventListener('submit', (e) => {
    e.preventDefault();
    if (!validateQuoteStep(5)) return;

    const submitBtn = quoteForm.querySelector('#btnSubmitQuote');
    if (submitBtn) {
      submitBtn.disabled = true;
      submitBtn.innerHTML = '<span>Procesando solicitud...</span>';
    }

    const formData = new FormData(quoteForm);

    if (quoteSummaryCard) {
      const nombre = (formData.get('nombre') || '').toString();
      const marca = (formData.get('marca') || '').toString();
      const email = (formData.get('email') || '').toString();
      const tel = (formData.get('telefono') || '').toString();
      const presupuesto = (formData.get('presupuesto') || '').toString();

      quoteSummaryCard.innerHTML = `
        <div class="summary-row"><span>Solicitante:</span> <strong>${escapeHtml(nombre)}</strong></div>
        <div class="summary-row"><span>Marca / Negocio:</span> <strong>${escapeHtml(marca)}</strong></div>
        <div class="summary-row"><span>Correo:</span> <strong>${escapeHtml(email)}</strong></div>
        <div class="summary-row"><span>WhatsApp / Tel:</span> <strong>${escapeHtml(tel)}</strong></div>
        <div class="summary-row"><span>Presupuesto estimado:</span> <strong>${escapeHtml(presupuesto)}</strong></div>
      `;
    }

    setTimeout(() => {
      if (quoteForm) quoteForm.style.display = 'none';
      if (quoteSuccessView) quoteSuccessView.style.display = 'block';
      if (submitBtn) {
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<span>Enviar solicitud de cotización</span>';
      }
    }, 400);
  });

  btnSuccessClose?.addEventListener('click', () => {
    closeQuoteModal();
    setTimeout(() => {
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

  document.addEventListener('keydown', event => {
    if (event.key === 'Escape') {
      closeModal();
      closeQuoteModal();
      closeNav();
    }
  });
})();
