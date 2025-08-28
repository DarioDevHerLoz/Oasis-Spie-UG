<fildset class="formulario__fildset">
    <legend class="formulario__legend">Agregar Hora</legend>
    <div class="formulario__campo">
        <label
            for="hora_hora" 
            class="formulario__label">
        Seleccione la Hora
        </label>
        <input 
            type="time"
            class="formulario__input"
            id="hora_hora"
            name="hora_hora"
            value="<?php echo $hora->hora_hora;?>"
        >
    </div>
</fildset>