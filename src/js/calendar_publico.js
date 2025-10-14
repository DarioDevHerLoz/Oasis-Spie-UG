(function(){ 
    document.addEventListener('DOMContentLoaded', function(){
        //Inicializacion del calendario
        let calendarPublic = document.getElementById('calendario')
        if(calendarPublic){
            let calendario = new FullCalendar.Calendar(calendarPublic,{
                initialView: 'dayGridMonth',
                locale: 'es',
                firstDay:1,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth'
                },
                events: 'http://localhost:3001/admin/calendario-astronomico/eventos',
                eventClick: function(info){
                    console.log('Diste Click....');
                    console.log(info.event.title)
                     mostrarModal(info.event)
                }
            });
            calendario.render();
            function mostrarModal(evento = {}) {
                const modal = document.createElement('DIV');
                modal.classList.add('modal');

                // Datos que vienen de FullCalendar
                const titulo = evento.title || "Evento sin título";
                const descripcion = evento.extendedProps.descripcion;
                const imagen = evento.extendedProps.imagen 
                    ? `<img src="${evento.extendedProps.imagen}.png" alt="${titulo}" style="max-width:100%; border-radius:8px;">`
                    : `<p style="font-style:italic;">Sin imagen disponible</p>`;

                modal.innerHTML = `
                    <div class="modal__formulario">
                        <div class="modal__formulario-titulo">
                            <h2 >${titulo}</h2>
                        </div>
                        <div class="formulario__contenido--actualizar">
                            <div class="modal__imagen">${imagen}</div>
                            <div class="modal__descripcion">
                                <p>${descripcion}</p>
                            </div>
                        </div>
                        <div class="opciones">
                            <button type="button" class="cerrar-modal">Cancelar</button>
                        </div>
                    </div>
                `;

                // Animación de entrada
                setTimeout(() => {
                    const contenedor = modal.querySelector('.modal__formulario');
                    contenedor.classList.add('animar');
                }, 0);

                modal.querySelector('.cerrar-modal').addEventListener('click', (e) => {
                    e.preventDefault()
                    if(e.target.classList.contains('cerrar-modal')){
                        const formulario = document.querySelector('.modal__formulario')
                        formulario.classList.add('cerrar')
                        setTimeout(() => {
                        modal.remove();
                        },500)
                    }
                });

                document.querySelector('.body').appendChild(modal);
            }
        }
    })
})();