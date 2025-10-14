// /js/noticias-modal.js
(() => {
  const modal      = document.getElementById('noticiasModal');
  const titleEl    = document.getElementById('noticiasModalTitle');
  const dateEl     = document.getElementById('noticiasModalDate');
  const bodyEl     = document.getElementById('noticiasModalBody');
  const overlayEl  = modal?.querySelector('[data-modal-close]');
  const closeBtn   = modal?.querySelector('.modal__close');

  let lastActive = null;

  function openModal({ title, dateISO, content }) {
    if (!modal) return;

    titleEl.textContent = title || '';
    if (dateISO) {
      // Muestra fecha legible (DD/MM/AAAA). Ajusta si prefieres otro formato.
      const d = new Date(dateISO);
      const human = isNaN(d.getTime())
        ? dateISO
        : d.toLocaleDateString('es-MX', { day: '2-digit', month: '2-digit', year: 'numeric' });
      dateEl.setAttribute('datetime', dateISO);
      dateEl.textContent = human;
    } else {
      dateEl.textContent = '';
      dateEl.removeAttribute('datetime');
    }
    bodyEl.textContent = content || '';

    modal.classList.add('is-open');
    document.body.classList.add('no-scroll');

    // Mover foco dentro del modal
    closeBtn?.focus();
  }

  function closeModal() {
    if (!modal) return;
    modal.classList.remove('is-open');
    document.body.classList.remove('no-scroll');
    // Restaurar foco al disparador
    if (lastActive && typeof lastActive.focus === 'function') {
      lastActive.focus();
    }
    lastActive = null;
  }

  // Delegación de click en tarjetas
  document.addEventListener('click', (ev) => {
    const card = ev.target.closest('.noticias-card[data-noticias]');
    if (card) {
      ev.preventDefault();
      lastActive = document.activeElement || card;

      const title   = card.getAttribute('data-title') || card.querySelector('.noticias-card__title')?.textContent?.trim();
      const dateISO = card.getAttribute('data-date')  || card.querySelector('.noticias-card__date')?.getAttribute('datetime');
      const content = card.getAttribute('data-content') || card.querySelector('[data-fulltext]')?.textContent?.trim() || '';

      openModal({ title, dateISO, content });
      return;
    }

    // Cerrar si click en overlay o botón con data-modal-close
    if (ev.target.matches('[data-modal-close]')) {
      closeModal();
    }
  });

  // Cerrar con ESC
  document.addEventListener('keydown', (ev) => {
    if (ev.key === 'Escape' && modal?.classList.contains('is-open')) {
      closeModal();
    }
  });

  // Previene scroll del fondo al hacer scroll dentro del modal
  // (ya bloqueamos con .no-scroll, pero por si alguna plataforma se cuela)
  modal?.addEventListener('wheel', (e) => e.stopPropagation(), { passive: true });
})();
