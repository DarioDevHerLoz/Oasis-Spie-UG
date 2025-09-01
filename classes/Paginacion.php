<?php 

namespace Classes;

class Paginacion {
    public $pagina_actual;
    public $registros_por_pagina;
    public $total_registros;


    public function __construct($pagina_actual = 1, $registros_por_pagina=10, $total_registros=0)
    {
        $this->pagina_actual = (int) $pagina_actual;
        $this->registros_por_pagina = (int) $registros_por_pagina;
        $this->total_registros = (int) $total_registros;
    }

    public function offset() {
        //Registros por pagina =10 si pagina catual es 1 -1 = 0
        // por lo tanto el ofset es cero
        //en cambio si es 2 seria 2-1 = 1* 10 que son registros por pagina=10->offset
        return $this->registros_por_pagina * ($this->pagina_actual -1);
    }

    public function total_paginas() {
        //Calculasmo es total de las paginas a utilizar 
        //Total de registros entre total de registros por pagina
        //si son 20 registros totales y 5 registros por pagina
        // se hace 20/5 = 4 paginas totales
        $total = ceil($this->total_registros/$this->registros_por_pagina);
        //Validacion
        //Si total es cero entonces se asigna 1 si es mayor a cero
        // se asigna al mismo total
        $total == 0 ? $total = 1 : $total = $total;
        return $total;
    }

    public function pagina_anterior() {
        //Utilizamos la variable anterior para saber
        //Cuantas paginas hay antes que en la que estas
        $anterior = $this->pagina_actual -1;
        //Si hay mas paginas que cero regresas ese numero
        //Si no regresa falso
        return ($anterior > 0) ? $anterior: false;
    }

    public function pagina_siguiente(){
        //Utilizamos la var siguiente le sumamos 1 para saber cuantas paginas son mas una
        //si ese numero se pasa de las paginas totalesd quiere decir que no hay pag siguiente
        $siguiente = $this->pagina_actual + 1;
        return ($siguiente <= $this->total_paginas()) ? $siguiente : false;
    }

    public function enlace_anterior() {
        $html = '';
        if($this->pagina_anterior()){
             $html .= "<a class=\"paginacion__enlace paginacion__enlace--texto\" href=\"?page={$this->pagina_anterior()}\">&laquo; Anterior </a>";
        }
        return $html;
    }

    public function enlace_siguiente() {
        $html = '';
        if($this->pagina_siguiente()) {
            $html .= "<a class=\"paginacion__enlace paginacion__enlace--texto\" href=\"?page={$this->pagina_siguiente()}\">Siguiente &raquo;</a>";
        }
        return $html;
    }

    public function numeros_paginas() {
        $html = '';
        for($i = 1; $i <= $this->total_paginas(); $i++) {
            if($i === $this->pagina_actual ) {
                $html .= "<span class=\"paginacion__enlace paginacion__enlace--actual \">{$i}</span>";
            } else {
                $html .= "<a class=\"paginacion__enlace paginacion__enlace--numero \" href=\"?page={$i}\">{$i}</a>";
            }
        }

        return $html;
    }

    public function paginacion() {
        $html = '';
        if($this->total_registros > 1) {
            $html .= '<div class="paginacion">';
            $html .= $this->enlace_anterior();
            $html .= $this->numeros_paginas();
            $html .= $this->enlace_siguiente();
            $html .= '</div>';
        }

        return $html;
    }
}

?>