<fieldset class="formulario__fildset">
    <legend class="formulario__legend"> Agregar Integrante</legend>
    <div class="formulario__campo">
        <label for="integrantes_nombre" class="formulario__label">
            Nombre del Integrante
        </label>
        <input 
            type="text"
            class="formulario__input"
            id="integrantes_nombre"
            name="integrantes_nombre"
            value="<?php echo $integrante->integrantes_nombre;?>"
            placeholder="Ej. Jaime"
        >
    </div>

    <div class="formulario__campo">
        <label for="integrantes_apellido" class="formulario__label">
            Apellido del Integrante
        </label>
        <input 
            type="text"
            class="formulario__input"
            id="integrantes_apellido"
            name="integrantes_apellido"
            value="<?php echo $integrante->integrantes_apellido;?>"
            placeholder="Ej. Hernandez"
        >
    </div>

    <div class="formulario__campo">
        <label for="integrantes_correo" class="formulario__label">
            Correo del Integrante
        </label>
        <input 
            type="email"
            class="formulario__input"
            id="integrantes_correo"
            name="integrantes_correo"
            value="<?php echo $integrante->integrantes_correo;?>"
            placeholder="Agregue su correo Institucional"
        >
    </div>

    <div class="formulario__campo">
        <label for="integrantes_rol" class="formulario__label">
            Seleccione el rol
        </label>
        <select
            class="formulario__select"
            id="integrantes_rol" 
            name="integrantes_rol" 
            value="<?php echo $integrante->integrantes_rol ?>"
        >
            <option value="">- Seleccionar -</option>
                <option value="Asesor Academico" <?php echo $integrante->integrantes_rol === 'Asesor Academico' ? 'selected' : '' ?>>Asesor Academico</option>
                <option value="Presidente" <?php echo $integrante->integrantes_rol === 'Presidente' ? 'selected' : '' ?>>Presidente</option>
                <option value="Vicepresidente" <?php echo $integrante->integrantes_rol === 'Vicepresidente' ? 'selected' : '' ?>>Vicepresidente</option>
                <option value="Tesorero" <?php echo $integrante->integrantes_rol === 'Tesorero' ? 'selected' : '' ?>>Tesorero</option>
                <option value="Miembro" <?php echo $integrante->integrantes_rol === 'Miembro' ? 'selected' : '' ?>>Miembro</option>
        </select>
    </div>

    <div class="formulario__campo">
        <label for="integrantes_imagen" class="formulario__label">
            Imagen del Integrante
        </label>
        <input 
            type="file"
            class="formulario__input formulario__input--file"
            id="integrantes_imagen"
            name="integrantes_imagen"
        >
    </div>

    <?php if(isset($integrante->imagen_actual)){?>
        <p class="formulario__texto">Imagen Actual:</p>
        <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/img/integrantes/' . $integrante->integrantes_imagen; ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['HOST'] . '/img/integrantes/' . $integrante->integrantes_imagen; ?>.png" type="image/png">
                <img src="<?php echo $_ENV['HOST'] . '/img/integrantes/' . $integrante->integrantes_imagen;?>.png" alt="Imagen Ponente">
        </picture>
    <?php }?>
</fieldset>