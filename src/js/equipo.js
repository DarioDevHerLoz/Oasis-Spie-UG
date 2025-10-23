(function(){
  // Tabs
  const tabs = document.querySelectorAll('.tabs__item');
  const panels = document.querySelectorAll('.panel');

  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      const targetId = tab.dataset.target;

      // Estado visual/ARIA
      tabs.forEach(t => {
        t.classList.toggle('is-active', t === tab);
        t.setAttribute('aria-selected', t === tab ? 'true' : 'false');
      });

      panels.forEach(p => {
        const isTarget = p.id === targetId;
        p.toggleAttribute('hidden', !isTarget);
        p.classList.toggle('is-active', isTarget);
      });
    });
  });

  // Modal
  const modal = document.getElementById('member-modal');
  const modalImg = document.getElementById('modal-img');
  const modalTitle = document.getElementById('modal-title');
  const modalRole = document.getElementById('modal-role');
  const modalEmail = document.getElementById('modal-email');
  const modalBio = document.getElementById('modal-bio');

  function openModal({ name, role, email, bio, img }) {
    modalTitle.textContent = name || '';
    modalRole.textContent = role || '';
    modalEmail.textContent = email || '';
    modalEmail.href = email ? `mailto:${email}` : '#';
    modalImg.src = img || '';
    modalImg.alt = `Retrato de ${name || 'miembro'}`;
    modalBio.textContent = bio || '';

    modal.classList.add('is-open');
    modal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
  }

  function closeModal() {
    modal.classList.remove('is-open');
    modal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  }

  // Abre modal desde cualquier .card
  document.addEventListener('click', (ev) => {
    const btn = ev.target.closest('.card');
    if (!btn) return;

    const data = {
      name: btn.dataset.name,
      role: btn.dataset.role,
      email: btn.dataset.email,
      bio: btn.dataset.bio,
      img: btn.dataset.img
    };
    openModal(data);
  });

  // Cerrar modal
  modal.addEventListener('click', (ev) => {
    if (ev.target.matches('[data-close-modal], .modal__backdrop')) {
      closeModal();
    }
  });
  document.addEventListener('keydown', (ev) => {
    if (ev.key === 'Escape' && modal.classList.contains('is-open')) closeModal();
  });

})();

