(function(){
    const horas = document.querySelector('#horas')
    

    if(horas){
        const aula = document.querySelector('[name="evento_aula"]')
        const dias = document.querySelectorAll('[name="dia"]')
        const fecha = document.querySelector('[name="evento_fecha"]')
        const inputHiddenDia = document.querySelector('[name="dia_eve_id"]')
        const inputHiddenHora = document.querySelector('[name="hor_eve_id"]')

        aula.addEventListener('change', terminoBusqueda)
        dias.forEach( dia => dia.addEventListener('change', terminoBusqueda))
        fecha.addEventListener('change', terminoBusqueda)

        let busqueda = {
            aula: aula.value || '',
            dia: +inputHiddenDia.value || '',
            fecha: fecha.value || ''
        }
        

        if(!Object.values(busqueda).includes('')){
            
            (async () => {
                await buscarEventos();

                const id = inputHiddenHora.value;

                //Resaltar la hora actual
                const horaseleccionada = document.querySelector(`[data-hora-id=${id}]`)
                horaseleccionada.classList.remove('horas__hora--deshabilitada')
                horaseleccionada.classList.add('horas__hora--seleccionada')

                horaseleccionada.onclick = seleccionarHora;
            })()
        }

        function terminoBusqueda(e){
            busqueda[e.target.name] = e.target.value;
            //Reiniciar los campos ocultos y el selector de horas
            inputHiddenHora.value = ''
            inputHiddenDia.value = '';

            const horaPrevia = document.querySelector('.horas__hora--seleccionada')
            if(horaPrevia){
                horaPrevia.classList.remove('horas__hora--seleccionada')
            }

            if(!Object.values(busqueda).includes('')){
                return
            }
            buscarEventos();
        }

        async function buscarEventos() {
            const {aula, dia, fecha} = busqueda
            const url = `${location.origin}/api/eventos-horario?dia_eve_id=${dia}&evento_aula=${aula}&evento_fecha=${fecha}`;
            
            const resultado = await fetch(url);
            const eventos = await resultado.json();
            obtenerHorasDisponibles(eventos);
        }

        function obtenerHorasDisponibles(eventos){
            //Reiniciar las horas
            const listadoHoras = document.querySelectorAll('#horas li');
            listadoHoras.forEach(li => li.classList.add('horas__hora--deshabilitada'))

            // Comprobar eventos ya tomados, y quitar la variable de deshabilitado
            const  horasTomadas = eventos.map(evento => evento.hor_eve_id);
            const listadoHorasArray = Array.from(listadoHoras)

            const resultado = listadoHorasArray.filter( li => !horasTomadas.includes(li.dataset.horaId))
            resultado.forEach(li => li.classList.remove('horas__hora--deshabilitada'))

            const horasDisponibles = document.querySelectorAll('#horas li:not(.horas__hora--deshabilitada)')
            horasDisponibles.forEach( hora => hora.addEventListener('click', seleccionarHora));

        }

        function seleccionarHora(e){
            //Deshabilitar la hora previa, hay un nuevo click
            const horaPrevia = document.querySelector('.horas__hora--seleccionada')
            if(horaPrevia){
                horaPrevia.classList.remove('horas__hora--seleccionada')
            }

            e.target.classList.add('horas__hora--seleccionada')

            inputHiddenHora.value = e.target.dataset.horaId

            //Llenar el campo  oculto de dia
            inputHiddenDia.value = document.querySelector('[name="dia"]:checked').value
        }
    }
    
})();