<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Del Evento</legend>

    <div class="formulario__campo">
        <label for="evento_nombre" class="formulario__label">Nombre Evento</label>
        <input
            type="text"
            class="formulario__input"
            id="evento_nombre"
            name="evento_nombre"
            placeholder="Nombre Del Evento"
            value="<?php echo $evento->evento_nombre ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="evento_descripcion" class="formulario__label">Descripción</label>
        <textarea
            class="formulario__input"
            id="evento_descripcion"
            name="evento_descripcion"
            placeholder="Descripción Evento"
            rows="8"
        ><?php echo $evento->evento_descripcion; ?></textarea>
    </div>

    <div class="formulario__campo">
        <label for="categoria" class="formulario__label">Selecciona el día</label>

        <div class="formulario__radio">
            <?php foreach($dias as $dia) { ?>
                <div>
                    <label for="<?php echo strtolower($dia->dia_nombre); ?>"><?php echo $dia->dia_nombre; ?></label>
                    <input
                        type="radio"
                        id="<?php echo strtolower($dia->dia_nombre); ?>"
                        name="dia"
                        value="<?php echo $dia->id; ?>"
                        <?php echo ($evento->dia_eve_id === $dia->id) ? 'checked' : ''; ?>
                    />
                </div>
            <?php } ?>
        </div>

        <input type="hidden" name="dia_eve_id" value="<?php echo $evento->dia_eve_id; ?>">
    </div>

    <div class="formulario__campo">
        <label for="evento_fecha" class="formulario__label">La fecha del Evento</label>
        <input 
            type="date"
            class="formulario__input"
            id="evento_fecha"
            name="evento_fecha"
            placeholder="Salon del Evento"
            value="<?php echo $evento->evento_fecha ?? ''; ?>"
            min = "<?php echo date('Y-m-d'); ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="evento_aula" class="formulario__label">Ingrese el Salon del Evento</label>
        <input 
            type="text"
            class="formulario__input"
            id="evento_aula"
            name="evento_aula"
            placeholder="Salon del Evento"
            value="<?php echo $evento->evento_aula ?? ''; ?>"
            minlength="1"
            maxlength="5"
        >
    </div>

    <div id="horas" class="formulario__campo">
        <label class="formulario__label">Seleccionar Hora</label>

        <ul id="horas" class="horas">
            <?php foreach($horas as $hora) { ?>
                <li data-hora-id="<?php echo $hora->id; ?>" class="horas__hora horas__hora--deshabilitada"><?php echo $hora->hora_hora; ?></li>
            <?php } ?>
        </ul>

        <input type="hidden" name="hor_eve_id" value="<?php echo $evento->hor_eve_id; ?>">
    </div>
</fieldset>

<fieldset>
    <legend class="formulario__legend">Información Extra</legend>


    <div class="formulario__campo">
        <label for="ponentes" class="formulario__label">Ponente</label>
        <input
            type="text"
            class="formulario__input"
            id="ponentes"
            placeholder="Buscar Ponente"
        >
        <ul id="listado-ponentes" class="listado-ponentes"></ul>

        <input type="hidden" name="pon_eve_id" value="<?php echo $evento->pon_eve_id; ?>">
    </div>

    <div class="formulario__campo">
        <label for="evento_disponibles" class="formulario__label">Lugares Disponibles</label>
        <input 
            type="number"
            class="formulario__input"
            id="evento_disponibles"
            name="evento_disponibles"
            placeholder="Lugares Disponible"
            value="<?php echo $evento->evento_disponibles ?? ''; ?>"
            min="1"
            max = "200"
        >
    </div>

    <div class="formulario__campo">
        <label for="evento_imagen" class="formulario__label">Imagen</label>
        <input
            type="file"
            class="formulario__input formulario__input--file"
            id="evento_imagen"
            name="evento_imagen"
        >
    </div>

    <?php if(isset($evento->imagen_actual)) { ?>
        <p class="formulario__texto">Imagen Actual:</p>
        <div class="formulario__imagen">
            <picture>
                <source srcset="<?php echo $_ENV['APP_URL'] . '/img/eventos/' . $evento->evento_imagen; ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['APP_URL'] . '/img/eventos/' . $evento->evento_imagen; ?>.png" type="image/png">
                <img src="<?php echo $_ENV['APP_URL'] . '/img/eventos/' . $evento->evento_imagen; ?>.png" alt="Imagen Ponente">
            </picture>
        </div>

    <?php } ?>
</fieldset>
