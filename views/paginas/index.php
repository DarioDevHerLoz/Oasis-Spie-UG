<main class="principal">
    <section class="principal__hero">
        <div class="principal__hero--imagen">
            <picture>
                    <img width="200" src="<?php echo $_ENV['APP_URL'] . '/img/estaticas/hero.jpg'?>" alt="Imagen Noticia">
            </picture>
        </div>
        <div class="principal__hero--texto">
            <div class="">
                <h1> <span class="principal__hero--rojo">OASIS</span> SPIE UG <span class="principal__hero--rojo">.</span> </h1>
                <div>
                    <p>Iluminando el conocimiento: optica, fotonica, astronomia y ciencia para el futuro</p>
                </div> 
            </div>
        </div>
    </section>

    <section class="nosotros">
        <div class="container">
            <h2 class="nosotros__title">
                <span class="nosotros__dot">Sobre</span> Nosotros<span class="nosotros__dot">.</span>
            </h2>

            <div class="nosotros__intro">
                <img src="../../public/img/"  class="nosotros__photo" <?php aos_animation(); ?>>

                <div class="nosotros__desc" <?php aos_animation(); ?> >
                    <p>Somos un grupo estudiantil apasionado por la óptica, la fonética, la astronomía y la ciencia en general. Nuestra misión es fomentar el interés y la difusión del conocimiento en estas áreas a través de actividades académicas, divulgativas y experimentales.</p>
                    <p>Formamos parte de una comunidad universitaria comprometida con el aprendizaje y la innovación. Organizamos conferencias, talleres, observaciones astronómicas, experimentos de óptica y proyectos de investigación que permiten a nuestros miembros desarrollar habilidades científicas y técnicas, además de fortalecer el trabajo en equipo.</p>
                    <p>Buscamos inspirar a futuros científicos e ingenieros, promoviendo el pensamiento crítico y la curiosidad científica . Nuestro objetivo es conectar a estudiantes con expertos del campo, ofreciendo oportunidades para el crecimiento académico y profesional dentro de un entorno colaborativo.</p>
                    <p>Si te apasiona la luz, el universo y la ciencia en todas sus formas, ¡Te invitamos a unirte a nuestea comunidad y explorar con nosotros los secretos de la naturaleza!</p>
                    <div class="nosotros__link">
                        <a href="/nosotros">Saber mas...</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
    <?php foreach($equipo as $integrante){ ?>
    <!-- Panel: Asesor Académico -->
     <?php if($integrante->integrantes_rol === 'Asesor Academico'){?>
      <section class="panel is-active" id="panel-asesor" role="tabpanel" aria-labelledby="tab-asesor">
        <?php $nombre= explode(' ', $integrante->integrantes_rol);?>
        <h2 class="panel__title"><span class="accent"><?php echo $nombre[0]; ?></span> <?php echo $nombre[1]; ?> </h2>
        <article class="profile profile--wide">
          <div class="profile__avatar">
            <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/img/integrantes/' . $integrante->integrantes_imagen; ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['HOST'] . '/img/integrantes/' . $integrante->integrantes_imagen; ?>.png" type="image/png">
                <img src="<?php echo $_ENV['HOST'] . '/img/integrantes/' . $integrante->integrantes_imagen; ?>.png" alt="Imagen Asesor Academico">
            </picture>
          </div>
          <div class="profile__content">
            <h3 class="profile__name">Dr. <?php echo $integrante->integrantes_nombre . ' ' .$integrante->integrantes_apellido; ?></h3>
            <p class="profile__bio">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ultricies, lorem eu auctor
              efficitur, turpis felis iaculis erat, euismod vestibulum leo libero ac elit. Nullam sollicitudin
              dolor a urna vulputate, vel malesuada leo feugiat. Fusce lacinia, orci nec tincidunt euismod.
            </p>
            <a class="profile__email" href="mailto:correo@correo.com"><?php echo $integrante->integrantes_correo; ?></a>
          </div>
        </article>
      </section>
      <?php }?>
    <?php }?>

    <!-- Panel: Comité Directivo (ejemplo con 2 personas) -->
    <section class="panel" id="panel-comite" role="tabpanel" aria-labelledby="tab-comite">
      <h2 class="panel__title"><span class="accent">Comité</span> Directivo</h2>
      <div class="hlist hlist--snap">
        <?php foreach($equipo as $integrante){ ?>
          <?php if(
            $integrante->integrantes_rol === 'Presidente' || 
            $integrante->integrantes_rol === 'Vicepresidente' || 
            $integrante->integrantes_rol === 'Tesorero'
          ){ ?>
          <button class="card"
            data-name="<?= $integrante->integrantes_nombre ?>"
            data-role="<?= $integrante->integrantes_rol ?>"
            data-email="<?= $integrante->integrantes_correo ?>"
            data-img="<?= $integrante->integrantes_imagen ?>">
            <span class="card__title"><?= $integrante->integrantes_rol ?></span>
            <span class="card__avatar">
              <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/img/integrantes/' . $integrante->integrantes_imagen; ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['HOST'] . '/img/integrantes/' . $integrante->integrantes_imagen; ?>.png" type="image/png">
                <img src="<?php echo $_ENV['HOST'] . '/img/integrantes/' . $integrante->integrantes_imagen; ?>.png" alt="Imagen Asesor Academico">
              </picture>
            </span>
            <span class="card__name"><?= $integrante->integrantes_nombre ?></span>
            <span class="card__email"><?= $integrante->integrantes_correo ?></span>
          </button>
          <?php } ?>
        <?php } ?>
      </div>
    </section>
    


    <!-- Panel: Coordinadores -->

    
      <section class="panel" id="panel-coordinadores" role="tabpanel" aria-labelledby="tab-coordinadores" hidden>
        <h2 class="panel__title">Coordinadores<span class="dot">.</span></h2>
        <div class="grid grid--3">
          <?php foreach($equipo as $integrante){ ?>
            <?php if($integrante->integrantes_rol === 'Coordinador'){?>
              <button class="card"
                data-name="<?php echo $integrante->integrantes_nombre ?>"
                data-role="<?php echo $integrante->integrantes_rol ?>"
                data-email="<?php echo $integrante->integrantes_correo ?>"
                data-img="https://images.unsplash.com/photo-1602471615287-4655e99e1c5a?q=80&w=640&auto=format&fit=crop">
                <span class="card__title"><?php echo $integrante->integrantes_nombre ?></span>
                <span class="card__avatar">
                  <picture>
                    <source srcset="<?php echo $_ENV['HOST'] . '/img/integrantes/' . $integrante->integrantes_imagen; ?>.webp" type="image/webp">
                    <source srcset="<?php echo $_ENV['HOST'] . '/img/integrantes/' . $integrante->integrantes_imagen; ?>.png" type="image/png">
                    <img src="<?php echo $_ENV['HOST'] . '/img/integrantes/' . $integrante->integrantes_imagen; ?>.png" alt="Imagen Asesor Academico">
                  </picture>
                </span>
                <span class="card__meta"><strong>Estudiante.</strong> <?php echo $integrante->integrantes_nombre ?></span>
                <span class="card__email"><?php echo $integrante->integrantes_correo ?></span>
              </button>
            <?php } ?>
          <?php } ?>  
        </div>
      </section>
    

    <!-- Panel: Miembros -->
    
      <section class="panel" id="panel-miembros" role="tabpanel" aria-labelledby="tab-miembros" hidden>
        <h2 class="panel__title">Miembros<span class="dot">.</span></h2>

        <div class="grid grid--4">
          <!-- Duplica/edita estas tarjetas según tu data -->
          <?php foreach($equipo as $integrante){ ?>
            <?php if($integrante->integrantes_rol === 'Miembro'){?>
              <div class="card"
                data-name="<?php echo $integrante->integrantes_nombre ?>"
                data-role="<?php echo $integrante->integrantes_rol ?>"
                data-email="<?php echo $integrante->integrantes_correo ?>"
                data-img="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=640&auto=format&fit=crop">
                <span class="card__title">Investigación</span>
                <span class="card__avatar">
                  <picture>
                    <source srcset="<?php echo $_ENV['HOST'] . '/img/integrantes/' . $integrante->integrantes_imagen; ?>.webp" type="image/webp">
                    <source srcset="<?php echo $_ENV['HOST'] . '/img/integrantes/' . $integrante->integrantes_imagen; ?>.png" type="image/png">
                    <img src="<?php echo $_ENV['HOST'] . '/img/integrantes/' . $integrante->integrantes_imagen; ?>.png" alt="Imagen Asesor Academico">
                  </picture>
                </span>
                <span class="card__name">
                  <?php echo $integrante->integrantes_nombre ?>
                </span>
                <span class="card__email"><?php echo $integrante->integrantes_correo ?></span>
            </div>
            <?php }?>
            <?php }?>
        </div>
      </section>
      <div class="equipo__link">
        <a href="/equipo">Saber mas...</a>
      </div>
    </section>

    <section class="noticias">
        <div class="noticias__container">
            <h2 class="noticias__title">
            <span class="noticias__title--accent">Últimos</span> Eventos<span class="noticias__dot">.</span>
            </h2>
        <div class="noticias__grid">
        <?php foreach($eventos as $evento) {?>
            <article 
                class="noticias-card"
                data-noticias
                data-title="<?php echo $evento->evento_titulo ?>"
                data-date="<?php echo $evento->evento_date ?>"
                data-content="Texto completo de la noticia. Aquí va el detalle amplio con todos los párrafos que desees."
            >
            <figure class="noticias-card__media">
                <picture>
                        <source srcset="<?php echo $_ENV['HOST'] . '/img/eventos/' . $evento->evento_imagen; ?>.webp" type="image/webp">
                        <source srcset="<?php echo $_ENV['HOST'] . '/img/eventos/' . $evento->evento_imagen; ?>.png" type="image/png">
                        <img src="<?php echo $_ENV['HOST'] . '/img/eventos/' . $notieventocia->evento_imagen; ?>.png" alt="Imagen Noticia">
                </picture>
            </figure>
            <time class="noticias-card__date" datetime="2024-03-04"><?php echo $evento->evento_fecha ?></time>
            <h3 class="noticias-card__title"><?php echo $evento->evento_nombre ?></h3>
            <div class="noticias__contenedor--enlace">
                <a class="noticia__enlace" href="/evento?id=<?php echo $evento->id; ?>">Saber mas...</a>
            </div>
            </article>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<section class="blog">
    <h2 class="noticias__title">
        <span class="noticias__title--accent">Nuestro</span> Blog<span class="noticias__dot">.</span>
    </h2>
    <?php if($blogs_slider){ ?>
        <section id="blog__slider" class="blog__slider">
        <div class="slider swiper">
            <div class="swiper-wrapper">
            <?php foreach($blogs_slider as $blog_slider) { ?> 
                <div class="blog__contenido swiper-slide">
                <div class="blog__contenido--imagen">
                    <picture>
                    <source width="200" srcset="<?php echo $_ENV['HOST'] . '/img/blog/' . $blog_slider->blog_imagen; ?>.webp" type="image/webp">
                    <source width="200" srcset="<?php echo $_ENV['HOST'] . '/img/blog/' . $blog_slider->blog_imagen; ?>.png" type="image/png">
                    <img width="200" src="<?php echo $_ENV['HOST'] . '/img/blog/' . $blog_slider->blog_imagen; ?>.png" alt="Imagen Noticia">
                    </picture>
                </div>
                <div class="blog__contenido--texto">
                    <div>
                    <h3 class="blog__slider--titulo"><?php echo $blog_slider->blog_titulo; ?></h3>
                    <p class="blog__slider--descripcion"><?php echo mb_strimwidth(strip_tags($blog_slider->blog_contenido), 0, 350, '...'); ?></p> 
                    <p class="blog__slider--colaborador"><?php echo $blog_slider->blog_colaboradores; ?></p>
                    <p class="blog__slider--fecha"><?php echo $blog_slider->blog_date; ?></p>
                    </div>
                </div>
                </div>
            <?php } ?>
            </div>
            <!-- Botones de navegación -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        </section>
    <?php } ?>
</section>
    <h2 class="noticias__title">
      <span class="noticias__title--accent">Últimas</span> Noticias<span class="noticias__dot">.</span>
    </h2>
<div class="noticias__grid">        
      <?php foreach($noticias as $noticia) {?>
        <article 
            class="noticias-card"
            data-noticias
            data-title="<?php echo $noticia->noticias_titulo ?>"
            data-date="<?php echo $noticia->noticias_date ?>"
            data-content="Texto completo de la noticia. Aquí va el detalle amplio con todos los párrafos que desees."
          >
          <figure class="noticias-card__media">
            <picture>
                    <source srcset="<?php echo $_ENV['HOST'] . '/img/noticias/' . $noticia->noticias_imagen; ?>.webp" type="image/webp">
                    <source srcset="<?php echo $_ENV['HOST'] . '/img/noticias/' . $noticia->noticias_imagen; ?>.png" type="image/png">
                    <img src="<?php echo $_ENV['HOST'] . '/img/noticias/' . $noticia->noticias_imagen; ?>.png" alt="Imagen Noticia">
            </picture>
          </figure>
          <time class="noticias-card__date" datetime="2024-03-04"><?php echo $noticia->noticias_date ?></time>
          <h3 class="noticias-card__title"><?php echo $noticia->noticias_titulo ?></h3>
          <div class="noticias__contenedor--enlace">
            <a class="noticia__enlace" href="/noticia?id=<?php echo $noticia->id; ?>">Saber mas...</a>
          </div>
        </article>
      <?php } ?>
</div>

</main>