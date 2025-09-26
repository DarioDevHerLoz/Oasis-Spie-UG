(function(){
    const ponentesInput = document.querySelector('#ponentes')

    if(ponentesInput){
        let ponentes = [];
        let ponentesFiltrados = []

        const listadoPonentes = document.querySelector('#listado-ponentes')
        const ponentesHidden = document.querySelector('[name="pon_eve_id"]')

        obtenerPonentes();
        ponentesInput.addEventListener('input', buscarPonentes)

        if(ponentesHidden.value){
            (async() => {
                const ponente = await obtenerPonente(ponentesHidden.value)
                const { ponentes_nombre, ponentes_apellido } = ponente

                //Insertar en el HTML
                const ponenteDOM = document.createElement('LI')
                ponenteDOM.classList.add('listado-ponentes__ponente', 'listado-ponentes__ponente--seleccionado')
                ponenteDOM.textContent = `${ponentes_nombre} ${ponentes_apellido}`

                listadoPonentes.appendChild(ponenteDOM)
            })()
        }

        async function obtenerPonentes() {
            const url = `/api/ponentes`
            const respuesta = await fetch(url)
            const resultado = await respuesta.json();
            formatearPonentes(resultado)
        }

        async function obtenerPonente(id){
            const url = `/api/ponente?id=${id}`
            const respuesta = await fetch(url)
            const resultado = await respuesta.json()
            return resultado
        }

        function formatearPonentes(arrayPonentes = []){
            ponentes = arrayPonentes.map( ponente => {
                return{
                    nombre: `${ponente.ponentes_nombre.trim()} ${ponente.ponentes_apellido.trim()}`,
                    id: ponente.id
                }
            })
        }

        function buscarPonentes(e){
            const busqueda = e.target.value

            if(busqueda.length > 2){
                const expresion = new RegExp(busqueda, "i")
                ponentesFiltrados = ponentes.filter(ponente => {
                    if(ponente.nombre.toLowerCase().search(expresion) != -1 ){
                        return ponente
                    }
                })
            }else {
                ponentesFiltrados = []
            }
            mostrarPonentes()
        }

        function mostrarPonentes(){
            while(listadoPonentes.firstChild){
                listadoPonentes.removeChild(listadoPonentes.firstChild)
            }

            if(ponentesFiltrados.length > 0) {
                ponentesFiltrados.forEach(ponente => {
                    const ponenteHTML = document.createElement('LI')
                    ponenteHTML.classList.add('listado-ponentes__ponente')
                    ponenteHTML.textContent = ponente.nombre;
                    ponenteHTML.dataset.ponenteId = ponente.id
                    ponenteHTML.onclick = seleccionarPonente

                    //Añadir al Dom
                    listadoPonentes.appendChild(ponenteHTML)
                })
            } else {
                const noResultados = document.createElement('P')
                noResultados.classList.add('listado-ponentes__no-resultado')
                noResultados.textContent = 'No hay resultados para tu busqueda'
                listadoPonentes.appendChild(noResultados)
            }
        }

        function seleccionarPonente(e){
            const ponente = e.target

            //Remover la clase previa
            const ponentePrevio = document.querySelector('.listado-ponentes__ponente--seleccionado')
            if(ponentePrevio){
                ponentePrevio.classList.remove('listado-ponentes__ponente--seleccionado')
            }
            ponente.classList.add('listado-ponentes__ponente--seleccionado')
            ponentesHidden.value = ponente.dataset.ponenteId
        }
    }
    
})();