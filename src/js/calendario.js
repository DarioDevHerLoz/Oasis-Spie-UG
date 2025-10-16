
(function(){

    document.addEventListener('DOMContentLoaded', function() {
        // Inicialización del calendario
        let calendarEl = document.getElementById('calendar');
        if(calendarEl){
            let calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'es',
                firstDay:1,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth'
                },
                dateClick: function(info){
                    mostrarFormulario(false, {
                        startStr: info.dateStr,
                        extendedProps: {}
                    })
                },
                events: 'http://localhost:3001/admin/calendario-astronomico/eventos',
                eventClick: function(info){
                     mostrarFormulario(true, info.event)
                }
            });
            calendar.render();

        function mostrarFormulario(editar = false, evento={}){
                const modal = document.createElement('DIV');
                modal.classList.add('modal');

                // Aquí reemplazamos la parte PHP por lógica JS
                let imagenHTML = '';
                if(evento && evento.extendedProps.imagen){
                    imagenHTML = `
                        <p class="formulario__texto">Imagen Actual:</p>
                        <div class="formulario__imagen">
                            <picture>
                                <img src="${evento.extendedProps.imagen}.png" alt="Imagen Evento" style="max-width:100%; border-radius:8px;">
                            </picture>
                        </div>
                    `;
                }

                modal.innerHTML = `
                    <form class="modal__formulario nueva-tarea">
                    <legend class="modal__legend">${editar ? 'Editar Evento Astronómico' : 'Añade un Nuevo Evento Astronómico'}</legend>
                        <div class="${editar ? 'formulario__contenido--actualizar' : ''}">
                            <div class="formulario__imagen">
                                ${imagenHTML}
                            </div>
                            <div>
                                <input type="hidden" id="txtID" name="txtID" value="${evento.id ? evento.id : ''}"/>
                                <div class="formulario__campo">
                                    <label>Título del Evento Astronómico</label>
                                    <input 
                                        type="text"
                                        id="titulo"
                                        name="titulo"
                                        placeholder="Añadir título"
                                        value="${editar && evento.title ? evento.title : ''}"
                                    />
                                </div>
                                <div class="formulario__campo">
                                    <label>Descripción del Evento Astronómico</label>
                                    <textarea id="descripcion" rows="5">${editar && evento.extendedProps ? (evento.extendedProps.descripcion || '') : ''}</textarea>    
                                </div>

                                <div class="formulario__campo">
                                    <label>Fecha:</label>
                                    <input type="text" id="txtFecha" value="${evento && evento.startStr ? evento.startStr.split('T')[0] : ''}" disabled/>
                                </div>

                                <div class="formulario__campo">
                                    <label>Color:</label>
                                    <input type="color" id="txtColor" value="${editar && evento.backgroundColor ? evento.backgroundColor : '#838E83'}" />
                                </div>

                                <div class="formulario__campo">
                                    <label for="imagen" class="formulario__label">Imagen</label>
                                    <input type="file" id="imagen" accept="image/png, image/jpeg" class="formulario__input formulario__input--file"/>    
                                </div>
                            </div>
                        </div>
                        

                            <div class="opciones">
                                <input type="submit" class="submit-nuevo-evento" value="${editar ? 'Guardar Cambios' : 'Añadir Evento'}"/>
                                ${editar ? '<input type="button" class="submit-eliminar-evento" value="Eliminar Evento"/>' : ''}
                                <button type="button" class="cerrar-modal">Cancelar</button>
                            </div>
                        
                        
                    </form>
                `;
                // Animación de entrada
                setTimeout(() => {
                    const formulario = document.querySelector('.modal__formulario')
                    formulario.classList.add('animar')
                }, 0);
                const formulario = modal.querySelector('.modal__formulario');
                const eliminar = modal.querySelector('.submit-eliminar-evento')

                // Cerrar modal
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
                formulario.addEventListener('submit', (e) => {
                    e.preventDefault();

                    const titulo = formulario.querySelector('#titulo').value.trim();
                    const descripcion = formulario.querySelector('#descripcion').value.trim();
                    const color = formulario.querySelector('#txtColor').value; 
                    const fecha = formulario.querySelector('#txtFecha').value;
                    const imagenInput = formulario.querySelector('input[type="file"]');
                    const archivoImagen = imagenInput.files[0]

                    if (!titulo) return mostrarAlerta('El nombre del Evento Astronomico es obligatorio', 'error', formulario.querySelector('legend'));
                    if (!descripcion) return mostrarAlerta('La descripcion del evento es obligatoria', 'error', formulario.querySelector('legend'));
                    if (!archivoImagen) return mostrarAlerta('La imagen es obligatoria', 'error', formulario.querySelector('legend'));

                    if (editar) {
                        actualizarEvento({
                            id: evento.id,
                            title: titulo,
                            descripcion,
                            color,
                            fecha,
                            archivoImagen // si el usuario subió nueva imagen
                        });
                    } else {
                        agregarEvento({
                            title: titulo,
                            extendedProps: { descripcion, imagen: archivoImagen.name },
                            startStr: fecha,
                            backgroundColor: color,
                            archivoImagen
                        }, calendar);
                    }

                    modal.remove();
                });
                
                if(eliminar){
                    eliminar.addEventListener('click', (e) => {
                        eliminarEvento({id: evento.id})
                        modal.remove();
                    })
                }
                
                
                document.querySelector('.dashboard').appendChild(modal);
                // Mostrar modal inmediatamente
                modal.classList.add('is-open');
                document.body.classList.add('no-scroll');
            }
        }

        async function agregarEvento(evento, calendar){
           
            const datos = new FormData();
            datos.append('calendario_titulo', evento.title);
            datos.append('calendario_descripcion', evento.extendedProps.descripcion);
            datos.append('calendario_fecha', evento.startStr);
            datos.append('calendario_color', evento.backgroundColor);
            if(evento.archivoImagen){
                datos.append('calendario_imagen', evento.archivoImagen); // enviar el archivo REAL
            }

            try {
                const url = 'http://localhost:3001/admin/calendario-astronomico/crear';
                const respuesta = await fetch(url, {
                    method: 'POST',
                    body: datos,
                });
                const resultado = await respuesta.json();
                console.log(resultado);
                mostrarAlerta(resultado.mensaje, resultado.tipo, document.querySelector('.modal__formulario legend'));
                if(resultado.tipo === 'exito'){
                    calendar.refetchEvents();
                    const modal = document.querySelector('.modal');
                    setTimeout(() => 
                        modal.remove()
                    , 3000);
                }
            } catch (error) {
                console.log(error);
            }
        }

        async function actualizarEvento(evento){
            const datos = new FormData();
            datos.append('id', evento.id);
            datos.append('calendario_titulo', evento.title);
            datos.append('calendario_descripcion', evento.descripcion);
            datos.append('calendario_fecha', evento.fecha);
            datos.append('calendario_color', evento.color);
            if(evento.archivoImagen){
                datos.append('calendario_imagen', evento.archivoImagen); // si se reemplazó la imagen
            }

            try {
                const url = 'http://localhost:3001/admin/calendario-astronomico/actualizar';
                const respuesta = await fetch(url, {
                    method: 'POST',
                    body: datos
                });
                const resultado = await respuesta.json();
                console.log(resultado);

                mostrarAlerta(resultado.mensaje, resultado.tipo, document.querySelector('.dashboard'));
                if(resultado.tipo === 'exito'){
                    // refresca el calendario
                    const calendarEl = document.getElementById('calendar');
                    const calendar = FullCalendar.getCalendar(calendarEl);
                    calendar.refetchEvents();
                }
            } catch (error) {
                console.error(error);
            }
        }
               //Funcion para eliminar evento
        async function eliminarEvento(evento){
            const datos = new FormData();
            datos.append('id', evento.id);
            try {
                const url = 'http://localhost:3001/admin/calendario-astronomico/eliminar';
                const respuesta = await fetch(url, {
                    method: 'POST',
                    body: datos
                });
                const resultado = await respuesta.json();
                console.log(resultado);

                mostrarAlerta(resultado.mensaje, resultado.tipo, document.querySelector('.dashboard'));
                if(resultado.tipo === 'exito'){
                    // refresca el calendario
                    const calendarEl = document.getElementById('calendar');
                    const calendar = FullCalendar.getCalendar(calendarEl);
                    calendar.refetchEvents();
                }
            } catch (error) {
                console.error(error);
            }
        }

        function mostrarAlerta(mensaje, tipo,referencia){
            const alertaPrevia=document.querySelector('.alerta');
            if(alertaPrevia){
                alertaPrevia.remove();
            }
            const alerta = document.createElement('DIV');
            alerta.classList.add('alerta', `alerta__${tipo}`)
            alerta.textContent = mensaje;
            referencia.parentElement.insertBefore(alerta, referencia)
            setTimeout(() => {
                alerta.remove();
                document.body.classList.remove('no-scroll')
            }, 5000)
        }
    })
    
        
})();


