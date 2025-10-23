  <main class="">
  <section class="nosotros">
    <div class="container">
      <h2 class="nosotros__title">
        Sobre Nosotros<span class="nosotros__dot">.</span>
      </h2>

      <div class="nosotros__intro">
          <img src="<?php echo $_ENV['HOST'] . '/img/estaticas/equipo'?>.jpg"  class="nosotros__photo" <?php aos_animation(); ?>>

        <div class="nosotros__desc" <?php aos_animation(); ?> >
          <p>Somos un grupo estudiantil apasionado por la óptica, la fonética, la astronomía y la ciencia en general. Nuestra misión es fomentar el interés y la difusión del conocimiento en estas áreas a través de actividades académicas, divulgativas y experimentales.</p>
          <p>Formamos parte de una comunidad universitaria comprometida con el aprendizaje y la innovación. Organizamos conferencias, talleres, observaciones astronómicas, experimentos de óptica y proyectos de investigación que permiten a nuestros miembros desarrollar habilidades científicas y técnicas, además de fortalecer el trabajo en equipo.</p>
          <p>Buscamos inspirar a futuros científicos e ingenieros, promoviendo el pensamiento crítico y la curiosidad científica . Nuestro objetivo es conectar a estudiantes con expertos del campo, ofreciendo oportunidades para el crecimiento académico y profesional dentro de un entorno colaborativo.</p>
          <p>Si te apasiona la luz, el universo y la ciencia en todas sus formas, ¡Te invitamos a unirte a nuestea comunidad y explorar con nosotros los secretos de la naturaleza!</p>
        </div>
      </div>

      <div class="nosotros__grid">
        <div class="nosotros__card" data-id="mision" <?php aos_animation(); ?>>
          <span class="nosotros__label">Misión <span class="nosotros__dot">.</span></span>
          <div class="nosotros__circle">
            <img src="/img/estaticas/mision.png" alt="">
          </div>
        </div>
        <div class="nosotros__card" data-id="vision" <?php aos_animation(); ?>>
          <span class="nosotros__label">Visión <span class="nosotros__dot">.</span></span>
          <div class="nosotros__circle">
            <img src="/img/estaticas/vision.png" alt="">
          </div>
        </div>
        <div class="nosotros__card" data-id="valores" <?php aos_animation(); ?>>
          <span class="nosotros__label">Valores <span class="nosotros__dot">.</span></span>
          <div class="nosotros__circle">
            <img src="/img/estaticas/valores.png" alt="">
          </div>
        </div>
        <div class="nosotros__card" data-id="objetivos" <?php aos_animation(); ?>>
          <span class="nosotros__label">Objetivos <span class="nosotros__dot">.</span></span>
          <div class="nosotros__circle">
            <img src="/img/estaticas/objetivos.png" alt="">
          </div>
        </div>
      </div>

      <div class="nosotros__info">
        <article class="nosotros__info-panel" id="info-mision" data-id="mision">
          <h3>Misión</h3>
          <p>Nuestra misión es fomentar el interés y la difusión del conocimiento en óptica, fotónica y astronomía mediante actividades académicas y divulgativas.</p>
        </article>

        <article class="nosotros__info-panel" id="info-vision" data-id="vision">
          <h3>Visión</h3>
          <p>Ser una comunidad referente en divulgación científica y formación de talento, conectando estudiantes con expertos del campo.</p>
        </article>

        <article class="nosotros__info-panel" id="info-valores" data-id="valores">
          <h3>Valores</h3>
          <p>Curiosidad, trabajo en equipo, ética, inclusión y rigor científico en todas nuestras actividades.</p>
        </article>

        <article class="nosotros__info-panel " id="info-objetivos" data-id="objetivos">
          <h3>Objetivos</h3>
          <p>Crear oportunidades de aprendizaje, impulsar proyectos y fortalecer habilidades científicas y técnicas de nuestros miembros.</p>
        </article>
      </div>

    </div>
  </section>

</main>
<script src="/js/nosotros.js"></script>

