const buttons = document.querySelectorAll('.feature')
const panels = document.querySelectorAll('.nosotros__info-panel')

buttons.forEach(btn => {
    
    btn.addEventListener('click', () => {
        const id = btn.dataset.id

        // Marcar botón activo
        buttons.forEach(b => {
            const active = b === btn
            b.classList.toggle('is-active', active)
            b.setAttribute('aria-expanded', String(active))
        })

        // Mostrar el Panel Correspondiente (sólo uno activo)
        panels.forEach(p => p.classList.toggle('is-active', p.dataset === id))
    })
})