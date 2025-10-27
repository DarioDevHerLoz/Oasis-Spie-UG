<fieldset class="formulario__fildset">
    <legend class="formulario__legend"> Agregar Blog</legend>
    <div class="formulario__campo">
        <label for="blog_titulo" class="formulario__label">
            Titulo del Blog
        </label>
        <input 
            type="text"
            class="formulario__input"
            id="blog_titulo"
            name="blog_titulo"
            value="<?php echo $blog->blog_titulo;?>"
            placeholder="Escriba el titulo del Blog"
        >
    </div>

    <div class="formulario__campo">
        <label for="blog_contenido" class="formulario__label">
            Contendido del blog
        </label>
        <textarea
            id="blog_contenido" 
            name="blog_contenido" 
            class="formulario__input"
            rows="20"
        >
            <?php echo $blog->blog_contenido;?>
        </textarea>
    </div>

    <div class="formulario__campo">
        <label for="blog_imagen" class="formulario__label">
            Imagen de la blog
        </label>
        <input 
            type="file"
            class="formulario__input formulario__input--file"
            id="blog_imagen"
            name="blog_imagen"
        >
    </div>

    <?php if(isset($blog->imagen_actual)){?>
        <p class="formulario__texto">Imagen Actual:</p>
        <picture>
                <source srcset="<?php echo $_ENV['APP_URL'] . '/img/blog/' . $blog->blog_imagen; ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['APP_URL'] . '/img/blog/' . $blog->blog_imagen; ?>.png" type="image/png">
                <img src="<?php echo $_ENV['APP_URL'] . '/img/blogs/' . $blog->blog_imagen;?>.png" alt="Imagen blog">
        </picture>
    <?php }?>
</fieldset>