<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Nuestro Equipo</title>
  <!-- Compila styles.scss a styles.css en tu pipeline -->
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <header class="hero">
    <h1 class="hero__title">
      <span class="accent">Nuestro</span> Equipo<span class="dot">.</span>
    </h1>

    <nav class="tabs" role="tablist" aria-label="Secciones del equipo">
      <button class="tabs__item is-active" role="tab" aria-selected="true" aria-controls="panel-asesor" id="tab-asesor" data-target="panel-asesor">
        <span class="accent">Asesor</span> Académico
      </button>
      <button class="tabs__item" role="tab" aria-selected="false" aria-controls="panel-comite" id="tab-comite" data-target="panel-comite">
        <span class="accent">Comité</span> Directivo
      </button>
      <button class="tabs__item" role="tab" aria-selected="false" aria-controls="panel-coordinadores" id="tab-coordinadores" data-target="panel-coordinadores">
        Coordinadores<span class="dot">.</span>
      </button>
      <button class="tabs__item" role="tab" aria-selected="false" aria-controls="panel-miembros" id="tab-miembros" data-target="panel-miembros">
        Miembros<span class="dot">.</span>
      </button>
    </nav>
  </header>

  <main class="container">
    <!-- Panel: Asesor Académico -->
    <section class="panel is-active" id="panel-asesor" role="tabpanel" aria-labelledby="tab-asesor">
      <h2 class="panel__title"><span class="accent">Asesor</span> Académico</h2>

      <article class="profile profile--wide">
        <div class="profile__avatar">
          <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=640&auto=format&fit=crop" alt="Retrato del Dr. Oleksey Shulika" />
        </div>

        <div class="profile__content">
          <h3 class="profile__name">Dr. Oleksey Shulika</h3>
          <p class="profile__bio">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ultricies, lorem eu auctor
            efficitur, turpis felis iaculis erat, euismod vestibulum leo libero ac elit. Nullam sollicitudin
            dolor a urna vulputate, vel malesuada leo feugiat. Fusce lacinia, orci nec tincidunt euismod.
          </p>
          <a class="profile__email" href="mailto:correo@correo.com">correo@correo.com</a>
        </div>
      </article>
    </section>

    <!-- Panel: Comité Directivo (ejemplo con 2 personas) -->
    <section class="panel" id="panel-comite" role="tabpanel" aria-labelledby="tab-comite" hidden>
      <h2 class="panel__title"><span class="accent">Comité</span> Directivo</h2>

      <div class="hlist hlist--snap">
        <button class="card"
          data-name="Alejandra Torres"
          data-role="Presidenta del Comité"
          data-email="alejandra.torres@correo.com"
          data-bio="Responsable de definir la visión estratégica del grupo, coordinar reuniones y asegurar el cumplimiento de los objetivos."
          data-img="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=640&auto=format&fit=crop">
          <span class="card__title">Presidenta</span>
          <span class="card__avatar">
            <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=320&auto=format&fit=crop" alt="" />
          </span>
          <span class="card__name">Alejandra Torres</span>
          <span class="card__email">alejandra.torres@correo.com</span>
        </button>

        <button class="card"
          data-name="Luis Pardo"
          data-role="Secretario Técnico"
          data-email="luis.pardo@correo.com"
          data-bio="Administra actas, seguimiento de acuerdos y comunicación con las diferentes células de trabajo."
          data-img="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?q=80&w=640&auto=format&fit=crop">
          <span class="card__title">Secretario</span>
          <span class="card__avatar">
            <img src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?q=80&w=320&auto=format&fit=crop" alt="" />
          </span>
          <span class="card__name">Luis Pardo</span>
          <span class="card__email">luis.pardo@correo.com</span>
        </button>
      </div>
    </section>

    <!-- Panel: Coordinadores -->
    <section class="panel" id="panel-coordinadores" role="tabpanel" aria-labelledby="tab-coordinadores" hidden>
      <h2 class="panel__title">Coordinadores<span class="dot">.</span></h2>

      <div class="grid grid--3">
        <button class="card"
          data-name="Mario Lourdes"
          data-role="Coordinador 1 — Estudiante"
          data-email="mario.lourdes@correo.com"
          data-bio="Coordina logística y comunicación con los equipos de trabajo, asegurando entregables a tiempo."
          data-img="https://images.unsplash.com/photo-1602471615287-4655e99e1c5a?q=80&w=640&auto=format&fit=crop">
          <span class="card__title">Coordinador 1</span>
          <span class="card__avatar">
            <img src="https://images.unsplash.com/photo-1602471615287-4655e99e1c5a?q=80&w=320&auto=format&fit=crop" alt="" />
          </span>
          <span class="card__meta"><strong>Estudiante.</strong> Mario Lourdes</span>
          <span class="card__email">mario.lourdes@correo.com</span>
        </button>

        <button class="card"
          data-name="Antonio López"
          data-role="Coordinador 2 — Estudiante"
          data-email="antonio.lopez@correo.com"
          data-bio="Responsable de la planeación semanal y el tablero de seguimiento de tareas."
          data-img="https://images.unsplash.com/photo-1607746882042-944635dfe10e?q=80&w=640&auto=format&fit=crop">
          <span class="card__title">Coordinador 2</span>
          <span class="card__avatar">
            <img src="https://images.unsplash.com/photo-1607746882042-944635dfe10e?q=80&w=320&auto=format&fit=crop" alt="" />
          </span>
          <span class="card__meta"><strong>Estudiante.</strong> Antonio López</span>
          <span class="card__email">antonio.lopez@correo.com</span>
        </button>

        <button class="card"
          data-name="Renato de León"
          data-role="Coordinador 3 — Estudiante"
          data-email="renato.deleon@correo.com"
          data-bio="Lidera la integración técnica y coordina revisiones de calidad."
          data-img="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=640&auto=format&fit=crop">
          <span class="card__title">Coordinador 3</span>
          <span class="card__avatar">
            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=320&auto=format&fit=crop" alt="" />
          </span>
          <span class="card__meta"><strong>Estudiante.</strong> Renato de León</span>
          <span class="card__email">renato.deleon@correo.com</span>
        </button>
      </div>
    </section>

    <!-- Panel: Miembros -->
    <section class="panel" id="panel-miembros" role="tabpanel" aria-labelledby="tab-miembros" hidden>
      <h2 class="panel__title">Miembros<span class="dot">.</span></h2>

      <div class="grid grid--4">
        <!-- Duplica/edita estas tarjetas según tu data -->
        <button class="card"
          data-name="Camila Reyes"
          data-role="Investigación"
          data-email="camila.reyes@correo.com"
          data-bio="Analiza literatura, levanta requerimientos y documenta hallazgos clave."
          data-img="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=640&auto=format&fit=crop">
          <span class="card__title">Investigación</span>
          <span class="card__avatar">
            <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=320&auto=format&fit=crop" alt="" />
          </span>
          <span class="card__name">Camila Reyes</span>
          <span class="card__email">camila.reyes@correo.com</span>
        </button>

        <button class="card"
          data-name="Jorge Díaz"
          data-role="Desarrollo"
          data-email="jorge.diaz@correo.com"
          data-bio="Full-stack. Se encarga de la arquitectura, despliegues y estándares de código."
          data-img="https://images.unsplash.com/photo-1547425260-76bcadfb4f2c?q=80&w=640&auto=format&fit=crop">
          <span class="card__title">Desarrollo</span>
          <span class="card__avatar">
            <img src="https://images.unsplash.com/photo-1547425260-76bcadfb4f2c?q=80&w=320&auto=format&fit=crop" alt="" />
          </span>
          <span class="card__name">Jorge Díaz</span>
          <span class="card__email">jorge.diaz@correo.com</span>
        </button>

        <button class="card"
          data-name="Valeria Núñez"
          data-role="UX/UI"
          data-email="valeria.nunez@correo.com"
          data-bio="Diseña flujos, prototipos y mantiene el sistema de diseño."
          data-img="https://images.unsplash.com/photo-1527980965255-d3b416303d12?q=80&w=640&auto=format&fit=crop">
          <span class="card__title">UX/UI</span>
          <span class="card__avatar">
            <img src="https://images.unsplash.com/photo-1527980965255-d3b416303d12?q=80&w=320&auto=format&fit=crop" alt="" />
          </span>
          <span class="card__name">Valeria Núñez</span>
          <span class="card__email">valeria.nunez@correo.com</span>
        </button>

        <button class="card"
          data-name="Daniel Romero"
          data-role="Data"
          data-email="daniel.romero@correo.com"
          data-bio="ETL, métricas y tableros. Enlace con finanzas y operaciones."
          data-img="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=640&auto=format&fit=crop">
          <span class="card__title">Data</span>
          <span class="card__avatar">
            <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=320&auto=format&fit=crop" alt="" />
          </span>
          <span class="card__name">Daniel Romero</span>
          <span class="card__email">daniel.romero@correo.com</span>
        </button>
      </div>
    </section>
  </main>

  <!-- Modal de detalle -->
  <div class="modal" id="member-modal" aria-hidden="true" aria-labelledby="modal-title" role="dialog">
    <div class="modal__backdrop" data-close-modal></div>
    <div class="modal__dialog" role="document">
      <button class="modal__close" aria-label="Cerrar" title="Cerrar" data-close-modal>×</button>

      <div class="modal__header">
        <div class="modal__avatar">
          <img id="modal-img" alt="" />
        </div>
        <div class="modal__titlebox">
          <h3 id="modal-title"></h3>
          <p id="modal-role" class="muted"></p>
          <a id="modal-email" class="profile__email" href="#"></a>
        </div>
      </div>

      <div class="modal__body">
        <p id="modal-bio"></p>
      </div>
    </div>
  </div>

  <script src="/js/equipo.js" defer></script>
</body>
</html>
