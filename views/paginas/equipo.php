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
    <?php foreach($equipo as $integrante){ ?>
    <!-- Panel: Asesor Académico -->
     <?php if($integrante->integrantes_rol === 'Asesor Academico'){?>
      <section class="panel is-active" id="panel-asesor" role="tabpanel" aria-labelledby="tab-asesor">
        <?php $nombre= explode(' ', $integrante->integrantes_rol);?>
        <h2 class="panel__title"><span class="accent"><?php echo $nombre[0]; ?></span> <?php echo $nombre[1]; ?> </h2>
        <article class="profile profile--wide">
          <div class="profile__avatar">
            <picture>
                <source srcset="<?php echo $_ENV['APP_URL'] . '/img/integrantes/' . $integrante->integrantes_imagen; ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['APP_URL'] . '/img/integrantes/' . $integrante->integrantes_imagen; ?>.png" type="image/png">
                <img src="<?php echo $_ENV['APP_URL'] . '/img/integrantes/' . $integrante->integrantes_imagen; ?>.png" alt="Imagen Asesor Academico">
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
                <source srcset="<?php echo $_ENV['APP_URL'] . '/img/integrantes/' . $integrante->integrantes_imagen; ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['APP_URL'] . '/img/integrantes/' . $integrante->integrantes_imagen; ?>.png" type="image/png">
                <img src="<?php echo $_ENV['APP_URL'] . '/img/integrantes/' . $integrante->integrantes_imagen; ?>.png" alt="Imagen Asesor Academico">
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
  </main>
