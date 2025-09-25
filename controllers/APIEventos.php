<?php

namespace Controllers;

use Model\EventoHorario;

class APIEventos {

    public static function index() {

        $dia_eve_id = $_GET['dia_eve_id'] ?? '';
        $evento_aula = $_GET['evento_aula'] ?? '';
        $evento_fecha = $_GET['evento_fecha'] ?? '';

        $dia_eve_id = filter_var($dia_eve_id, FILTER_VALIDATE_INT);
        

        if(!$dia_eve_id || !$evento_aula || $evento_fecha) {
           echo json_encode([]);
           return;
        }

        // Consultar la base de datos
        $eventos = EventoHorario::whereArray(['dia_eve_id' => $dia_eve_id, 'evento_aula' => $evento_aula, 'evento_fecha' => $evento_fecha]) ?? [];
        echo json_encode($eventos);
    }
}