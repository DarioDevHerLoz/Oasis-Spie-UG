<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2> 
    <?php 
        require_once __DIR__ . '/../templates/alertas.php';
    ?>

    <form method="POST" action="/login" class="formulario">
        <div class="formulario__campo">
            <label for="usuario_correo" class="formulario__label">Email</label>
            <input
                type="email"
                class="formulario__input"
                placeholder="Tu Email"
                id="usuario_correo"
                name="usuario_correo"
                value="<?php $usuario->usuario_correo ?>"
            >
        </div>

        <div class="formulario__campo">
            <label for="usuario_password" class="formulario__label">Password</label>
            <input
                type="password"
                class="formulario__input"
                placeholder="Tu Password"
                id="usuario_password"
                name="usuario_password"
            >
        </div>

        <input type="submit" class="formulario__submit" value="Iniciar Sesión">
    </form>
</main>