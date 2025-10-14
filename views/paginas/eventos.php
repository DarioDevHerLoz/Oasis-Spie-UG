<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Nuestros Eventos</title>
  <!-- Compila tu styles.scss a styles.css y enlázalo abajo -->
  <link rel="stylesheet" href="styles.css">
</head>
<body>

  <main class="wrapper">

    <!-- ======== LISTADO ======== -->
    <section id="inicio" class="section eventos">
      <h1 class="h1"><span class="red">Nuestros</span> Eventos<span class="red">.</span></h1>
      <p class="sub">Descubre nuestros eventos del área de tu interés</p>

      <div class="grid">
        <!-- Tarjeta 1 -->
        <article class="card">
          <div class="media">
            <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?q=80&w=1470&auto=format&fit=crop" alt="portada curso telescopio">
          </div>
          <div class="content">
            <div class="title">Curso ¿Cómo usar un telescopio?</div>
            <div class="meta">
              <div>October 15, 2025</div>
              <div>9:00 am – 10:00 am</div>
              <div>División Campus Irapuato Salamanca, Gto., Aula 102</div>
            </div>
          </div>
          <div class="foot">
            <a class="btn" href="#evento-1">Ver Más</a>
          </div>
        </article>

        <!-- Tarjeta 2 (mismo contenido de ejemplo) -->
        <article class="card">
          <div class="media">
            <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?q=80&w=1470&auto=format&fit=crop" alt="portada curso telescopio">
          </div>
          <div class="content">
            <div class="title">Curso ¿Cómo usar un telescopio?</div>
            <div class="meta">
              <div>October 15, 2025</div>
              <div>9:00 am – 10:00 am</div>
              <div>División Campus Irapuato Salamanca, Gto., Aula 102</div>
            </div>
          </div>
          <div class="foot">
            <a class="btn" href="#evento-1">Ver Más</a>
          </div>
        </article>

        <!-- Tarjeta 3 -->
        <article class="card">
          <div class="media">
            <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?q=80&w=1470&auto=format&fit=crop" alt="portada curso telescopio">
          </div>
          <div class="content">
            <div class="title">Curso ¿Cómo usar un telescopio?</div>
            <div class="meta">
              <div>October 15, 2025</div>
              <div>9:00 am – 10:00 am</div>
              <div>División Campus Irapuato Salamanca, Gto., Aula 102</div>
            </div>
          </div>
          <div class="foot">
            <a class="btn" href="#evento-1">Ver Más</a>
          </div>
        </article>
      </div>
    </section>

    <!-- ======== DETALLE ======== -->
    <section id="evento-1" class="section detail-page">
    <a class="back" href="#inicio">‹ Regresar</a>

    <!-- HERO -->
    <header class="hero">
      <h2 class="title-xl">Curso ¿Cómo usar un telescopio?</h2>

      <div class="meta-grid">
        <div class="meta-item">
          <small>Fecha</small>
          <strong>October 15, 2025</strong>
        </div>
        <div class="meta-item">
          <small>Horario</small>
          <strong>9:00 am – 10:00 am</strong>
        </div>
        <div class="meta-item">
          <small>Ubicación</small>
          <strong>División Campus Irapuato Salamanca, Gto., Aula 102</strong>
        </div>
        <div class="meta-item">
          <small>Asistentes</small>
          <strong>150</strong>
        </div>
      </div>
    </header>

    <!-- LAYOUT -->
    <div class="layout">
      <!-- Columna principal -->
      <article class="block prose">
        <h3 class="h2">Sobre este evento</h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse potenti.
          Proin malesuada orci id tincidunt gravida. Sed venenatis, libero non tincidunt
          convallis, odio lorem sagittis turpis, vel bibendum ligula metus id leo.
        </p>
        <p>
          Aenean ut massa et lacus sagittis euismod. Fusce feugiat, ex id interdum pharetra,
          metus odio cursus arcu, eget ultricies mi mi eget enim. Ut eget fermentum ipsum.
          Nullam sagittis semper quam, sit amet faucibus metus tristique nec.
        </p>
        <p>
          Vestibulum cursus turpis vitae suscipit tristique. Sed at nibh tristique, congue
          elit eget, rhoncus libero. Cras tristique urna nec dui interdum, nec maximus justo
          consectetur.
        </p>
      </article>

      <!-- Aside sticky -->
      <aside class="aside">
        <div class="block speakers">
          <h3 class="h2">Ponentes</h3>

          <div class="speaker">
            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=1000&auto=format&fit=crop" alt="Foto de Jorge Álvarez" />
            <div>
              <div class="spk-name">Jorge Álvarez</div>
              <div class="spk-role">Ing. en Mecánica, ingeniero de la NASA</div>
            </div>
          </div>

          <!-- Duplicar .speaker para más ponentes -->
        </div>
      </aside>
    </div>
  </section>


  </main>
</body>
</html>
