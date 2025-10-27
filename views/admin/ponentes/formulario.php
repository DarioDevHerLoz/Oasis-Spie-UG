<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Personal</legend>

    <div class="formulario__campo">
        <label for="ponentes_nombre" class="formulario__label">Nombre</label>
        <input
            type="text"
            class="formulario__input"
            id="ponentes_nombre"
            name="ponentes_nombre"
            placeholder="Nombre Ponente"
            value="<?php echo $ponente->ponentes_nombre ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="ponentes_apellido" class="formulario__label">Apellido</label>
        <input
            type="text"
            class="formulario__input"
            id="ponentes_apellido"
            name="ponentes_apellido"
            placeholder="Apellido Ponente"
            value="<?php echo $ponente->ponentes_apellido ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="ponentes_imagen" class="formulario__label">Imagen</label>
        <input
            type="file"
            class="formulario__input formulario__input--file"
            id="ponentes_imagen"
            name="ponentes_imagen"
            
        >
    </div>

    <?php if(isset($ponente->imagen_actual)) { ?>
        <p class="formulario__texto">Imagen Actual:</p>
        <div class="formulario__imagen">
            <picture>
                <source srcset="<?php echo $_ENV['APP_URL'] . '/img/ponentes/' . $ponente->ponentes_imagen; ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['APP_URL'] . '/img/ponentes/' . $ponente->ponentes_imagen; ?>.png" type="image/png">
                <img src="<?php echo $_ENV['APP_URL'] . '/img/ponentes/' . $ponente->ponentes_imagen; ?>.png" alt="Imagen Ponente">
            </picture>
        </div>

    <?php } ?>
</fieldset>


<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Extra</legend>

    <div class="formulario__campo">
        <label for="ponentes_habilidades_input" class="formulario__label">Áreas de Experiencia o Profesiones (separadas por coma)</label>
        <input
            type="text"
            class="formulario__input"
            id="ponentes_habilidades_input"
            placeholder="Ej. Dr en fisica, Dr en fotonica, Maestria en ciencias de la comptacion"
        >

        <div id="ponentes_habilidades" class="formulario__listado"></div>
        <input type="hidden" name="ponentes_habilidades" value="<?php echo $ponente->ponentes_habilidades ?? ''; ?>"> 
    </div>
</fieldset>
