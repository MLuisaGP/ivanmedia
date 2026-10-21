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
  const cards = document.querySelectorAll('.project-card');
  filters.forEach(button => button.addEventListener('click', () => {
    const filter = button.dataset.filter;
    filters.forEach(item => item.classList.toggle('is-active', item === button));
    cards.forEach((card, index) => {
      const show = filter === 'todos' || card.dataset.category === filter;
      card.hidden = !show;
      if (show) {
        card.style.animationDelay = `${(index % 3) * 55}ms`;
      }
    });
  }));

  document.querySelectorAll('.service-row').forEach(row => row.addEventListener('click', () => {
    const wasOpen = row.getAttribute('aria-expanded') === 'true';
    document.querySelectorAll('.service-row').forEach(other => other.setAttribute('aria-expanded', 'false'));
    row.setAttribute('aria-expanded', String(!wasOpen));
  }));

  const modal = document.querySelector('#projectModal');
  const modalImage = document.querySelector('#modalImage');
  const modalTitle = document.querySelector('#modalTitle');
  const modalDescription = document.querySelector('#modalDescription');
  const closeModal = () => {
    if (modal?.open) modal.close();
    document.body.classList.remove('modal-open');
  };
  cards.forEach(card => card.addEventListener('click', () => {
    if (!modal) return;
    modalImage.src = card.dataset.image;
    modalImage.alt = card.dataset.title || 'Proyecto';
    modalTitle.textContent = card.dataset.title || '';
    modalDescription.textContent = card.dataset.description || '';
    if (typeof modal.showModal === 'function') {
      modal.showModal();
      document.body.classList.add('modal-open');
    }
  }));
  document.querySelector('#modalClose')?.addEventListener('click', closeModal);
  modal?.addEventListener('click', event => {
    if (event.target === modal) closeModal();
  });
  modal?.addEventListener('close', () => document.body.classList.remove('modal-open'));
  document.addEventListener('keydown', event => {
    if (event.key === 'Escape') {
      closeModal();
      closeNav();
    }
  });
})();