<fieldset class="formulario__fildset">
    <legend class="formulario__legend"> Agregar Usuario</legend>
    <div class="formulario__campo">
        <label for="usuario_nombre" class="formulario__label">
            Nombre del Usuario
        </label>
        <input 
            type="text"
            class="formulario__input"
            id="usuario_nombre"
            name="usuario_nombre"
            value="<?php echo $usuario->usuario_nombre;?>"
            placeholder="Ej. Jaime"
        >
    </div>

    <div class="formulario__campo">
        <label for="usuario_apellido" class="formulario__label">
            Apellido del Usuario
        </label>
        <input 
            type="text"
            class="formulario__input"
            id="usuario_apellido"
            name="usuario_apellido"
            value="<?php echo $usuario->usuario_apellido;?>"
            placeholder="Ej. Hernandez"
        >
    </div>

    <div class="formulario__campo">
        <label for="usuario_correo" class="formulario__label">
            Correo del Usuario
        </label>
        <input 
            type="email"
            class="formulario__input"
            id="usuario_correo"
            name="usuario_correo"
            value="<?php echo $usuario->usuario_correo;?>"
            placeholder="Agregue su correo Institucional"
        >
    </div>

    <?php if(!$usuario->id) { ?>
        <div class="formulario__campo">
            <label for="usuario_password" class="formulario__label">
                Password del Usuario
            </label>
            <input 
                type="password"
                class="formulario__input"
                id="usuario_password"
                name="usuario_password"
                placeholder="Ingrese su password"
            >
        </div>
        <div class="formulario__campo">
                <label for="usuario_password2" class="formulario__label">Repetir Password</label>
                <input
                    type="password"
                    class="formulario__input"
                    placeholder="Repetir Password"
                    id="usuario_password2"
                    name="usuario_password2"
                >
        </div>
    <?php }else {?>
        <div class="formulario__campo">
            <label for="usuario_password_actual" class="formulario__label">
                Ingresa Tu password para confirmar cambios
            </label>
            <input 
                type="password"
                class="formulario__input"
                id="usuario_password_actual"
                name="usuario_password_actual"
                placeholder="Ingrese su password"
            >
        </div>
    <?php }?>
</fieldset>