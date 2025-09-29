<aside class="dashboard__sidebar">
    <nav class="dashboard__menu">
        <a href="/admin/dashboard" class="dashboard__enlace <?php echo pagina_actual('/dashboard') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-house"></i>
            Inicio
        </a>

        <a href="/admin/blog" class="dashboard__enlace <?php echo pagina_actual('/blog') ? 'dashboard__enlace--actual' : ''; ?> ">
            <i class="fa-solid fa-note-sticky"></i>
            Blog
        </a>

        <a href="/admin/eventos" class="dashboard__enlace <?php echo pagina_actual('/eventos') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-calendar"></i>
            Eventos
        </a>

        <a href="/admin/noticias" class="dashboard__enlace <?php echo pagina_actual('/noticias') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-newspaper"></i>
            Noticias
        </a>

        <a href="/admin/integrantes" class="dashboard__enlace <?php echo pagina_actual('/integrantes') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-users"></i>
            Integrantes
        </a>

        <a href="/admin/ponentes" class="dashboard__enlace <?php echo pagina_actual('/ponentes') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-microphone"></i>
            Ponentes
        </a>
 
        <a href="/admin/usuarios" class="dashboard__enlace <?php echo pagina_actual('/usuario') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-user"></i>
            Usuarios
            
        </a>

        <a href="/admin/horas" class="dashboard__enlace <?php echo pagina_actual('/horas') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-regular fa-clock"></i>
            Horas
        </a>
         
        <a href="/admin/dias" class="dashboard__enlace <?php echo pagina_actual('/dias') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-sun"></i>
            Dias
        </a>
    </nav>
</aside>