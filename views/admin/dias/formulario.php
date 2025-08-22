<fieldset class="formulario__fildset">
    <legend class="formulario__legend">Agregar Dias</legend>
    <div class="formulario__campo">
        <label for="dia_nombre" class="formulario__label">
            Agregue el Dia
        </label>
        <input 
            type="text"
            class="formulario__input"
            id="dia_nombre"
            name="dia_nombre"
            value="<?php echo $dia->dia_nombre; ''; ?>"
            placeholder="Ej. Lunes, Martes, Miercoles"
        >
    </div>
</fieldset>