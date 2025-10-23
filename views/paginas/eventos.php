
<section class="noticias">
  <div class="noticias__container">
    <h2 class="noticias__title">
      <span class="noticias__title--accent">Últimos</span> Eventos<span class="noticias__dot">.</span>
    </h2>

    <p class="noticias__subtitle">
      No te pierdas nuestros eventos puedes consultarlos aqui
    </p>

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