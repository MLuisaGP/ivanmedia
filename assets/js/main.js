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
    if (backTop) backTop.classList.toggle('is-visible', window.scrollY > 600);
  };
  window.addEventListener('scroll', updateScroll, { passive: true });
  updateScroll();

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

  // Buttons for quote placeholder (inactive as requested by client)
  document.querySelectorAll('.btn-quote').forEach(btn => {
    btn.addEventListener('click', event => {
      event.preventDefault();
    });
  });

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
      closeNav();
    }
  });
})();
