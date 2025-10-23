<main>
    <h2 class="noticia__titulo"><?php echo $noticia->noticias_titulo ?></h2>
    <section class="noticia">
        <div class="noticia__contenedor__imagen">
            <picture>
                    <source width="200" srcset="<?php echo $_ENV['HOST'] . '/img/noticias/' . $noticia->noticias_imagen; ?>.webp" type="image/webp">
                    <source width="200" srcset="<?php echo $_ENV['HOST'] . '/img/noticias/' . $noticia->noticias_imagen; ?>.png" type="image/png">
                    <img width="200" src="<?php echo $_ENV['HOST'] . '/img/noticias/' . $noticia->noticias_imagen; ?>.png" alt="Imagen Noticia">
            </picture>
        </div>
        <div class="noticia__contenido">
    <div class="noticia__contenido--texto">
        <?php 
            $parrafos = preg_split('/\r\n|\r|\n/', $noticia->noticias_contenido);
            foreach($parrafos as $p) {
                $p = trim($p);
                if ($p !== '') {
                    echo "<p>$p</p>";
                }
            }
        ?>

        <div class="noticia__creditos">
            <div>
                <p><span>Escrito por:</span> <?php echo $noticia->noticias_colaboradores; ?></p>
            </div>
            <div class="noticia__creditos--fecha">
                <p><span>Fecha de publicación:</span> <?php echo $noticia->noticias_date; ?></p>
            </div>
        </div>
    </div>
</div>

    </section>
</main>