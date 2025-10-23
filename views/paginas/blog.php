<main>
    <div class="blog__header">
        <div class=""><h1><?php echo $titulo; ?></h1></div>
        <p><?php echo $blog->blog_colaboradores; ?></p>
        <p class="blog__date"><?php echo $blog->blog_date; ?></p>
    </div>

    <div class="blog__image">
        <div class="">
            <picture>
                <source width="200" srcset="<?php echo $_ENV['HOST'] . '/img/blog/' . $blog->blog_imagen; ?>.webp" type="image/webp">
                <source width="200" srcset="<?php echo $_ENV['HOST'] . '/img/blog/' . $blog->blog_imagen; ?>.png" type="image/png">
                <img width="200" src="<?php echo $_ENV['HOST'] . '/img/blog/' . $blog->blog_imagen; ?>.png" alt="Imagen Noticia">
            </picture>
        </div>
        
    </div>
    <div class="blog__cont">
        <div class="">
            <?php 
                $parrafos = preg_split('/\r\n|\r|\n/', $blog->blog_contenido);
                foreach($parrafos as $p) {
                    $p = trim($p);
                        if ($p !== '') {
                            echo "<p>$p</p>";
                        }
                    }
            ?>
        </div>
        
    </div>

</main>