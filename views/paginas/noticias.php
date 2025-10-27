
  <section class="noticias">
  <div class="noticias__container">
    <h2 class="noticias__title">
      <span class="noticias__title--accent">Últimas</span> Noticias<span class="noticias__dot">.</span>
    </h2>

    <p class="noticias__subtitle">
      Mantente informado con las últimas noticias y actualizaciones del mundo tecnológico y empresarial
    </p>

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
                    <source srcset="<?php echo $_ENV['APP_URL'] . '/img/noticias/' . $noticia->noticias_imagen; ?>.webp" type="image/webp">
                    <source srcset="<?php echo $_ENV['APP_URL'] . '/img/noticias/' . $noticia->noticias_imagen; ?>.png" type="image/png">
                    <img src="<?php echo $_ENV['APP_URL'] . '/img/noticias/' . $noticia->noticias_imagen; ?>.png" alt="Imagen Noticia">
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
  </div>
</div>
</section>