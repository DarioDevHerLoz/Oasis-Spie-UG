document.addEventListener('DOMContentLoaded', () => {
  const cards  = document.querySelectorAll('.nosotros__card');
  const panels = document.querySelectorAll('.nosotros__info-panel');

  const closeAll = () => {
    cards.forEach(c => {
      c.classList.remove('is-active');
      c.setAttribute('aria-expanded', 'false');
    });
    panels.forEach(p => p.classList.remove('is-active'));
  };

  cards.forEach(card => {
    // Activar panel
    card.addEventListener('click', (e) => {
      e.stopPropagation(); // no cerrar por el listener global
      const id = card.dataset.id;
      const willActivate = !card.classList.contains('is-active');

      // Reset
      closeAll();

      // Activar solo si procede
      if (willActivate) {
        card.classList.add('is-active');
        card.setAttribute('aria-expanded', 'true');
        panels.forEach(p => p.classList.toggle('is-active', p.dataset.id === id));
      }
    });

    // Accesibilidad: activar con Enter o Space
    card.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        card.click();
      }
    });
  });

  // Clic en cualquier parte de la página -> cerrar si hay algo activo
  document.addEventListener('click', (e) => {
    const anyActive = Array.from(panels).some(p => p.classList.contains('is-active'));
    if (!anyActive) return;

    const clickedInsideCard  = e.target.closest('.nosotros__card');
    const clickedInsidePanel = e.target.closest('.nosotros__info-panel');

    if (!clickedInsideCard && !clickedInsidePanel) {
      closeAll();
    }
  });

});
