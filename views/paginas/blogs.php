
<h2 class="noticias__title">
    <span class="noticias__title--accent">Nuestro</span> Blog<span class="noticias__dot">.</span>
</h2>

<main class="blog">
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

  <section class="blog__blogs">
    <?php foreach($blogs as $blog){ ?>
        <div class="blog__blog">
          <div class="blog__imagen">
            <picture>
              <source width="200" srcset="<?php echo $_ENV['HOST'] . '/img/blog/' . $blog->blog_imagen; ?>.webp" type="image/webp">
              <source width="200" srcset="<?php echo $_ENV['HOST'] . '/img/blog/' . $blog->blog_imagen;  ?>.png" type="image/png">
              <img class="blog__img" width="200" src="<?php echo $_ENV['HOST'] . '/img/blog/' . $blog->blog_imagen;  ?>.png" alt="Imagen Noticia">
            </picture>
          </div>
          <div class="blog__informacion">
            <p class="blog__fecha"><?php echo $blog->blog_date; ?></p>
            <h3 class="blog__titulo"><?php echo $blog->blog_titulo; ?></h3>
            <p class="blog__descripcion"><?php echo mb_strimwidth(strip_tags($blog->blog_contenido), 0, 350, '...'); ?></p>
            <div class="blog__footer">
              <p class="blog__colaborador"><?php echo $blog->blog_colaboradores; ?></p>
              <a class="blog__enlace" href="/blog?id=<?php echo $blog->id; ?>">Saber mas...</a>
            </div>
          </div>
        </div>
    <?php } ?>
  </section>
</main>
<?php 
    echo $paginacion;
?>


